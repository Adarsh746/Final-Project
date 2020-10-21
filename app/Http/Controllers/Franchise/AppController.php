<?php

namespace App\Http\Controllers\Franchise;
use App\Application;
use Illuminate\Support\Facades\Mail;
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
        ->where('applications.franchise_id','=',Auth::user()->franchise_id)
        ->where('applications.status','=',0)
        ->where('applications.app_status','<>',2)
        
        ->select('applications.app_status','users.user_name','users.user_id','applications.created_at','applications.app_id','jobs.job_name')->get();
        
       
        return view('franchise.view_application', compact('app'));
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
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = DB::table('applications')
        ->leftjoin('jobs','jobs.job_id','=','applications.job_id')
        ->leftjoin('users','users.user_id','=','applications.user_id')
        ->where('applications.franchise_id','=',Auth::user()->franchise_id)
        ->where('applications.status','=',0)
        ->where('applications.app_status','<>',2)
        ->where('applications.app_id','=',$id)
        
        ->select('applications.app_status','applications.interview_date','users.email','users.user_name','jobs.job_id','users.user_id','applications.created_at','applications.app_id','jobs.job_name')->first();
        
       
        return view('franchise.interview_shedule', compact('app'));
    }

    public function shortlist(Request $request, $id)
    { 
       


        $app =Application::find($id);
               
               
                $app->app_status=3;  
                $app ->save();

                return redirect('franchise/app')->with('success','Shortlisted ');  
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
            'date' => 'required',
            

        ]);


        $app =Application::find($id);
               
                $app ->interview_date = $request->date;
                $app->app_status=1;  
                $app ->save();

               $emp = $request;
             
                $data = array('name'=>$emp->user_name, "body" => "Interview has sheduled on your application for ".$emp->job_name." check Job.in for more details and information");
                Mail::send('franchise.email', $data, function($message) use($emp) {
            
                    
                  $message->to($emp->email, 'To Website')
                          ->subject('Job.in Updates');
                  $message->from('job.in@gmail.com',Auth::user()->employeer_name);
                });
            

                
                return redirect('franchise/app')->with('success','Date Sheduled And Email Send');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app =Application::find($id);
               
               
        $app->app_status=2;  
        $app ->save();

        return redirect('franchise/app')->with('success','rejected '); 
    }
}
