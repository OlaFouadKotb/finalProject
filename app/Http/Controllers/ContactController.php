<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(){
        $title = 'Contact with Us';
        return view('includes.contact', compact('title'));
    }

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
        try {
            Mail::to('engolakotb154@gmail.com')->send(new ContactMail($request->name, $request->email, $request->message));
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}
