<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class ChatController extends Controller
{
    public function show(User $user)
    {
        return view('chat', compact('user'));
    }

    public function getMessages(User $user)
    {
        return Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id());
            $query->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id);
            $query->where('receiver_id', Auth::id());
        })->with(['sender', 'receiver'])->orderBy('created_at', 'asc')->get();
    }

    public function sendMessages(Request $request, User $user)
    {

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'text' => $request->message
        ]);

        Broadcast(new \App\Events\MessageSent($message));

        return response()->json($message);
    }
}
