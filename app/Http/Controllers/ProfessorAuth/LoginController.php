<?php

namespace App\Http\Controllers\ProfessorAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use Adldap;

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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/professor/turmas';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('professor.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('professor.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('professor');
    }

    // public function login(Request $request)
    // {
    //     if(Auth::attempt($request->username,$request->password)) {

    //         // Returns \App\User model configured in `config/auth.php`.
    //         $user = Auth::guard('professor')->user();

    //         dd($user);

    //         return redirect()->to('professor/home')->withMessage('Logged in!');
    //     }

    //     return redirect()->to('professor/login')->withMessage('Hmm... Your username or password is incorrect');
    // }

    public function username()
    {
        return 'username';
    }
}
