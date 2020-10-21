<?php

namespace App\Http\Controllers\User;
use App\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = DB::table('applications')
        ->leftjoin('jobs','jobs.job_id','=','applications.job_id')
        ->leftjoin('users','users.user_id','=','applications.user_id')
        ->where('applications.user_id','=',Auth::user()->user_id)
        ->where('applications.status','=',0)
        
        ->select('applications.app_status','applications.created_at','applications.app_id','jobs.job_name')->get();
        
       
        return view('user.view_app', compact('app'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($jobid)
    {
        

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
    public function show($jobid)
    {
        
        $job = DB::table('jobs')->where('jobs.job_id',$jobid)
        ->leftjoin('employeers','employeers.employeer_id','=','jobs.employeer_id')
        ->where('jobs.job_status','=',0)
        ->where('jobs.verification_status','=',1)
        ->select('jobs.job_id','jobs.employeer_id')->first();

        // $this->validate($job, [
         
        //     'job_id' => 'required',
        //     'employeer_id' => 'required',
           
            
        // ]);

        $app = new Application();
               
                $app ->employeer_id = $job->employeer_id ;
                $app ->job_id = $job->job_id;
                $app ->user_id = Auth::user()->user_id;
                
                                       
                $app ->save();
                // return redirect()->route('std')->with('success',' Success');
                return view('user.view_jobs');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         
        
    }
    public function aja($id)
    {
         
         
         $app = DB::table('applications')->where('applications.app_id',$id)
        ->leftjoin('employeers','employeers.employeer_id','=','applications.employeer_id')
        ->leftjoin('nations','employeers.nation_id','=','nations.nation_id')
        ->leftjoin('states','employeers.state_id','=','states.state_id')
        ->leftjoin('districts','employeers.district_id','=','districts.district_id')
       
        ->where('applications.user_id',Auth::user()->user_id)
        ->select('applications.interview_date','nations.nation_name','employeers.employeer_name','states.state_name','districts.district_name')->first();
        return(compact('app'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        DB::table('applications')->where('app_id', $id)->delete();
        return redirect()->route('user.app.index')->with('success','Deleted ');
    }
}
