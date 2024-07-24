<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

//     public function store(StoreMessageRequest $request)
// {
//     $message = Message::create($request->validated());
//     return redirect()->route('messages.index')->with('success', 'Message created successfully');
// }


    public function index()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public function show($id)
    {
        // Find the message by ID
        $message = Message::findOrFail($id);
        
        // Mark the message as read
        $message->update(['readable' => true]);

        // Pass the message data to the view
        return view('admin.showMessages', compact('message'));
    }
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully');
    }
    public function countUnread()
{
    $unreadCount = Message::where('readable', false)->count();
    return response()->json(['count' => $unreadCount]);
}
}
