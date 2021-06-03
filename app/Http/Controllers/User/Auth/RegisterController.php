<?php

namespace App\Http\Controllers\User\Auth;

use App\User;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\{Nation, State, District,Local_place, post_office, Sub_category, Subject};



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
    protected $redirectTo = '/user/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest')->except('show','showdis');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      // dd($data);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'contact'=>'required|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
             'dob'=> 'required',
             'nation'=> 'required|',
             'state'=> 'required|',
             'district'=> 'required|',
              'post_office_id'=> 'required|',
              'city_id'=> 'required|',
        ]     ); 
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // dd($data['city_id']);

      if ($data['image']) {
        
      
        $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
    
        $data['image']->move(
        base_path() . '/public/user/images/', $imageName
        );
      }




        return User::create([
            
            'city_id' => $data['city_id'],
            'email' => $data['email'],
            'user_name' => $data['name'],
            'contact' => $data['contact'],
            'image' => $imageName,
            'password' => bcrypt($data['password']),
            'nation_id'=> $data['nation'],
            'state_id'=> $data['state'],
            'district_id'=> $data['district'],
            'post_office_id' => $data['post_office_id'],
            
            'dob'=> $data['dob'],

        ]);
    }

    public function showRegistrationForm()
    {
        $nat =Nation::select('nation_id','nation_name')->get();

        return view('user.auth.register', compact('nat'));
       
        
    }

    public function show($id)
    {
        $state = State::where('nation_id',$id)
                        ->select('state_id','state_name')
                        ->get();

        return $state;
    }
    public function showdis($sid)
    {  
       
        $district = District::where('state_id',$sid)
                        ->select('district_id','district_name')
                        ->get();
                       

        return $district;
    }
    public function showcity($cid)
    {  
       
        $city = Local_place::where('post_office_id',$cid)
                        ->select()
                        ->get();
                       

        return $city;
    }
    public function showpost($sid)

    {  
      
       
        $post = post_office::where('district_id',$sid)
                        ->select('post_office_id','post_office_name','pincode')
                        ->get();
                       

        return $post;
    }
    public function showsub($id)
    {
       
        $subject = Subject::where('quali_id',$id)
                        ->select('subject_id','subject_name')
                        ->get();

        return $subject;
    }
    public function showsubcat($sid)
    {  
       
        $subcat = Sub_category::where('cat_id',$sid)
                        ->select('sub_cat_id','sub_cat_name')
                        ->get();
                       

        return $subcat;
    }





    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath('user/login'));
    }


    //     return view('user.auth.register');
    // }
    
}
