<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'asc')
            ->get();
        return view('chat.index', compact('messages'));
    }

    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'message' => 'required|string',
    //         'receiver_id' => 'required|exists:users,id',
    //     ]);

    //     $message = Message::create([
    //         'sender_id' => Auth::id(),
    //         'receiver_id' => $request->receiver_id,
    //         'company_id' => Auth::user()->company_id,
    //         'message' => $request->message,
    //     ]);

    //     // Charger les relations pour éviter le problème "undefined"
    //     $message->load('sender', 'receiver');

    //     broadcast(new MessageSent($message))->toOthers();

    //     return response()->json([
    //         'id' => $message->id,
    //         'message' => $message->message,
    //         'sender_id' => $message->sender_id,
    //         'sender_name' => optional($message->sender)->name ?? 'Utilisateur inconnu',
    //         'receiver_name' => optional($message->receiver)->name ?? 'Utilisateur inconnu',
    //         'created_at' => $message->created_at->format('H:i'),
    //     ]);
    // }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string',
            'receiver_id' => 'required|exists:users,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,txt|max:10240',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('messages', 'public');
        }

        // Create message
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message ?? '',
            'file' => $filePath,
        ]);

        // Load relationships
        $message->load('sender', 'receiver');

        // Broadcast message
        broadcast(new MessageSent($message))->toOthers();

        // Return response
        $responseData = [
            'id' => $message->id,
            'message' => $message->message,
            'sender_id' => $message->sender_id,
            'sender_name' => $message->sender->name ?? 'Unknown User',
            'receiver_name' => $message->receiver->name ?? 'Unknown User',
            'created_at' => $message->created_at->format('H:i'),
        ];

        if ($message->file) {
            $responseData['file'] = asset('storage/' . $message->file);
        }

        return response()->json($responseData);
    }


public function getMessages($receiver_id)
{
    $messages = Message::where(function ($query) use ($receiver_id) {
        $query->where('sender_id', auth()->id())
            ->where('receiver_id', $receiver_id);
    })
        ->orWhere(function ($query) use ($receiver_id) {
            $query->where('sender_id', $receiver_id)
                ->where('receiver_id', auth()->id());
        })
        ->with('sender') // Load sender relationship
        ->orderBy('created_at', 'asc')
        ->get();

    // Format the response to include file URLs
    $messages = $messages->map(function ($message) {
        $messageData = [
            'id' => $message->id,
            'sender_id' => $message->sender_id,
            'sender_name' => optional($message->sender)->name ?? 'Utilisateur inconnu',
            'receiver_id' => $message->receiver_id,
            'message' => $message->message,
            'created_at' => $message->created_at->format('H:i'),
        ];

        // Add file URL if file exists
        if ($message->file) {
            $messageData['file'] = asset('storage/' . $message->file);
        }

        return $messageData;
    });

    return response()->json($messages);
}

public function getLastMessage($userId)
{
    $lastMessage = Message::where(function ($query) use ($userId) {
        $query->where('sender_id', auth()->id())
            ->where('receiver_id', $userId);
    })
        ->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', auth()->id());
        })
        ->latest()
        ->first();

    if ($lastMessage) {
        return response()->json([
            'message' => $lastMessage->message,
            'created_at' => $lastMessage->created_at->format('H:i')
        ]);
    } else {
        return response()->json(null);
    }
}

    // public function getMessages($receiver_id)
    // {
    //     $messages = Message::where(function ($query) use ($receiver_id) {
    //         $query->where('sender_id', auth()->id())
    //             ->where('receiver_id', $receiver_id);
    //     })
    //         ->orWhere(function ($query) use ($receiver_id) {
    //             $query->where('sender_id', $receiver_id)
    //                 ->where('receiver_id', auth()->id());
    //         })
    //         ->with('sender') // Charger la relation `sender` pour récupérer le nom
    //         ->orderBy('created_at', 'asc')
    //         ->get();

    //     // Modifier la réponse pour inclure le nom de l'expéditeur
    //     $messages = $messages->map(function ($message) {
    //         return [
    //             'id' => $message->id,
    //             'sender_id' => $message->sender_id,
    //             'sender_name' => optional($message->sender)->name ?? 'Utilisateur inconnu',
    //             'receiver_id' => $message->receiver_id,
    //             'message' => $message->message,
    //             'created_at' => $message->created_at->format('H:i'),
    //         ];
    //     });

    //     return response()->json($messages);
    // }

    public function getUsers()
    {
        $users = User::where('id', '!=', auth()->id())
            ->select('id', 'name')
            ->get();

        return response()->json($users);
    }

    // public function getLastMessage($userId)
    // {
    //     $lastMessage = Message::where('sender_id', $userId)
    //         ->orWhere('receiver_id', $userId)
    //         ->latest()
    //         ->first();

    //     if ($lastMessage) {
    //         return response()->json([
    //             'message' => $lastMessage->message,
    //             'created_at' => $lastMessage->created_at->format('H:i') // Format 24h (ex: 14:30)
    //         ]);
    //     } else {
    //         return response()->json(null);
    //     }
    // }
}