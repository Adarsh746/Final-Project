<?php

namespace App\Http\Controllers\Franchise;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\Controller;
use App\User;


// use App\Nation;
// use App\Job;
// use App\Qualification;
// use App\Category;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =DB::table('users')
        ->leftjoin('nations', 'users.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'users.state_id', '=', 'states.state_id')

        ->leftjoin('districts', 'districts.district_id', '=', 'users.district_id')
        //->leftjoin('job_preferences', 'users.user_id', '=', 'job_preferences.user_id')

        ->select('users.user_id','users.image','users.user_name','users.email','users.contact','users.dob','nations.nation_name','states.state_name','districts.district_name')
        ->where('users.account_status', '=', 0)
        
        ->get();        
               
        return view('franchise.view_user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
          $user =DB::table('users')
        ->leftjoin('nations', 'users.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'users.state_id', '=', 'states.state_id')

        ->leftjoin('districts', 'districts.district_id', '=', 'users.district_id')
        //->leftjoin('job_preferences', 'users.user_id', '=', 'job_preferences.user_id')

        ->select('users.user_id','users.image','users.user_name','users.email','users.contact','users.dob','nations.nation_name','states.state_name','districts.district_name')
        ->where('users.account_status', '=', 0)
        ->where('users.approval_status', '=', 0)
        
        
        ->get();        
                
        return view('franchise.approve_user', compact('user'));
    } //
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //->where('users.user_id', "=", $id)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {


         $user =User::find($id);
        $user ->approval_status = 1;
        $user ->save();
        return redirect('franchise/user/create')->with('success','updated');
         }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user ->account_status = 1;
        $user ->save();
        return redirect('franchise/user/')->with('success','deleted');
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
