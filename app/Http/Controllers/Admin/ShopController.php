<?php

namespace App\Http\Controllers\Admin;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Shop;
use App\User;
use App\Local_place;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = DB::table('shops')
->join('local_places','local_places.place_id','=','shops.city_id')
->join('users','users.user_id','=','shops.user_id')


->select('shops.shop_id','shops.city_id','users.user_name','shops.shop_name','shops.shop_cat_name','shops.image1','shops.image2','shops.image3','shops.image4','shops.image5','shops.address','shops.logo','shops.banner','shops.website','shops.facebook','shops.twitter','shops.instagram','shops.whatsapp','shops.open_time','shops.youtube','shops.close_time','shops.mobile_number','shops.mobile_number2','local_places.place_name')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('shops.status', '=', 0)
->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('admin.view_shop', compact('shop'));     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
   $city =Local_place::select('place_id','place_name')
   ->get();

    return view('admin.add_shop', compact('user','city'));
  }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
        $imageName1 = null;
        $imageName2 = null;
        $imageName3 = null;
        $imageName4 = null;
        $imageName5 = null;
        $baner = null;
        $log = null;


       
     if ($request['image1']) {
        $imageName1 = time() . '1.' . $request->file('image1')->Extension();
        $request['image1']->move(
        base_path() . '/public/shop/images/', $imageName1
    );
      }
      if ($request['image2']) {
        $imageName2 = time() . '2.' . $request->file('image2')->Extension();
        $request['image2']->move(
        base_path() . '/public/shop/images/', $imageName2
    );
      }
      if ($request['image3']) {
        $imageName3 = time() . '3.' . $request->file('image3')->Extension();
        $request['image3']->move(
        base_path() . '/public/shop/images/', $imageName3
    );
      }
      if ($request['image4']) {
        $imageName4 = time() . '4.' . $request->file('image4')->Extension();
        $request['image4']->move(
        base_path() . '/public/shop/images/', $imageName4
    );
      }
      if ($request['image3']) {
        $imageName5 = time() . '5.' . $request->file('image5')->Extension();
        $request['image5']->move(
        base_path() . '/public/shop/images/', $imageName5
    );
      }
      if ($request['banner']) {
        $baner = time() . '6.' . $request->file('banner')->Extension();
        $request['banner']->move(
        base_path() . '/public/shop/images/', $baner
    );
      }
      if ($request['logo']) {
        $log = time() . '7.' . $request->file('logo')->Extension();
        $request['logo']->move(
        base_path() . '/public/shop/images/', $log
    );
      }
        $this->validate($request, [
           'shop_name' => 'required',
           'shop_cat_name' => 'required',
           'open_time' => 'required',
           'close_time' => 'required',
           'user_id' => 'required',
           'place_id' => 'required',
           'shop_cat_name' => 'required',
           'address' => 'required',
           'mobile_number' => 'required'



         ]);

             $shop = new shop();
            $shop->city_id = $request->place_id;
            $shop->user_id = $request->user_id;
            $shop->shop_name = $request->shop_name;
            $shop->shop_cat_name = $request->shop_cat_name;
            $shop->address = $request->address;
            $shop->mobile_number = $request->mobile_number;
            $shop->mobile_number2 = $request->mobile_number2;
            $shop->open_time = $request->open_time;
            $shop->close_time = $request->close_time;
            $shop->website = $request->website;
            $shop->facebook = $request->facebook;
            $shop->twitter = $request->twitter;
            $shop->whatsapp = $request->whatsapp;
            $shop->instagram = $request->instagram;
            $shop->youtube = $request->youtube;
            // $shop->logo = $request->logo;
            // $shop->banner = $request->banner;
            // $shop->image1 = $request->image1;
            // $shop->image2 = $request->image2;
            // $shop->image3 = $request->image3;
            // $shop->image4 = $request->image4;
            // $shop->image5 = $request->image5;
            if($imageName1){
                     $shop->image1 = $imageName1;
                }
                if($imageName2){
                     $shop->image2 = $imageName2;
                }
                if($imageName3){
                     $shop->image3 = $imageName3;
                }
                if($imageName4){
                     $shop->image4 = $imageName4;
                }
                if($imageName5){
                     $shop->image5 = $imageName5;
                }
                if($baner){
                     $shop->banner = $baner;
                }
                if($log){
                     $shop->logo = $log;
                }



                
               $shop->save();

          // return view('table');
        return redirect()->route('admin.shop.index')->with('success','Registration Success');

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

        $shop = DB::table('shops')
