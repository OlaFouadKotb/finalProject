<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save the message to the database
        $message = new Message();
        $message->full_name = $request->name;
        $message->email = $request->email;
        $message->message_content = $request->message;
        $message->save();

        // Send email to the owner
        Mail::send([], [], function ($mail) use ($request) {
            $mail->to('owner@example.com') // Replace with your email
                ->subject('New Contact Message')
                ->setBody(
                    'Name: ' . $request->name . '<br>' .
                    'Email: ' . $request->email . '<br>' .
                    'Message: ' . nl2br(htmlspecialchars($request->message)), // Convert new lines to <br> and escape HTML
                    'text/html'
                );
        });

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
