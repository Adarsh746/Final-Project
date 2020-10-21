<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $search=$request->search;

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
        ->where('jobs.verification_status','=',1)
        ->where('jobs.job_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('jobs.job_discription', 'LIKE', '%'.$search.'%') 
        ->orWhere('subjects.subject_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('qualifications.qualification_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('categories.cat_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('sub_categories.sub_cat_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('nations.nation_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('states.state_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('districts.district_name', 'LIKE', '%'.$search.'%') 
        ->orWhere('jobs.experience', 'LIKE', '%'.$search.'%') 
        ->orWhere('jobs.job_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('jobs.salary', 'LIKE', '%'.$search.'%') 

        ->select('qualifications.qualification_name','jobs.job_id','jobs.job_name','employeers.employeer_name','jobs.job_discription','subjects.subject_name','categories.cat_name','sub_categories.sub_cat_name','nations.nation_name','states.state_name',
        'districts.district_name','jobs.experience','jobs.job_type','jobs.salary','jobs.verification_status')->get();
       
        $appl = DB::table('applications')-> select()->get();

        return view('matching_job', compact('job','appl'));


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
        //
    }
}
