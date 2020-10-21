<?php

namespace App\Http\Controllers\User\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'user/welcome';

    protected function guard()
    {
      
        return Auth::guard('web');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
       
    }
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    public function username()
    {
        return 'email';
    }
    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'), ['account_status' => 0]);
  }
}
