<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('frontPages.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $Data = $request->only('name', 'email', 'message');
        
        // Send the email
        Mail::to('your_email@example.com')->send(new ContactFormMail($Data));

        // Redirect with success message
        return redirect()->route('contact.form')->with('success', 'Your message has been sent!');
    }
}
