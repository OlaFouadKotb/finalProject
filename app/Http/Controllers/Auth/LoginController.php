<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function showLoginForm(){
        return view('auth.login');}
 /**
     * Validate the user's login credentials.
     *
     * @param Request $request
     * @return array
     */
    
        public function credentials(Request $request){
            
// Determine if the user input is an email address
$loginField = filter_var($request->user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

// Return the validated credentials
return [
    $loginField => $request->user_name,
    'password' => $request->password,
];
        
    }
}

