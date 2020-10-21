<?php

namespace App\Http\Controllers\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Nation;
use App\Job_preference;
use App\Job;
use App\Qualification;
use App\Category;


class JobpreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pref =DB::table('job_preferences')
       
        ->leftjoin('nations','nations.nation_id','job_preferences.nation_id')
        ->leftjoin('states','states.state_id','job_preferences.state_id')
        ->leftjoin('districts','districts.district_id','job_preferences.district_id')
        ->leftjoin('qualifications','qualifications.quali_id','job_preferences.quali_id_1')
        ->leftjoin('subjects','subjects.subject_id','=','job_preferences.subject_id_1')
        ->leftjoin('sub_categories','sub_categories.sub_cat_id','job_preferences.sub_cat_id')
        ->leftjoin('categories','categories.cat_id','job_preferences.cat_id')
        ->leftjoin('jobs','jobs.job_id','job_preferences.job_name')
        ->where('job_preferences.user_id',Auth::user()->user_id)
        ->select('nations.nation_name','nations.nation_id','jobs.job_name','jobs.job_id','states.state_id','states.state_name','districts.district_id','districts.district_name','qualifications.qualification_name',
        'subjects.subject_name','sub_categories.sub_cat_name','categories.cat_name','qualifications.quali_id',
        'subjects.subject_id','job_preferences.experience','job_preferences.exp_salary','sub_categories.sub_cat_id','categories.cat_id','job_preferences.job_type')->first();
        
        
        $cat =Category::select('cat_id','cat_name')->get();
        $quali =Qualification::select('quali_id','qualification_name')->get();
        $nation =Nation::select('nation_id','nation_name')->get();
        $job =Job::select('job_id','job_name')->get();


        return view('user.add_preference',compact('nation','quali','cat','job','pref'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'store':
          
            $this->validate($request, [
           
                'user_id' => 'required',
                'job_name' => 'required',
                'quali' => 'required',
                'subject' => 'required',
                'cat' => 'required',
                
                'nation' => 'required',
                'state' => 'required',
                'district' => 'required',
                'experience' => 'required',
                'job_type' => 'required',
                'exp_salary' => 'required',
    
            ]);
    
                    $job_pref = new Job_preference();
                   
                    $job_pref ->user_id = $request->user_id;
                    $job_pref ->job_name = $request->job_name;
                    $job_pref ->quali_id_1 = $request->quali;
                    $job_pref ->subject_id_1 = $request->subject;
                    $job_pref ->cat_id  = $request->cat;
                    $job_pref ->sub_cat_id = $request->sub_cat;
                    $job_pref ->nation_id = $request->nation;
                    $job_pref ->state_id  = $request->state;
                    $job_pref ->district_id = $request->district;
                    $job_pref ->experience = $request->experience;
                    $job_pref ->job_type  = $request->job_type ;
                    $job_pref ->exp_salary = $request->exp_salary;
    
                             
                                                       
                    $job_pref ->save();
    
               
                 return redirect()->route('user')->with('success','Registration Success');
                break;
    
            case 'update':
      
            $this->validate($request, [
           
                'user_id' => 'required',
                'job_name' => 'required',
                'quali' => 'required',
                'subject' => 'required',
                'cat' => 'required',
                
                'nation' => 'required',
                'state' => 'required',
                'district' => 'required',
                'experience' => 'required',
                'job_type' => 'required',
                'exp_salary' => 'required',
    
            ]);
    
                    $job_pref = Job_preference::find(auth::user()->user_id);
                   
                
                    $job_pref ->job_name = $request->job_name;
                    $job_pref ->quali_id_1 = $request->quali;
                    $job_pref ->subject_id_1 = $request->subject;
                    $job_pref ->cat_id  = $request->cat;
                    $job_pref ->sub_cat_id = $request->sub_cat;
                    $job_pref ->nation_id = $request->nation;
                    $job_pref ->state_id  = $request->state;
                    $job_pref ->district_id = $request->district;
                    $job_pref ->experience = $request->experience;
                    $job_pref ->job_type  = $request->job_type ;
                    $job_pref ->exp_salary = $request->exp_salary;
    
                             
                                                       
                    $job_pref ->save();
    
             
                 return redirect()->route('user.login')->with('success','Registration Success');
                break;
    
               
        }
        

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function change(Request $request)
    {
       
        $this->validate($request, [
           
            'user_id' => 'required',
            'job_name' => 'required',
            'quali' => 'required',
            'subject' => 'required',
            'cat' => 'required',
            
            'nation' => 'required',
            'state' => 'required',
            'district' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'exp_salary' => 'required',

        ]);

                $job_pref = Job_preference::find($request->user_id);
               
               
                $job_pref ->job_name = $request->job_name;
                $job_pref ->quali_id_1 = $request->quali;
                $job_pref ->subject_id_1 = $request->subject;
                $job_pref ->cat_id  = $request->cat;
                $job_pref ->sub_cat_id = $request->sub_cat;
                $job_pref ->nation_id = $request->nation;
                $job_pref ->state_id  = $request->state;
                $job_pref ->district_id = $request->district;
                $job_pref ->experience = $request->experience;
                $job_pref ->job_type  = $request->job_type ;
                $job_pref ->exp_salary = $request->exp_salary;

                	 	
                                                   
                $job_pref ->save();

            // return view('table');
             return redirect()->route('user.job')->with('success','Registration Success');
    }





    public function update(Request $request, $id)
    {
        $this->validate($request, [
           
            'user_id' => 'required',
            'job_name' => 'required',
            'quali' => 'required',
            'subject' => 'required',
            'cat' => 'required',
            
            'nation' => 'required',
            'state' => 'required',
            'district' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'exp_salary' => 'required',

        ]);

                $job_pref = Job_preference::find($id);
               
                $job_pref ->user_id = $request->user_id;
                $job_pref ->job_name = $request->job_name;
                $job_pref ->quali_id_1 = $request->quali;
                $job_pref ->subject_id_1 = $request->subject;
                $job_pref ->cat_id  = $request->cat;
                $job_pref ->sub_cat_id = $request->sub_cat;
                $job_pref ->nation_id = $request->nation;
                $job_pref ->state_id  = $request->state;
                $job_pref ->district_id = $request->district;
                $job_pref ->experience = $request->experience;
                $job_pref ->job_type  = $request->job_type ;
                $job_pref ->exp_salary = $request->exp_salary;

                	 	
                                                   
                $job_pref ->save();

            // return view('table');
             return redirect()->route('user/job')->with('success','Registration Success');
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
}
