<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('frontPages.contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:250',
        ]);
        Message::create($data);

        Mail::to('owner@yourcafename.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function showMessages()
{
    $unreadCount = Message::where('read', false)->count();
    $messages = Message::all();
    return view('admin.messages', compact('messages','unreadCount'));
}

}
