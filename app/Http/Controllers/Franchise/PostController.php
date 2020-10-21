<?php

namespace App\Http\Controllers\Franchise;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;
use App\post_office;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = DB::table('post_offices')
        ->join('districts','post_offices.district_id','=','districts.district_id')

        ->select('post_offices.post_office_name','post_offices.pincode','districts.district_name','post_offices.post_office_id')
        ->where('post_offices.status','=', 0 )

        
        ->get();
        

        // $district =District::select('state_id','district_name','district_id')->get();

        return view('admin.view_post', compact('post'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district =District::select('district_id','district_name')->get();

        return view('admin.add_post', compact('district'));
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
            'post_name' => 'required',
            'district_id' => 'required',
            'pincode' => 'required',

        ]);

                $post = new post_office();
                $post->district_id = $request->district_id;
                $post->post_office_name = $request->post_name;
                $post->pincode = $request->pincode;
                $post->save();

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
        $post = DB::table('post_offices')
        
        ->join('districts','post_offices.district_id','=','districts.district_id')
        ->where('post_offices.post_office_id', '=', $id )
        ->select('post_offices.post_office_name','post_offices.pincode','districts.district_name','post_offices.post_office_id')
        ->where('post_offices.status','=', 0 )
        ->where('districts.status','=', 0 )
        

        ->first();

        $district =District::select('district_id','district_name')
        ->where('districts.status','=', 0 )
        ->get();

        return view('admin.edit_post', compact('district','post'));
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
            'post_name' => 'required',
            'district_id' => 'required',
            'pincode' => 'required',

        ]);

                $post = post_office::find($id);
                $post->district_id = $request->district_id;
                $post->post_office_name = $request->post_name;
                $post->pincode = $request->pincode;
                $post->save();

            // return view('table');
             return redirect()->route('admin.post.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $matri = post_office::where('post_office_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.post.index')->with('success','deleted');
    }
}
