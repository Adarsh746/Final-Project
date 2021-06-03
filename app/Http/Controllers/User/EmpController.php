<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->select()
        ->where('franchises.account_status', '=', 0)
        ->where('franchises.aproval_status', '=', 1)
        ->where('franchises.post_office_id','=',Auth::user()->post_office_id )
        
        ->get();        
                $user =User::select('user_id','user_name')->get();
   // $city =Local_place::select('place_id','place_name')
   // ->get();
        return view('user.view_emp', compact('emp'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->select('franchises.franchise_id','franchises.email','franchises.franchise_name','franchises.contact','nations.nation_name','states.state_name','districts.district_name','franchises.email')
        ->where('franchises.aproval_status', '=', 0)
        ->where('franchises.account_status', '=', 0)
        
        ->get();        
                
        return view('admin.aprove_emp', compact('emp'));
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
    public function update($id)
    {
        

        $emp =Franchise::find($id);
        $emp ->aproval_status = 1;
        $emp ->save();
        return redirect('admin/emp/create')->with('success','updated');
    }

    
     /** Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp =Franchise::find($id);
        $emp ->account_status = 1;
        $emp ->save();
        return redirect()->route('admin.emp.index')->with('success','deleted');
        
    }
    
}
