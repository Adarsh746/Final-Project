<?php

namespace App\Http\Controllers\Admin;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Qualification;

class QualiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quali =Qualification::select('quali_id','qualification_name')
        ->where('qualifications.status', '=', 0)
        ->get();


        return view('admin.view_quali', compact('quali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_qualification');

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
            'qualification_name' => 'required',

        ]);

                $qualification = new Qualification();
                $qualification->qualification_name = $request->qualification_name;
                
                $qualification->save();

            // return view('table');
             return redirect()->route('admin.qualification.index')->with('success','Registration Success');

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
        $quali =Qualification::select('quali_id','qualification_name')
        ->where('qualifications.status', '=',0)
        ->where('qualifications.quali_id', '=',$id)
        ->first();
        return view('admin.edit_quali', compact('quali'));
      
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
            'qualification_name' => 'required',

        ]);

                $qualification =Qualification::find($id);
                $qualification->qualification_name = $request->qualification_name;
                
                $qualification->save();

            // return view('table');
             return redirect()->route('admin.qualification.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $matri = Qualification::where('quali_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.qualification.index')->with('success','deleted'); 
    }
}
