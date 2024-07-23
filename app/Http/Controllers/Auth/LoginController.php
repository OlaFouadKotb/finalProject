<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Validate the user's login credentials.
     *
     * @param Request $request
     * @return array
     */
    public function credentials(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->email, 'password' => $request->password];
        } else {
            return ['userName' => $request->email, 'password' => $request->password];
        }
    }
    protected function authenticated(Request $request, $user)
    {
        // Store user profile information in session
        session([
            'profile_image' => $user->profile_image,
            'user_name' => $user->name, // تأكد من استخدام الاسم الصحيح هنا
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

  
    }

