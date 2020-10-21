<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ticket;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $job = DB::table('jobs')
       
        ->leftjoin('employeers','employeers.employeer_id','=','jobs.employeer_id')
        
        ->select('jobs.job_id','jobs.job_name','employeers.employeer_name')->get();
       
        return $job;
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
       
        $this->validate($request, [
           
            'job' => 'required',
            

        ]);

  
if(Auth::guard() == 'employeer') {
    if ($request->job == 0) {
    
        $report = new ticket();
    
        $report ->others = 1;
        $report ->employeer_id = auth::user()->employeer_id;
                           
    $report ->save();
                   
    }
    else {
    
        $report = new ticket();
    
        $report ->job_id = $request->job;
        $report ->employeer_id = auth::user()->employeer_id;
                           
    $report ->save();
       
    }


} 
else {

if ($request->job == 0) {
    
    $report = new ticket();

    $report ->others = 1;
    $report ->user_id = auth::user()->user_id;
                       
$report ->save();
               
}
else {

    $report = new ticket();

    $report ->job_id = $request->job;
    $report ->user_id = auth::user()->user_id;
                       
$report ->save();
   
}

}
           
             return redirect()->route('user.login')->with('success','Registration Success');
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
