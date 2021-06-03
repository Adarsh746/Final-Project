<?php

namespace App\Http\Controllers\user;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\Controller;
use App\User;
use App\Nation;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cat =Category::select('cat_id','cat_name')->get();
        // $quali =Qualification::select('quali_id','qualification_name')->get();
        $nation =Nation::select('nation_id','nation_name')->get();
        // $job =Job::select('job_id','job_name')->get();

        // $pref =DB::table('job_preferences')
        // ->leftjoin('nations', 'job_preferences.nation_id', '=', 'nations.nation_id')
        // ->leftjoin('states', 'job_preferences.state_id', '=', 'states.state_id')
        // ->leftjoin('districts', 'job_preferences.district_id', '=', 'districts.district_id')
        // ->leftjoin('qualifications', 'job_preferences.quali_id_1', '=', 'qualifications.quali_id')
        // ->leftjoin('subjects', 'job_preferences.subject_id_1', '=', 'subjects.subject_id')
        // ->leftjoin('categories', 'job_preferences.cat_id', '=', 'categories.cat_id')
        // ->leftjoin('sub_categories', 'job_preferences.sub_cat_id', '=', 'sub_categories.sub_cat_id')
        // ->select('job_preferences.pref_id','job_preferences.job_name','nations.nation_name','states.state_name','districts.district_name',
        // 'qualifications.qualification_name','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name')
        // ->get();
 
        $state = DB::table('states')
        ->leftjoin('nations','nations.nation_id','=','states.nation_id')
        ->select('states.state_id','states.state_name','nations.nation_name')
        // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
        ->where('states.status', '=', 0)
        ->where('nations.status', '=', 0)
        ->get();
        
        $district = DB::table('states')
        ->rightjoin('districts','districts.state_id','=','states.state_id')
        ->select('districts.district_name','states.state_name','districts.district_id')
        ->get();

        $user =DB::table('users')
        ->leftjoin('nations', 'users.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'users.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'users.district_id')
        // ->leftjoin('job_preferences', 'users.user_id', '=', 'job_preferences.user_id')
        ->select()
        ->where('users.account_status', '=', 0)
        ->where('users.user_id', '=', Auth::user()->user_id )
        ->first(); 
               
        // $app = DB::table('applications')
        // ->where('user_id','=',Auth::user()->user_id)
        
        // ->select()->get();
        // $app = count($app);

        // $inter = DB::table('applications')
        // ->where('user_id',Auth::user()->user_id )
        // ->where('app_status',1 )
        // ->get();
        // $inter = count($inter);
        // $short = DB::table('applications')
        // ->where('user_id',Auth::user()->user_id )
        // ->where('app_status',3 )
        // ->get();
        // $short = count($short);

        return view('user.welcome', compact('user','state','nation'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
                $user =DB::table('users')
        ->leftjoin('nations', 'users.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'users.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'users.district_id')
        // ->where('franchises.franchise_id', '=', $id)
        ->select()
        ->where('users.account_status', '=', 0)
        ->where('users.user_id', '=', Auth::user()->user_id )

        
    //$this->authorize('modifyFranchises', auth()->user());
    ->first(); 
    
        
         
        return view('user.edit', compact('user'));     
    }
     public function change(Request $request, $id)
    {
       
     

        // $franchise = (Auth::user()->franchise_id);
        // // $rent = Auth::rent();
        $image1 = null;
       
     if ($request['image']) {
        $image = time() . '1.' . $request->file('image')->Extension();
        $request['image']->move(
        base_path() . '/public/user/images/', $image1
    );
      }
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
           $user =User::find($id);

            $user ->user_name = $request->user_name;   
            $user->email = $request->email;
            
            $user ->contact = $request->contact;
             $user ->address = $request->address;
            // $user ->post_office_name = $request->post_office_name;
            
           
            if($image1){
                     $user->image = $image1;
                }
                
               $user->save();
                
             

          // return view('table');
        return redirect()->route('user.home')->with('success','Edited Successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            

        ]);
        
        
       
       



        $user =User::find($id);
            
        $user ->email = $request->email;
        $user ->user_name = $request->name;
        $user ->contact = $request->contact;
        
        $user ->nation_id = $request->nation_id;
        $user ->state_id = $request->state;
        $user ->district_id = $request->district_id;
        $user ->dob = $request->dob;

if($request->resume !='')
{


        $resumename = time() . '.' . $request['resume']->getClientOriginalExtension();
    
        $request['resume']->move(
        base_path() . '/public/resumes/', $resumename
        );
        $user ->resume = $resumename;
    }
    if($request->image !='')
    {

     
        $imageName = time() . '.' . $request['image']->getClientOriginalExtension();
    
        $request['image']->move(
        base_path() . '/public/user/images/', $imageName
        );
        $user ->image = $imageName;
    } 
        $user ->save();

            
return redirect(route('user.login'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // public function showstate($id)
    // {
    //     $state = State::where('nation_id',$id)
    //                     ->select('state_id','state_name')
    //                     ->get();

    //     return $state;
    // }
    // public function showdist($sid)
    // {  
       
    //     $district = District::where('state_id',$sid)
    //                     ->select('district_id','district_name')
    //                     ->get();
                       

    //     return $district;
    // }

}
