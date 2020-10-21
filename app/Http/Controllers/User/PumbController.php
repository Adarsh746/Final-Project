<?php

namespace App\Http\Controllers\User;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;
use App\post_office;
use App\Local_place;
use App\petrol_pumb;


class PumbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
        $pumb = DB::table('petrol_pumbs')
        ->join('local_places','local_places.place_id','=','petrol_pumbs.city_id')
        ->where('petrol_pumbs.status','=',0)
        ->select ('local_places.place_name','local_places.place_id','petrol_pumbs.pumb_id','petrol_pumbs.pumb_name','petrol_pumbs.pumb_address','petrol_pumbs.pumb_company','petrol_pumbs.pumb_close_time','petrol_pumbs.pumb_open_time','petrol_pumbs.pumb_image')
        ->get();
        dd($pumb);
        return view('user.view_pumb', compact('pumb'));   
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Local_place::select('place_id','place_name')->get();

        return view('admin.add_pumb', compact('post'));
        
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
            'city_id' => 'required',
            'pumb_name' => 'required',
            'pumb_company' => 'required',
            'pumb_address' => 'required',
            'pumb_open_time' => 'required',
            'pumb_close_time' => 'required'
         
        ]);

                $post = new petrol_pumb();
                $post->city_id = $request->city_id;
                $post->pumb_name = $request->pumb_name;
                $post->pumb_company = $request->pumb_company;
                $post->pumb_address = $request->pumb_address;
                $post->pumb_open_time = $request->pumb_open_time;
                $post->pumb_close_time = $request->pumb_close_time;
                $post->save();

            // return view('table');
             return redirect()->route('admin.pumb.index')->with('success','New Petrol Pumb Added');

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
         $pumb = DB::table('petrol_pumbs')
        ->join('local_places','local_places.place_id','=','petrol_pumbs.city_id')
        ->where('petrol_pumbs.status','=',0)
        ->select ('local_places.place_name','local_places.place_id','petrol_pumbs.pumb_id','petrol_pumbs.pumb_name','petrol_pumbs.pumb_address','petrol_pumbs.pumb_company','petrol_pumbs.pumb_close_time','petrol_pumbs.pumb_open_time','petrol_pumbs.pumb_image')
        ->first();
        $post = Local_place::select('place_id','place_name')->get();

        return view('admin.edit_pumb', compact('post','pumb'));

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
            'city_id' => 'required',
            'pumb_name' => 'required',
            'pumb_company' => 'required',
            'pumb_address' => 'required',
            'pumb_open_time' => 'required',
            'pumb_close_time' => 'required'
         
        ]);

                $post = petrol_pumb::find($id);
                $post->city_id = $request->city_id;
                $post->pumb_name = $request->pumb_name;
                $post->pumb_company = $request->pumb_company;
                $post->pumb_address = $request->pumb_address;
                $post->pumb_open_time = $request->pumb_open_time;
                $post->pumb_close_time = $request->pumb_close_time;
                $post->save();

            // return view('table');
             return redirect()->route('admin.pumb.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri = petrol_pumb::where('pumb_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.pumb.index')->with('success','deleted');
    }
}
