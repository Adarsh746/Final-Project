<?php

namespace App\Http\Controllers\Admin;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;
use App\post_office;
use App\Local_place;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
        $city = DB::table('local_places')
        ->join('post_offices','local_places.post_office_id','=','post_offices.post_office_id')
        ->select ('post_offices.post_office_name','post_offices.pincode','local_places.place_name','post_offices.post_office_id','local_places.place_id')
        ->where('local_places.status','=',0)
         ->where('post_offices.status','=',0)
        ->get();
        

        return view('admin.view_city', compact('city'));   
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = post_office::select('post_office_id','post_office_name','pincode')->get();

        return view('admin.add_city', compact('post'));
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
            'city_name' => 'required',
            'post_id' => 'required',

        ]);

                $post = new Local_place();
                $post->place_name = $request->city_name;
                $post->post_office_id = $request->post_id;
                $post->save();

            // return view('table');
             return redirect()->route('admin.city.index')->with('success','New City Added');

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
        $city = DB::table('local_places')
        ->join('post_offices','local_places.post_office_id','=','post_offices.post_office_id')
         ->where('local_places.place_id', '=', $id )
        ->select ('post_offices.post_office_name','post_offices.pincode','local_places.place_name','post_offices.post_office_id','local_places.place_id')
        ->where('local_places.status','=',0)
        ->where('post_offices.status','=',0)
        ->first();
        
        $post = post_office::select('post_office_id','post_office_name','pincode')
        ->where('post_offices.status','=',0)

        ->get();

        return view('admin.edit_city', compact('post','city'));
        

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
            'city_name' => 'required',
            'post_id' => 'required',

        ]);

                $post = Local_place::find($id);
                $post->place_name = $request->city_name;
                $post->post_office_id = $request->post_id;
                $post->save();

            // return view('table');
             return redirect()->route('admin.city.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matri = local_place::where('place_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.city.index')->with('success','deleted');
    }
}
