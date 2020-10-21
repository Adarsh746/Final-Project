<?php

namespace App\Http\Controllers\Admin\Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    protected function guard()
    {
      
        return Auth::guard('admin');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
       
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function username()
    {
        return 'admin_id';
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
