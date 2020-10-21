<?php

namespace App\Http\Controllers\User;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Local_place;
use App\User;
use App\Taxi;


class TaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $taxi = DB::table('taxis')
        ->join('local_places','local_places.place_id','=','taxis.city_id')
        ->join('users','users.user_id','=','taxis.user_id')
        ->where('taxis.status','=',0)
        ->select('local_places.place_name','local_places.place_id','taxis.taxi_id','taxis.address','taxis.taxi_name','taxis.catagory','taxis.rate','taxis.discription','taxis.image1','taxis.image2','taxis.city_id','taxis.mobile_number','taxis.mobile_number2','taxis.user_id','users.user_name','taxis.taxi_type','taxis.available_to','taxis.available_from','taxis.vehicle_no','taxis.taxi_capacity')
        ->get();
        dd($taxi);
        
        return view('user.view_taxi', compact('taxi'));   
         }   




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Local_place::select('place_id','place_name')->get();
        $users = User::select('user_id','user_name')->get();
       
        return view('admin.add_taxi', compact('post','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    { 
       


        $imageName1 = null;
        $imageName2 = null;
       
     if ($request['image1']) {
        $imageName1 = time() . '1.' . $request->file('image1')->Extension();
        $request['image1']->move(
        base_path() . '/public/taxi/images/', $imageName1
    );
      }
      if ($request['image2']) {
        $imageName2 = time() . '2.' . $request->file('image2')->Extension();
        $request['image2']->move(
        base_path() . '/public/taxi/images/', $imageName2
    );
      }
      

        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
           'taxi_name' => 'required',
            'catagory' => 'required',
            'taxi_type' => 'required',
            'vehicle_no' => 'required',
            'available_to' => 'required|date_format:H:i',
            'available_from' => 'required|date_format:H:i'
        ]);
                $taxi = new Taxi();
                $taxi->city_id = $request->city_id;
                $taxi->user_id = $request->user_id;
                $taxi->taxi_name = $request->taxi_name;
                $taxi->address = $request->address;
                $taxi->discription = $request->discription;
                $taxi->available_to = $request->available_to;
                $taxi->available_from = $request->available_from;
                $taxi->taxi_capacity = $request->taxi_capacity;
                $taxi->catagory = $request->catagory;
                $taxi->mobile_number = $request->mobile_number;
                $taxi->mobile_number2 = $request->mobile_number2;
                $taxi->taxi_type = $request->taxi_type;
                $taxi->rate = $request->rate;
                $taxi->vehicle_no = $request->vehicle_no;
                if($imageName1){
                     $taxi->image1 = $imageName1;
                }
                if($imageName2){
                     $taxi->image2 = $imageName2;
                }
                $taxi->save();
                return redirect()->route('admin.taxi.index')->with('success','New Taxi Added');
                
            
    }        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $taxi = DB::table('taxis')
        ->join('local_places','local_places.place_id','=','taxis.city_id')
        ->join('users','users.user_id','=','taxis.user_id')
        ->where('taxis.status','=',0)
        ->where('taxis.taxi_id','=',$id)
        ->select('local_places.place_name','local_places.place_id','taxis.taxi_id','taxis.address','taxis.taxi_name','taxis.catagory','taxis.rate','taxis.discription','taxis.image1','taxis.image2','taxis.city_id','taxis.mobile_number','taxis.mobile_number2','taxis.user_id','users.user_name','taxis.taxi_type','taxis.available_to','taxis.available_from','taxis.vehicle_no','taxis.taxi_capacity')
        ->first();
          $post = Local_place::select('place_id','place_name')->get();
        $users = User::select('user_id','user_name')->get();
        
        return view('admin.edit_taxi', compact('taxi','post','users')); 
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
        dd($request);
         $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
           'taxi_name' => 'required',
            'catagory' => 'required',
            'taxi_type' => 'required',
            'vehicle_no' => 'required',
            'available_to' => 'required',
            'available_from' => 'required'
        ]);
                $taxi = Taxi::find($id);
               
                $taxi->city_id = $request->city_id;
                $taxi->user_id = $request->user_id;
                $taxi->taxi_name = $request->taxi_name;
                $taxi->address = $request->address;
                $taxi->discription = $request->discription;
                $taxi->available_to = $request->available_to;
                $taxi->available_from = $request->available_from;
                $taxi->taxi_capacity = $request->taxi_capacity;
                $taxi->catagory = $request->catagory;
                $taxi->mobile_number = $request->mobile_number;
                $taxi->mobile_number2 = $request->mobile_number2;
                $taxi->taxi_type = $request->taxi_type;
                $taxi->rate = $request->rate;
                $taxi->vehicle_no = $request->vehicle_no;
               
                $taxi->save();
                return redirect()->route('admin.taxi.index')->with('success','Updated');
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
            'user_id' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
           'taxi_name' => 'required',
            'catagory' => 'required',
            'taxi_type' => 'required',
            'vehicle_no' => 'required',
            'available_to' => 'required',
            'available_from' => 'required'
        ]);
                $taxi = Taxi::find($id);
               
                $taxi->city_id = $request->city_id;
                $taxi->user_id = $request->user_id;
                $taxi->taxi_name = $request->taxi_name;
                $taxi->address = $request->address;
                $taxi->discription = $request->discription;
                $taxi->available_to = $request->available_to;
                $taxi->available_from = $request->available_from;
                $taxi->taxi_capacity = $request->taxi_capacity;
                $taxi->catagory = $request->catagory;
                $taxi->mobile_number = $request->mobile_number;
                $taxi->mobile_number2 = $request->mobile_number2;
                $taxi->taxi_type = $request->taxi_type;
                $taxi->rate = $request->rate;
                $taxi->vehicle_no = $request->vehicle_no;
               
                $taxi->save();
                return redirect()->route('admin.taxi.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $matri = Taxi::where('taxi_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();

        
        return redirect()->route('admin.taxi.index')->with('success','deleted');
             
    }
}
