<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Mail\EventCreatedMail;
use App\Models\Event;
use App\Models\EventAttachment;
use App\Models\EventParticipant;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;




class EventsController extends Controller
{
    protected $event;

    public function __construct(Event $event)
    {
        // Injection du modèle event
        $this->event = $event;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:event-create')->only(['store']);
        $this->middleware('permission:event-edit')->only(['update','edit']);
        $this->middleware('permission:event-detail')->only(['edit']);
        $this->middleware('permission:event-delete')->only(['delete']);
        $this->middleware('permission:event-listing')->only(['listing']);
    }
    public function listing()
    {
        $events = Event::with(['participants.user', 'participants.profile', 'participants', 'destinataires', 'destinataires.user', 'destinataires.profile', 'jobOffer'])
            ->get()
            // foreach ($events as $event) {
            //     dd($event->destinataires->first()->profile->last_name);
            // }
            ->map(function ($event) {
                return [
                    'ID' => $event->id,
                    'title' => $event->title,
                    'is_favorite' => $event->is_favorite,
                    'is_draft' => $event->is_draft,
                    'start' => $event->date . 'T' . $event->start_time,
                    'end' => $event->date . 'T' . $event->end_time,
                    'event_url' => $event->event_url,
                    'className' => $event->high_importance ? 'high-importance' : 'regular-event',
                    'imageUrl' => $this->getImageUrlForEvent($event),
                    'imageUrlCame' => $this->getImageUrlCameForEvent($event),
                    'start_time' => $event->start_time,
                    'high_importance' => $event->high_importance,
                    'event_type' => __($event->event_type),
                    'participants' => $event->participants->map(function ($participant) {
                        return [
                            'id' => $participant->id,
                            'name' => $participant->user?->name ?? $participant->profile?->first_name . " " . $participant->profile?->last_name
                        ];
                    }),
                    'destinataire' => $event->destinataires->first() ? [
                        'id' => $event->destinataires->first()->id,
                        'name' => $event->destinataires->first()->user?->name ?? $event->destinataires->first()->profile->first_name . " " . $event->destinataires->first()->profile->last_name
                    ] : "hello",
                ];
            });
        // dd($events);
        return response()->json($events);
    }


public function generateEmailContent(Request $request)
{
    $eventType = $request->event_type; // 'physique', 'distanciel', 'telephonique'
    
    // Map event types to template names
    $templateNames = [
        'physique' => 'Convocation à un entretien physique',
        'distanciel' => 'Convocation à un entretien distanciel', 
        'telephonique' => 'Convocation à un entretien téléphonique'
    ];
    
    $templateName = $templateNames[$eventType] ?? null;
    if (!$templateName) {
        return response()->json(['success' => false, 'message' => 'Invalid event type']);
    }
    
    // Fetch template from database
    $template = EmailTemplate::where('name', $templateName)->first();
    
    if (!$template) {
        return response()->json(['success' => false, 'message' => 'Template not found']);
    }
    
    // Prepare replacement data
    $replacements = [
        '[Nom]' => $request->last_name,           // ← This is the key fix!
        '[Prénom]' => $request->first_name,
        '[Nom du poste]' => $request->profession_name,
        '[Date de l\'entretien]' => $this->formatDate($request->event_date),
        '[Heure de début]' => $this->formatTime($request->start_time),
    ];
    
    // Add location/URL based on event type
    if ($eventType === 'physique') {
        $replacements['[Lieu de l\'entretien]'] = $request->location ?? '[Lieu de l\'entretien]';
    } elseif ($eventType === 'distanciel') {
        $replacements['[Lien de visioconférence]'] = $request->event_url ?? '[Lien de visioconférence]';
    }
    
    // Replace placeholders in subject and content
    $subject = str_replace(array_keys($replacements), array_values($replacements), $template->subject);
    $content = str_replace(array_keys($replacements), array_values($replacements), $template->content);
    
    return response()->json([
        'success' => true,
        'subject' => $subject,
        'content' => $content
    ]);
}

private function formatDate($dateString)
{
    if (!$dateString) return "[Date de l'entretien]";
    
    $date = \Carbon\Carbon::parse($dateString);
    return $date->translatedFormat('j F Y'); // French date format
}

private function formatTime($timeString)
{
    if (!$timeString) return '[Heure de début]';
    
    [$hours, $minutes] = explode(':', $timeString);
    return "{$hours}h{$minutes}";
}

public function getParticipantNames(Request $request)
{
    try {
        $participantIds = Arr::wrap($request->input('participant_ids'));

        if (count($participantIds) === 0) {
            return response()->json([
                'success' => false,
                'message' => 'No participant IDs provided'
            ]);
        }

        $first_name = "";
        $last_name = "";

        if ($request->type === 'profile') {
            $participant = Profile::whereIn('id', $participantIds)
                ->select('id', 'first_name', 'last_name')
                ->first();

            if ($participant) {
                $first_name = $participant->first_name;
                $last_name = $participant->last_name;
            }
        } else {
            $participant = User::whereIn('id', $participantIds)
                ->select('id', 'name')
                ->first();

            if ($participant) {
                $fullName = $participant->name;
                $nameParts = explode(' ', $fullName, 2); // Split into first and last name only

                $first_name = $nameParts[0] ?? '';
                $last_name = $nameParts[1] ?? '';
            }
        }

        return response()->json([
            'success' => true,
            'participant' => [
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error fetching participant data: ' . $e->getMessage()
        ], 500);
    }
}


// public function getParticipantNames(Request $request)
// {
//     try {
//         $participantIds = Arr::wrap($request->input('participant_ids'));

//         if (count($participantIds) === 0) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'No participant IDs provided'
//             ]);
//         }

//         $first_name = "";
//         $last_name = "";

//         if ($request->type === 'profile') {
//             $participant = Profile::whereIn('id', $participantIds)
//                 ->select('id', 'first_name', 'last_name')
//                 ->first();

//             if ($participant) {
//                 $first_name = $participant->first_name;
//                 $last_name = $participant->last_name;
//             }
//         } else {
//             $participant = User::whereIn('id', $participantIds)
//                 ->select('id', 'name')
//                 ->first();

//             if ($participant) {
//                 $fullName = $participant->name;
//                 $nameParts = explode(' ', $fullName, 2); // Split into first and last name only

//                 $first_name = $nameParts[0] ?? '';
//                 $last_name = $nameParts[1] ?? '';
//             }
//         }

//         return response()->json([
//             'success' => true,
//             'participant' => [
//                 'first_name' => $first_name,
//                 'last_name' => $last_name,
//             ]
//         ]);

//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Error fetching participant data: ' . $e->getMessage()
//         ], 500);
//     }
// }

    public function store(StoreEventRequest $request)
    {
        $event = new Event();
        $event->user_id = Auth::id();
        $event->title = $request->title;

        if($request->job_offer_id)
            $event->job_offer_id = $request->job_offer_id;
        if(session("job_offer_id"))
            $event->job_offer_id = session("job_offer_id");

        $event->event_type = $request->event_type;
        $event->event_url = $request->event_url;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->reminder = $request->reminder ?? 15;
        $event->high_importance = $request->high_importance ?? false;
        $event->description = $request->description;

        if ($request->type == "favorite") {
            $event->is_favorite = true;
        }

        if ($request->type == "draft") {
            $event->is_draft = true;
        }

        $event->save();

        $participantsMeta = json_decode($request->participants_meta, true);
        $destinatairesMeta = json_decode($request->destinataires_meta, true);

        $participantEmails = [];

        foreach (($request->participants ?? []) as $participantId) {
            $type = $participantsMeta[$participantId] ?? null;
            if ($type === 'user') {
                $user = User::find($participantId);
                if ($user) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'user_id' => $user->id,
                        'role' => 'participant'
                    ]);
                    if ($user->email) {
                        $participantEmails[] = $user->email;
                    }
                }
            } elseif ($type === 'profile') {
                $profile = Profile::find($participantId);
                if ($profile) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'profile_id' => $profile->id,
                        'role' => 'participant'
                    ]);
                    if ($profile->email) {
                        $participantEmails[] = $profile->email;
                    }
                }
            }
        }

        $destinataireEmails = [];

        foreach (($request->destinataires ?? []) as $destinataireId) {
            $type = $destinatairesMeta[$destinataireId] ?? null;
            if ($type === 'user') {
                $user = User::find($destinataireId);
                if ($user) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'user_id' => $user->id,
                        'role' => 'destinataire'
                    ]);
                    if ($user->email) {
                        $destinataireEmails[] = $user->email;
                    }
                }
            } elseif ($type === 'profile') {
                $profile = Profile::find($destinataireId);
                if ($profile) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'profile_id' => $profile->id,
                        'role' => 'destinataire'
                    ]);
                    if ($profile->email) {
                        $destinataireEmails[] = $profile->email;
                    }
                }
            }
        }

        // Send email if there is at least one destinataire
        if (!empty($destinataireEmails)) {
            $to = $destinataireEmails[0]; // First destinataire
            $cc = array_slice($destinataireEmails, 1); // Other destinataires
            $cc = array_merge($cc, $participantEmails); // Add participants to CC

            // Define subject and email content
            $subject = $event->email_subject; // or any custom subject
            $emailContent = $event->description; // Rich text from CKEditor

            // Send email with all details passed to Mailable
            Mail::to($to)
                ->cc($cc)
                ->send(new EventCreatedMail($to, $cc, $subject, $emailContent));
        }

        // Handle attachments if any
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('events/attachments', 'public');
                EventAttachment::create([
                    'event_id' => $event->id,
                    'file_path' => $path,
                ]);
            }
        }

        Session::forget('profile_id');

        return response()->json(['message' => 'Événement créé avec succès', 'event' => $event], 201);
    }


    public function update(UpdateEventRequest $request)
    {
        // Find the event by ID
        $eventId = $request->id;
        $event = Event::findOrFail($eventId);

        // Update event details
        if ($request->job_offer_id)
        $event->job_offer_id = $request->job_offer_id;
        if ($request->title)
            $event->title = $request->title;
        if ($request->event_typ)
            $event->event_type = $request->event_type;
        if ($request->event_url)
            $event->event_url = $request->event_url;
        if ($request->location)
            $event->location = $request->location;
        if ($request->date)
            $event->date = $request->date;
        if ($request->start_time)
            $event->start_time = $request->start_time;
        if ($request->end_time)
            $event->end_time = $request->end_time;
        $event->reminder = $request->reminder ?? 15;
        $event->high_importance = $request->high_importance ?? false;
        $event->description = $request->description;

        // Handle favorite and draft status
        $event->is_favorite = $request->type == "favorite" ? true : false;
        $event->is_draft = $request->type == "draft" ? true : false;

        $event->save();

        // Decode the meta data from JSON
        $participantsMeta = json_decode($request->participants_meta, true);
        $destinatairesMeta = json_decode($request->destinataires_meta, true);

        // Update participants
        EventParticipant::where('event_id', $event->id)->delete(); // Remove old participants

        foreach (($request->participants ?? []) as $participantId) {
            $type = $participantsMeta[$participantId] ?? null;

            if ($type == 'user') {
                $user = User::find($participantId);
                if ($user) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'user_id' => $user->id,
                        'role' => 'participant',
                    ]);
                }
            } elseif ($type == 'profile') {
                $profile = Profile::find($participantId);
                if ($profile) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'profile_id' => $profile->id,
                        'role' => 'participant',
                    ]);
                }
            }
        }

        // Update destinataires
        EventParticipant::where('event_id', $event->id)
            ->where('role', 'destinataire')
            ->delete(); // Remove old destinataires

        foreach (($request->destinataires ?? []) as $destinataireId) {
            $type = $destinatairesMeta[$destinataireId] ?? null;

            if ($type == 'user') {
                $user = User::find($destinataireId);
                if ($user) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'user_id' => $user->id,
                        'role' => 'destinataire',
                    ]);
                }
            } elseif ($type == 'profile') {
                $profile = Profile::find($destinataireId);
                if ($profile) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'profile_id' => $profile->id,
                        'role' => 'destinataire',
                    ]);
                }
            }
        }

        // Update attachments (delete old ones and add new ones)
        if ($request->hasFile('attachments')) {
            // Delete old attachments
            EventAttachment::where('event_id', $event->id)->delete();

            // Add new attachments
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('events/attachments', 'public');
                EventAttachment::create([
                    'event_id' => $event->id,
                    'file_path' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Événement mis à jour avec succès', 'event' => $event], 200);
    }


    public function edit($id)
    {
        // Récupérer l'événement avec les destinataires, participants et pièces jointes
        $event = Event::with(['participants', 'destinataires', 'attachments', 'jobOffer'])->findOrFail($id);
        return response()->json([
            'id' => $event->id,
            'title' => $event->title,
            'event_type' => $event->event_type,
            'date' => $event->date,
            'start_time' => $event->start_time,
            'end_time' => $event->end_time,
            'job_offer_id' => $event->job_offer_id,
            'jobOffer' => $event->jobOffer,
            'client_id' => $event->jobOffer->client_id,
            'location' => $event->location,
            'high_importance' => $event->high_importance,
            'reminder' => $event->reminder,
            'event_url' => $event->event_url,
            'description' => $event->description,

            'destinataires' => $event->destinataires->map(function ($dest) {
                return [
                    'id' => $dest->profile_id ? $dest->profile_id : $dest->user_id,
                    'email' => $dest->email,
                    'type' => $dest->profile_id ? 'profile' : 'user',
                ];
            }),

            'participants' => $event->participants->map(function ($part) {
                return [
                    'id' => $part->profile_id ? $part->profile_id : $part->user_id,
                    'email' => $part->email,
                    'type' => $part->profile_id ? 'profile' : 'user',
                ];
            }),

            'attachments' => $event->attachments->map(function ($attachment) {
                return [
                    'id' => $attachment->id,
                    'file_path' => Storage::url($attachment->file_path)
                ];
            })
        ]);
    }


    private function getImageUrlForEvent($event)
    {
        $destinataire = $event->participants->firstWhere('role', 'destinataire');

        if ($destinataire && $destinataire->profile) {
            return $destinataire->profile->getAvatarUrl();
        }

        return asset('assets/img/cvtheque/male.jpg');
    }

    private function getImageUrlCameForEvent($event)
    {
        if ($event->event_type == "visioconference") {
            return '<i class="bi bi-camera-video me-2"></i> Entretien Visioconférence';
        } elseif ($event->event_type == "presentiel") {
            return '<i class="bi bi-geo-alt"></i> Entretien Présentiel';
        } elseif ($event->event_type == "telephonique") {
            return '<i class="bi bi-telephone"></i> Entretien Téléphonique';
        } else {
            return '<i class="bi bi-calendar"></i> Rendez vous';
        }
    }

    public function toggleFavorite($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Événement introuvable'], 404);
        }

        // Toggle the favorite status
        $is_favorite = $event->is_favorite == 1 ? 0 : 1;

        // Update the event's favorite status
        $event->update([
            'is_favorite' => $is_favorite,
        ]);

        return response()->json(['message' => 'Le statut est modifié avec succès', 'is_favorite' => $is_favorite]);
    }

    public function delete($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Événement introuvable'], 404);
        }

        EventParticipant::where('event_id', $event->id)->delete();

        $attachments = EventAttachment::where('event_id', $event->id)->get();
        foreach ($attachments as $attachment) {
            Storage::disk('public')->delete($attachment->file_path);
            $attachment->delete();
        }

        $event->delete();

        return response()->json(['message' => 'Événement supprimé avec succès']);
    }
}
