<?php

namespace App\Http\Controllers\User;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;
use App\post_office;
use App\Local_place;
use App\Atm;


class AtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $atm = DB::table('atms')
        ->join('local_places','local_places.place_id','=','atms.city_id')
        ->where('atms.status','=',0)
        ->select ('local_places.place_name','local_places.place_id','atms.atm_id','atms.atm_bank','atms.atm_address','atms.atm_type','atms.atm_close_time','atms.atm_open_time','atms.atm_image')
        ->get();
        dd($atm);
        return view('user.view_atm', compact('atm'));   
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Local_place::select('place_id','place_name')->get();

        return view('admin.add_atm', compact('post'));
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
            'atm_type' => 'required',
            'atm_bank' => 'required',
            'atm_address' => 'required'
         
        ]);

                $post = new Atm();
                $post->city_id = $request->city_id;
                $post->atm_type = $request->atm_type;
                $post->atm_bank = $request->atm_bank;
                $post->atm_address = $request->atm_address;
                $post->atm_open_time = $request->atm_open_time;
                $post->atm_close_time = $request->atm_close_time;
                $post->save();

            // return view('table');
             return redirect()->route('admin.atm.index')->with('success','New ATM Added');

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


       $atms = DB::table('atms')
        ->join('local_places','local_places.place_id','=','atms.city_id')
        ->where('atms.status','=',0)
        ->where('atms.atm_id','=',$id)
        ->select ('local_places.place_name','local_places.place_id','atms.atm_id','atms.atm_bank','atms.atm_address','atms.atm_type','atms.atm_close_time','atms.atm_open_time','atms.atm_image')
        ->first();
       
        $post = Local_place::select('place_id','place_name')->get();


        return view('admin.edit_atm', compact('post','atms'));


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
            'atm_type' => 'required',
            'atm_bank' => 'required',
            'atm_address' => 'required'
         
        ]);
       $post = Atm::find($id);
                $post->city_id = $request->city_id;
                $post->atm_type = $request->atm_type;
                $post->atm_bank = $request->atm_bank;
                $post->atm_address = $request->atm_address;
                $post->atm_open_time = $request->atm_open_time;
                $post->atm_close_time = $request->atm_close_time;
                $post->save();
                return redirect()->route('admin.atm.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $matri = Atm::where('atm_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.atm.index')->with('success','deleted');
    }
}
