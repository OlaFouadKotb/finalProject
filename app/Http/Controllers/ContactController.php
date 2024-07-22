<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; 

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'message' =>'required|string|max:250',
        ]);
        
        Message::create($data);
        
        return 'add';

    }
    

    public function sendMail(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
           'message' => $request->message,
        ];
    
        Mail::to('eng_olakotb@yahoo.com')->send(new ContactMail($data));
    
        //return back()->with('success', 'Your message has been sent successfully!');
        return"mail send";
    }

    public function index()
    {
        $title = "Contact";
        $emails= Message::get ();
        $messages = Message::where('readable', 0)->take(3)->get();
    return view('admin.messages', compact('title','emails','messages'));
    }
    

    public function show(string $id)
    {
        $title = "contact";
        $email = Message::findOrFail($id);
        $messages = Message::where('readable', 0)->take(3)->get();
    Message::where('id',$id)->update(['readable'=> 1]);
    return view('admin.showMessages', compact('email', 'title','messages'));

 }
};