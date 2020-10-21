<?php

namespace App\Http\Controllers\Admin;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nation;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

 
        $nation =Nation::select('nation_id','nation_name')
        ->where('nations.status','=',0)
        ->get();

        return view('admin.view_nation', compact('nation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_nation');
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
            'nation_name' => 'required',

        ]);

                $nation = new Nation();
                $nation->nation_name = $request->nation_name;
                
                $nation->save();

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
      
      $nation =Nation::select('nation_id','nation_name')
      ->where('nations.status','=',0)
        ->where('nations.nation_id','=',$id)
        ->first();
      return view('admin.edit_nation', compact('nation'));

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
            'nation_name' => 'required',

        ]);

                $nation = Nation::find($id);
                $nation->nation_name = $request->nation_name;
                
                $nation->save();
                return redirect()->route('admin.nation.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matri = Nation::find($id);
       
        $matri->status = 1;
        $matri ->save();

        
        return redirect()->route('admin.nation.index')->with('success','deleted');
    }
}
