<?php

namespace App\Http\Controllers\User;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Local_place;
use App\RealEstate;
use App\User;



class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $real = DB::table('real_estates')
        ->join('local_places','local_places.place_id','=','real_estates.city_id')
        ->join('users','users.user_id','=','real_estates.user_id')
        ->where('real_estates.status','=',1)
        ->select('local_places.place_name','local_places.place_id','real_estates.property_id','real_estates.property_type','real_estates.address','real_estates.property_category','real_estates.rate','real_estates.discription','real_estates.image1','real_estates.image2','real_estates.image3','real_estates.city_id','real_estates.mobile_number','real_estates.mobile_number2','real_estates.user_id','users.user_name')

        ->get();
        
        dd($real);

        return view('user.view_realestate', compact('real'));   
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

        return view('user.add_realestate', compact('post','users'));
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
        $imageName3 = null;

     if ($request['image1']) {
          

        $imageName1 = time() . '.' . $request->file('image1')->Extension();
    
        $request['image1']->move(
        base_path() . '/public/realestate/images/', $imageName1
    );
      }
      if ($request['image2']) {
          

        $imageName2 = time() . '.' . $request->file('image2')->Extension();
    
        $request['image2']->move(
        base_path() . '/public/realestate/images/', $imageName2
    );
      }
      if ($request['image3']) {
          

        $imageName3 = time() . '.' . $request->file('image3')->Extension();
    
        $request['image3']->move(
        base_path() . '/public/realestate/images/', $imageName3
    );
      }

        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'property_type' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'property_category' => 'required',
            
           
         
        ]);

                $real = new RealEstate();
                $real->city_id = $request->city_id;
                $real->user_id = $request->user_id;
                $real->address = $request->address;
                $real->discription = $request->discription;
                $real->property_type = $request->property_type;
                $real->property_category = $request->property_category;
                $real->mobile_number = $request->mobile_number;
                $real->mobile_number2 = $request->mobile_number2;
                 $real->rate = $request->rate;
               
               
                if($imageName1){
                     $real->image1 = $imageName1;
                }
                if($imageName2){
                     $rea2->image2 = $imageName2;
                }
                if($imageName3){
                     $real->image3 = $imageName3;
                }               
                
                $real->save();

                 $typ = $request->property_category ;
                 if( $typ == 0){

                    return redirect()->route('user.realestate.show',0)->with('success','New Property Added');

                 }elseif ($typ == 1) {
                     return redirect()->route('user.realestate.show',1)->with('success','New Property Added');
                 }else{
                    return redirect()->route('user.realestate.show',2)->with('success','New Property Added');
                 }

            // return view('table');
             

    }        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // sale
        if($id == 0)
        {
             $real = DB::table('real_estates')
            ->join('local_places','local_places.place_id','=','real_estates.city_id')
            ->join('users','users.user_id','=','real_estates.user_id')
            ->where('real_estates.status','=',1)
            ->where('real_estates.property_category','=',0)
            ->select('local_places.place_name','local_places.place_id','real_estates.property_id','real_estates.property_type','real_estates.address','real_estates.property_category','real_estates.rate','real_estates.discription','real_estates.image1','real_estates.image2','real_estates.image3','real_estates.city_id','real_estates.mobile_number','real_estates.mobile_number2','real_estates.user_id','users.user_name')

        ->get();
        dd($real);
        }
        elseif($id == 1)
        { //rent
            $real = DB::table('real_estates')
            ->join('local_places','local_places.place_id','=','real_estates.city_id')
            ->join('users','users.user_id','=','real_estates.user_id')
            ->where('real_estates.status','=',1)
            ->where('real_estates.property_category','=',1)
            ->select('local_places.place_name','local_places.place_id','real_estates.property_id','real_estates.property_type','real_estates.address','real_estates.property_category','real_estates.rate','real_estates.discription','real_estates.image1','real_estates.image2','real_estates.image3','real_estates.city_id','real_estates.mobile_number','real_estates.mobile_number2','real_estates.user_id','users.user_name')

        ->get();
        dd($real);
        }
        elseif($id == 2)
        { //lease
            $real = DB::table('real_estates')
            ->join('local_places','local_places.place_id','=','real_estates.city_id')
            ->join('users','users.user_id','=','real_estates.user_id')
            ->where('real_estates.status','=',1)
            ->where('real_estates.property_category','=',2)
            ->select('local_places.place_name','local_places.place_id','real_estates.property_id','real_estates.property_type','real_estates.address','real_estates.property_category','real_estates.rate','real_estates.discription','real_estates.image1','real_estates.image2','real_estates.image3','real_estates.city_id','real_estates.mobile_number','real_estates.mobile_number2','real_estates.user_id','users.user_name')

        ->get();
        dd($real);
        }
        else{
             $real = DB::table('real_estates')
            ->join('local_places','local_places.place_id','=','real_estates.city_id')
            ->join('users','users.user_id','=','real_estates.user_id')
            ->where('real_estates.status','=',1)
            ->select('local_places.place_name','local_places.place_id','real_estates.property_id','real_estates.property_type','real_estates.address','real_estates.property_category','real_estates.rate','real_estates.discription','real_estates.image1','real_estates.image2','real_estates.image3','real_estates.city_id','real_estates.mobile_number','real_estates.mobile_number2','real_estates.user_id','users.user_name')

        ->get();
        dd($real);
        }
       

        return view('user.view_realestate', compact('real')); 
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
        $matri = RealEstate::where('property_id',$id)->first();
        $matri ->status = 0;
        $matri ->save();

        $real = DB::table('real_estates')
        ->where('real_estates.property_id','=',$id)
        ->select('real_estates.property_category')
        ->get();
      
        $typ = $real[0]->property_category ;
                 if( $typ == 0){

                    return redirect()->route('user.realestate.show',0)->with('success','deleted');

                 }elseif ($typ == 1) {
                     return redirect()->route('user.realestate.show',1)->with('success','deleted');
                 }else{
                    return redirect()->route('user.realestate.show',2)->with('success','deleted');
                 }
    }
}
