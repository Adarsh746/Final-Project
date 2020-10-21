<?php

namespace App\Http\Controllers\Franchise\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    // dd('hi');
    public function index()
    {
    
        return view('franchise.auth.login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'franchise/home';
    protected function guard()
    {
      
        return Auth::guard('franchise');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:franchise')->except('logout');
    }
    public function showLoginForm()
    {
        return view('franchise.auth.login');
    }
   

    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        return redirect('/');
    }
    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'), ['account_status' => 0]);
  }
}
