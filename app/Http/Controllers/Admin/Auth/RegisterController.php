<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;


use Illuminate\Http\Request;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin\home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact'=>'required|string|max:12',
          
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
 /**
* Create a new user instance after a valid registration.
*
* @param array $data
* @return User
*/

   
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
    
        $data['image']->move(
        base_path() . '/public/images/', $imageName
        );

        
        return Admin::create([
            
            'admin_name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'password' => bcrypt($data['password']),
            'image' => $imageName,
        ]);


       


       
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
