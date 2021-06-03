<?php

namespace App\Http\Controllers\Franchise\Auth;
use \Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Nation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Franchise;

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
    protected $redirectTo = '/franchise/login';

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
            'employeer_name' => 'required|string|max:255',
             'skills' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'prem_address' => 'required|string',
            'contact' => 'required|digits:10|max:12',
             'DOB' => 'required',
             'blood_group' => 'required',
             'post_office_id' => 'required',
             'aadhar_number' => 'required|digits:12|max:12|min:12'
             

        ]);
    }
     


   
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['image']) {
        
      
        $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
    
        $data['image']->move(
        base_path() . '/public/franchise/images/', $imageName
        );
    }
   
    // dd($data);

        return Franchise::create([
            'franchise_name' => $data['employeer_name'],
            'contact' => $data['contact'],
            'contact1' => $data['contact1'],
            'image' => $imageName,
            'prem_address' => $data['prem_address'],
            'curr_address' => $data['curr_address'],
            'blood_group' => $data['blood_group'],
            'DOB' => $data['DOB'],
            'nation_id' => $data['nation'],
            'state_id' => $data['state'],
            'district_id' => $data['district'],
            'post_office_id' => $data['post_office_id'],
            'email' => $data['email'],
            'aadhar_number' => $data['aadhar_number'],
            'password' => bcrypt($data['password']),
            'skills' => $data['skills']
        ]);
    }
    public function showRegistrationForm()
    {
        $nat =Nation::select('nation_id','nation_name')->get();

        return view('franchise.auth.register',compact('nat'));
       
        
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
