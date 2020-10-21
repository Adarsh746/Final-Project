<?php

namespace App\Http\Controllers\Franchise;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Job;
use App\Nation;
use App\Qualification;
use App\Category;

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
        ->where('jobs.job_status','=',0)
        ->select('qualifications.qualification_name','jobs.job_id','jobs.job_name','employeers.employeer_name','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status')->get();

        return view('employeer.view_jobs', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat =Category::select('cat_id','cat_name')->get();
        $quali =Qualification::select('quali_id','qualification_name')->get();
        $nation =Nation::select('nation_id','nation_name')->get();
        $job =Job::select('job_id','job_name')->get();


        return view('employeer.add_job',compact('nation','quali','cat','job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request, [
         
            'emp_id' => 'required',
            'job_name' => 'required',
            'about' => 'required',
            'quali' => 'required',
            'subject' => 'required',
            'cat' => 'required',
            // 'sub_cat' => 'required',
            'nation' => 'required',
            'state' => 'required',
            'district' => 'required',
            // 'experience' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
        ]);

                $job = new Job();
               
                $job ->employeer_id = $request->emp_id ;
                $job ->job_name = $request->job_name;
                $job ->job_discription = $request->about;
                $job ->quali_id_1 = $request->quali;
                $job ->subject_id_1 = $request->subject;
                $job ->cat_id  = $request->cat;
                $job ->sub_cat_id = $request->subcat;
                $job ->nation_id = $request->nation;
                $job ->state_id  = $request->state;
                $job ->district_id = $request->district;
                $job ->experience = $request->experience;
                $job ->job_type  = $request->job_type ;
                $job ->salary = $request->salary;

                	 	
                                                   
                $job ->save();

            // return view('table');
             return redirect()->route('employeer.job.index')->with('success','Registration Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat =Category::select('cat_id','cat_name')->get();
        $quali =Qualification::select('quali_id','qualification_name')->get();
        $nation =Nation::select('nation_id','nation_name')->get();
        $job =Job::select('job_id','job_name')->get();


       


        $jobl = DB::table('jobs')
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
        ->where('jobs.job_id','=',$id)
        ->distinct('jobs.job_id')
        ->select('applications.app_status','qualifications.quali_id','applications.user_id','qualifications.qualification_name','categories.cat_id','jobs.job_id','jobs.job_name','employeers.employeer_name','subjects.subject_id','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_id','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status','nations.nation_id','states.state_id',
        'districts.district_id')->first();
    //    $job= $jobl->unique('job_id');
    // dd($job);
        return view('employeer.edit_job', compact('jobl','nation','quali','cat','job'));
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
    // dd($job);
        return view('employeer.view_more', compact('job'));
       
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
         
            'emp_id' => 'required',
            'job_name' => 'required',
            'about' => 'required',
            'quali' => 'required',
            'subject' => 'required',
            'cat' => 'required',
            // 'sub_cat' => 'required',
            'nation' => 'required',
            'state' => 'required',
            'district' => 'required',
            // 'experience' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
        ]);

                $job = Job::find($id);
               
               
                $job ->job_name = $request->job_name;
                $job ->job_discription = $request->about;
                $job ->quali_id_1 = $request->quali;
                $job ->subject_id_1 = $request->subject;
                $job ->cat_id  = $request->cat;
                $job ->sub_cat_id = $request->subcat;
                $job ->nation_id = $request->nation;
                $job ->state_id  = $request->state;
                $job ->district_id = $request->district;
                $job ->experience = $request->experience;
                $job ->job_type  = $request->job_type ;
                $job ->salary = $request->salary;

                	 	
                                                   
                $job ->save();

            // return view('table');
             return redirect()->route('employeer.job.index')->with('success','Registration Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job ->job_status = 1;
        $job ->save();
        return redirect('employeer/job')->with('success','deleted');    
    }
}
