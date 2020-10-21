<?php

namespace App\Http\Controllers\Admin;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;


class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $district = DB::table('states')
        ->join('nations','nations.nation_id','=','states.nation_id')
        ->join('districts','districts.state_id','=','states.state_id')
        ->select('districts.district_name','states.state_name','districts.district_id','districts.state_id')
        ->where('districts.status', '=', 0)

        ->get();
        

        // $district =District::select('state_id','district_name','district_id')->get();

        return view('admin.view_district', compact('district'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state =State::select('state_id','state_name')->get();

        return view('admin.add_district', compact('state'));
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
            'district_name' => 'required',
            'state_id' => 'required',

        ]);

                $district = new District();
                $district->state_id = $request->state_id;
                $district->district_name = $request->district_name;
                
                $district->save();

            // return view('table');
             return redirect()->route('admin.home')->with('success','Registration Success');

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
         $district = DB::table('states')
         ->join('nations','nations.nation_id','=','states.nation_id')
        ->join('districts','districts.state_id','=','states.state_id')
        ->select('districts.district_name','states.state_name','districts.district_id','districts.state_id')
        ->where('districts.status', '=', 0)
         ->where('states.status', '=', 0)
         ->where('nations.status', '=', 0)
        
        ->first();
        $state =State::select('state_id','state_name')
           ->where('states.status', '=', 0)
        ->get();

        return view('admin.edit_district', compact('state','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request, $id)
    {
         $this->validate($request, [
            'district_name' => 'required',
            'state_id' => 'required',

        ]);

                $district = district::find($id);
                $district->state_id = $request->state_id;
                $district->district_name = $request->district_name;
                
                $district->save();

            // return view('table');
             return redirect()->route('admin.district.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri = District::where('district_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.district.index')->with('success','deleted');
    }
}
