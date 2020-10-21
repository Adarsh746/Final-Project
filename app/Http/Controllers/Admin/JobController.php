<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Job;
use App\JobView;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = DB::table('jobs')
        ->leftjoin('nations','nations.nation_id','=','jobs.nation_id')
        ->leftjoin('states','states.state_id','=','jobs.state_id')
        ->leftjoin('districts','districts.district_id','=','jobs.district_id')
        ->leftjoin('employeers','employeers.employeer_id','=','jobs.employeer_id')
        ->leftjoin('qualifications','qualifications.quali_id','=','jobs.quali_id_1')
        ->leftjoin('subjects','subjects.subject_id','=','jobs.subject_id_1')
        ->leftjoin('sub_categories','sub_categories.sub_cat_id','=','jobs.sub_cat_id')
        ->leftjoin('categories','categories.cat_id','=','jobs.cat_id')
        ->where('jobs.verification_status','=',1)
        ->where('jobs.job_status','=',0)
        ->select('qualifications.qualification_name','jobs.job_id','jobs.job_name','employeers.employeer_name','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status')->get();

        return view('admin.view_job', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = DB::table('jobs')
        ->leftjoin('nations','nations.nation_id','=','jobs.nation_id')
        ->leftjoin('states','states.state_id','=','jobs.state_id')
        ->leftjoin('districts','districts.district_id','=','jobs.district_id')
        ->leftjoin('employeers','employeers.employeer_id','=','jobs.employeer_id')
        ->leftjoin('qualifications','qualifications.quali_id','=','jobs.quali_id_1')
        ->leftjoin('subjects','subjects.subject_id','=','jobs.subject_id_1')
        ->leftjoin('sub_categories','sub_categories.sub_cat_id','=','jobs.sub_cat_id')
        ->leftjoin('categories','categories.cat_id','=','jobs.cat_id')
        ->where('jobs.verification_status','=',0)
        ->select('qualifications.qualification_name','jobs.job_id','jobs.job_name','employeers.employeer_name','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status')->get();

        return view('admin.approve_job', compact('job'));


        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $job = DB::table('jobs')
        ->leftjoin('nations','nations.nation_id','=','jobs.nation_id')
        ->leftjoin('states','states.state_id','=','jobs.state_id')
        ->leftjoin('districts','districts.district_id','=','jobs.district_id')
        ->leftjoin('employeers','employeers.employeer_id','=','jobs.employeer_id')
        ->leftjoin('qualifications','qualifications.quali_id','=','jobs.quali_id_1')
        ->leftjoin('subjects','subjects.subject_id','=','jobs.subject_id_1')
        ->leftjoin('sub_categories','sub_categories.sub_cat_id','=','jobs.sub_cat_id')
        ->leftjoin('categories','categories.cat_id','=','jobs.cat_id')
        ->leftjoin('applications','applications.job_id','=','jobs.job_id')
        
        ->where('jobs.job_status','=',0)
        ->where('jobs.verification_status','=',1)
        ->where('jobs.job_id','=',$id)
        ->distinct('jobs.job_id')
        ->select('applications.app_status','applications.user_id','qualifications.qualification_name','jobs.job_id','jobs.job_name','employeers.employeer_name','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status')->first();
    //    $job= $jobl->unique('job_id');
       

   
    
        return view('admin.view_more', compact('job'));




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       

        $job =Job::where('job_id',$id)->first();
        $job ->verification_status = 1;
        $job ->save();
        return redirect('admin/job/create')->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $job =Job::where('job_id',$id)->first();
        $job ->verification_status = 2;
        $job ->save();
        return redirect('admin/job/create')->with('success','deleted');
    }
    public function status()
    {

        $view_month = DB::table('job_views')

        ->select(DB::raw('count(job_views.id) as uacount'),

            DB::raw("UPPER(DATE_FORMAT(job_views.created_at,'%M')) month"),

            DB::raw('YEAR(job_views.created_at) year'))

        ->groupby('year','month')
        ->get();


        
        $application = DB::table('applications')

        ->select(DB::raw('count(applications.app_id) as uacount'),

            DB::raw("UPPER(DATE_FORMAT(applications.created_at,'%M')) month"),

            DB::raw('YEAR(applications.created_at) year'))

        ->groupby('year','month')
        ->get();
        $count = $application->count();

        
        return view('admin.job_view', compact('application','view_month','count'));


    }
}
