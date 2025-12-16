<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Evaluator;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\JobOffer;
use App\Models\Profile;
use App\Models\TrackingApplication;
use App\Models\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $event;

    public function __construct(Event $event)
    {
        // Injection du modèle event
        $this->event = $event;

        // Appliquer un middleware pour restreindre l'accès selon la permission
        $this->middleware('permission:event-create')->only(['create']);
        $this->middleware('permission:event-listing')->only(['listing']);
    }
    public function listing()
    {
        $userEmails = User::pluck('email', 'id')->toArray();
        $profileEmails = Profile::pluck('email', 'id')->toArray();
        // $evaluators = Evaluator::where("client_id", null)->get();

        $jobOffers = JobOffer::with("profession")->get();
        $clients = Client::get();


        $eventIds = EventParticipant::where('user_id', auth()->id())
            ->orWhere('profile_id', optional(auth()->user())->profile_id)
            ->pluck('event_id');

        $evaluators = EventParticipant::with(['user', 'profile'])
            ->whereIn('event_id', $eventIds)
            ->where(function ($query) {
                $query->where('user_id', '!=', auth()->id())
                    ->orWhere('profile_id', '!=', optional(auth()->user())->profile_id);
            })
            ->get()
            ->map(function ($participant) {
                // Return user info if user_id exists, otherwise profile info
                if ($participant->user) {
                    return [
                        'type' => 'user',
                        'id' => $participant->user->id,
                        'name' => $participant->user->name,
                        'email' => $participant->user->email,
                        'profession' => $participant->user->role,
                        'avatar' => $participant->user->getAvatarUrl(),
                    ];
                } elseif ($participant->profile) {
                    return [
                        'type' => 'profile',
                        'id' => $participant->profile->id,
                        'name' => $participant->profile->first_name . " " . $participant->profile->last_name,
                        'email' => $participant->profile->email,
                        'profession' => $participant->profile->profession->label ?? "-",
                        'avatar' => $participant->profile->getAvatarUrl(),
                    ];
                }
                return null;
            })
            ->filter() // remove nulls
            ->unique('id') // optional: avoid duplicates
            ->values();

        // dd($participants);

        $members = [];
        foreach ($userEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'user'];
        }
        foreach ($profileEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
        }

        // Make sure we have unique members
        $members = array_unique($members, SORT_REGULAR);
        return view("event.listing")
        ->with(['members' => $members, 
                    'evaluators' => $evaluators,
                    'clients'=> $clients,
                    'jobOffers'=> $jobOffers]);
    }

    public function create(Request $request)
    {
        $ids = $request->query('ids');
        $ids = $ids ? explode(',', $ids) : [];
        $ids = array_filter(array_map('intval', $ids));

        // if (empty($ids)) {
        //     return response()->json(['members' => [], 'selectedMembers' => []]);
        // }

        $userEmails = User::pluck('email', 'id')->toArray();

        $selectedProfiles = TrackingApplication::whereIn('id', $ids)
            ->with('profile:id,email')
            ->get()
            ->pluck('profile')
            ->filter()
            ->pluck('email', 'id')
            ->toArray();

        // Fetch only necessary profile emails
        $profileEmails = Profile::pluck('email', 'id')->toArray();

        // Fetch evaluators (optional: consider selecting only necessary fields)
        $evaluators = Evaluator::whereNull("client_id")->get(['id']);

        // Build members list
        $members = [];
        $selectedMembers = [];

        foreach ($userEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'user'];
        }
        foreach ($profileEmails as $id => $email) {
            $members[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
        }
        foreach ($selectedProfiles as $id => $email) {
            $selectedMembers[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
        }

        // Make sure we have unique members
        $members = array_unique($members, SORT_REGULAR);
        $selectedMembers = array_unique($selectedMembers, SORT_REGULAR);

        return view("event.listing", [
            'members' => $members,
            'evaluators' => $evaluators,
            'selectedMembers' => $selectedMembers
        ]);
    }


    // public function create(Request $request)
    // {
    //     $userEmails = User::pluck('email', 'id')->toArray();
    //     $selectedProfiles = Profile::whereIn('id', $request->ids)->pluck('email', 'id')->toArray();
    //     $profileEmails = Profile::pluck('email', 'id')->toArray();
    //     $evaluators = Evaluator::where("client_id", null)->get();

    //     $members = [];
    //     $selectedMembers = [];
    //     foreach ($userEmails as $id => $email) {
    //         $members[] = ['id' => $id, 'email' => $email, 'type' => 'user'];
    //     }
    //     foreach ($profileEmails as $id => $email) {
    //         $members[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
    //     }
    //     foreach ($selectedProfiles as $id => $email) {
    //         $selectedMembers[] = ['id' => $id, 'email' => $email, 'type' => 'profile'];
    //     }

    //     // Make sure we have unique members
    //     $members = array_unique($members, SORT_REGULAR);
    //     $selectedMembers = array_unique($selectedMembers, SORT_REGULAR);
    //     return view("event.listing")->with(['members' => $members, 'evaluators' => $evaluators, 'selectedMembers' => $selectedMembers]);
    // }
}