->join('local_places','local_places.place_id','=','shops.city_id')
->join('users','users.user_id','=','shops.user_id')
->where('shops.shop_id', '=', $id)


->select('shops.shop_id','shops.city_id','users.user_name','shops.shop_name','shops.shop_cat_name','shops.image1','shops.image2','shops.image3','shops.image4','shops.image5','shops.address','shops.logo','shops.banner','shops.website','shops.facebook','shops.twitter','shops.instagram','shops.whatsapp','shops.open_time','shops.youtube','shops.close_time','shops.mobile_number','shops.mobile_number2','local_places.place_name')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('shops.status', '=', 0)

->first();

$user =User::select('user_id','user_name')->get();
   $city =Local_place::select('place_id','place_name')
   ->get();

    return view('admin.edit_shop', compact('user','city','shop'));

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
        $imageName1 = null;
        $imageName2 = null;
        $imageName3 = null;
        $imageName4 = null;
        $imageName5 = null;
        $baner = null;
        $log = null;


       
     if ($request['image1']) {
        $imageName1 = time() . '1.' . $request->file('image1')->Extension();
        $request['image1']->move(
        base_path() . '/public/shop/images/', $imageName1
    );
      }
      if ($request['image2']) {
        $imageName2 = time() . '2.' . $request->file('image2')->Extension();
        $request['image2']->move(
        base_path() . '/public/shop/images/', $imageName2
    );
      }
      if ($request['image3']) {
        $imageName3 = time() . '3.' . $request->file('image3')->Extension();
        $request['image3']->move(
        base_path() . '/public/shop/images/', $imageName3
    );
      }
      if ($request['image4']) {
        $imageName4 = time() . '4.' . $request->file('image4')->Extension();
        $request['image4']->move(
        base_path() . '/public/shop/images/', $imageName4
    );
      }
      if ($request['image3']) {
        $imageName5 = time() . '5.' . $request->file('image5')->Extension();
        $request['image5']->move(
        base_path() . '/public/shop/images/', $imageName5
    );
      }
      if ($request['banner']) {
        $baner = time() . '6.' . $request->file('banner')->Extension();
        $request['banner']->move(
        base_path() . '/public/shop/images/', $baner
    );
      }
      if ($request['logo']) {
        $log = time() . '7.' . $request->file('logo')->Extension();
        $request['logo']->move(
        base_path() . '/public/shop/images/', $logs
    );
      }
        $this->validate($request, [
           'shop_name' => 'required',
           'shop_cat_name' => 'required',
           'open_time' => 'required',
           'close_time' => 'required',
           'user_id' => 'required',
           'place_id' => 'required',
           'shop_cat_name' => 'required',
           'address' => 'required',
           'mobile_number' => 'required'



         ]);

             $shop = shop::find($id);
            $shop->city_id = $request->place_id;
            $shop->user_id = $request->user_id;
            $shop->shop_name = $request->shop_name;
            $shop->shop_cat_name = $request->shop_cat_name;
            $shop->address = $request->address;
            $shop->mobile_number = $request->mobile_number;
            $shop->mobile_number2 = $request->mobile_number2;
            $shop->open_time = $request->open_time;
            $shop->close_time = $request->close_time;
            $shop->website = $request->website;
            $shop->facebook = $request->facebook;
            $shop->twitter = $request->twitter;
            $shop->whatsapp = $request->whatsapp;
            $shop->instagram = $request->instagram;
            $shop->youtube = $request->youtube;
            
            if($imageName1){
                     $shop->image1 = $imageName1;
                }
                if($imageName2){
                     $shop->image2 = $imageName2;
                }
                if($imageName3){
                     $shop->image3 = $imageName3;
                }
                if($imageName4){
                     $shop->image4 = $imageName4;
                }
                if($imageName5){
                     $shop->image5 = $imageName5;
                }
                if($baner){
                     $shop->banner = $baner;
                }
                if($log){
                     $shop->logo = $log;
                }



                
               $shop->save();

          // return view('table');
        return redirect()->route('admin.shop.index')->with('success','Updated');

        // $this->validate($request, [
        //     'state_name' => 'required',
        //     'nation_id' => 'required',

        // ]);

        //         $state = state::find($id);
        //         $state->nation_id = $request->nation_id;
        //         $state->state_name = $request->state_name;
                
        //         $state->save();
        //         return redirect()->route('admin.state.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri = Shop::where('shop_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.shop.index')->with('success','deleted');
    }
}
