<?php

namespace App\Http\Controllers\Franchise;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Local_place;
use App\RealEstate;
use App\User;
use App\Used_item;
use App\Shopping_category;
use App\Shopping_sub_category;
use Illuminate\Support\Facades\Auth;

class UsedItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
         $user_post = $user->post_office_id;
         
         $cty = DB::table('local_places')
         ->where('post_office_id',$user_post)
         ->get();
        foreach ($cty as $index => $value) {
            $city_id[$index] = $value->place_id;
        }



        $real = DB::table('used_items')
        ->join('local_places','local_places.place_id','=','used_items.city_id')
        ->join('users','users.user_id','=','used_items.user_id')
        ->join('shopping_sub_categories', 'shopping_sub_categories.shopping_sub_cat_id', '=', 'used_items.shopping_sub_cat_id')
        ->where('used_items.status','=',0)
        ->whereIn('useditems.city_id',$city_id)
        ->select('local_places.place_name','local_places.place_id','used_items.property_id','used_items.address','used_items.item_name','used_items.shopping_sub_cat_id','used_items.rate','used_items.discription','used_items.image1','used_items.image2','used_items.image3','used_items.date_of_manufacture','used_items.city_id','used_items.mobile_number','used_items.mobile_number2','used_items.user_id','users.user_name','shopping_sub_categories.shopping_sub_cat_name')

        ->get();
        
        return view('franchise.view_useditem', compact('real'));   
         }   




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $user = Auth::user();
         $user_post = $user->post_office_id;
         
         $cty = DB::table('local_places')
         ->where('post_office_id',$user_post)
         ->get();
        foreach ($cty as $index => $value) {
            $city_id[$index] = $value->place_id;
        }

        $post = Local_place::select('place_id','place_name')
        ->whereIn('place_id',$city_id)->get();
        $users = User::select('user_id','user_name')->get();
        $sub_cat =Shopping_sub_category::select('shopping_sub_cat_id','shopping_sub_cat_name')->get();
        return view('franchise.add_useditems', compact('post','users','sub_cat'));
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
        base_path() . '/public/useditems/images/', $imageName1
    );
      }
      if ($request['image2']) {
        $imageName2 = time() . '.' . $request->file('image2')->Extension();
        $request['image2']->move(
        base_path() . '/public/useditems/images/', $imageName2
    );
      }
      if ($request['image3']) {
        $imageName3 = time() . '.' . $request->file('image3')->Extension();
        $request['image3']->move(
        base_path() . '/public/useditems/images/',$imageName3
    );
      }
        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
           'item_name' => 'required',
            'shopping_sub_cat_id' => 'required',
            'date_of_manufacture' => 'required'
      
        ]);
                $real = new Used_item();
                $real->city_id = $request->city_id;
                $real->user_id = $request->user_id;
                $real->item_name = $request->item_name;
                $real->address = $request->address;
                $real->discription = $request->discription;
                $real->shopping_sub_cat_id = $request->shopping_sub_cat_id;
                $real->mobile_number = $request->mobile_number;
                $real->mobile_number2 = $request->mobile_number2;
                $real->date_of_manufacture = $request->date_of_manufacture;
                $real->rate = $request->rate;
                if($imageName1){
                     $real->image1 = $imageName1;
                }
                if($imageName2){
                     $real->image2 = $imageName2;
                }
                if($imageName3){
                     $real->image3 = $imageName3;
                }               
                $real->save();
              
               
                return redirect()->route('franchise.useditems.index')->with('success','New Item Added');
                
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = Auth::user();
         $user_post = $user->post_office_id;
         
         $cty = DB::table('local_places')
         ->where('post_office_id',$user_post)
         ->get();
        foreach ($cty as $index => $value) {
            $city_id[$index] = $value->place_id;
        }
            

         $used_items = DB::table('used_items')
        ->join('local_places','local_places.place_id','=','used_items.city_id')
        ->join('users','users.user_id','=','used_items.user_id')
        ->join('shopping_sub_categories', 'shopping_sub_categories.shopping_sub_cat_id', '=', 'used_items.shopping_sub_cat_id')
        ->where('used_items.status','=',0)
        ->where('used_items.property_id','=',$id)
        ->select('local_places.place_name','local_places.place_id','used_items.property_id','used_items.address','used_items.item_name','used_items.shopping_sub_cat_id','used_items.rate','used_items.discription','used_items.image1','used_items.image2','used_items.image3','used_items.date_of_manufacture','used_items.city_id','used_items.mobile_number','used_items.mobile_number2','used_items.user_id','users.user_name','shopping_sub_categories.shopping_sub_cat_name')
           ->first();

            $post = Local_place::select('place_id','place_name')
            ->whereIn('place_id',$city_id)->get();
        $users = User::select('user_id','user_name')->get();
        $sub_cat =Shopping_sub_category::select('shopping_sub_cat_id','shopping_sub_cat_name')->get();
        return view('franchise.edit_useditems', compact('post','users','sub_cat','used_items'));
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
     if ($request['image1']) {
        $imageName1 = time() . '.' . $request->file('image1')->Extension();
        $request['image1']->move(
        base_path() . '/public/useditems/images/', $imageName1
    );
      }
      if ($request['image2']) {
        $imageName2 = time() . '.' . $request->file('image2')->Extension();
        $request['image2']->move(
        base_path() . '/public/useditems/images/', $imageName2
    );
      }
      if ($request['image3']) {
        $imageName3 = time() . '.' . $request->file('image3')->Extension();
        $request['image3']->move(
        base_path() . '/public/useditems/images/',$imageName3
    );
      }
        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'discription' => 'required',
            'rate' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
           'item_name' => 'required',
            'shopping_sub_cat_id' => 'required',
            'date_of_manufacture' => 'required'
      
        ]);
                $real = Used_item::find($id);
                $real->city_id = $request->city_id;
                $real->user_id = $request->user_id;
                $real->item_name = $request->item_name;
                $real->address = $request->address;
                $real->discription = $request->discription;
                $real->shopping_sub_cat_id = $request->shopping_sub_cat_id;
                $real->mobile_number = $request->mobile_number;
                $real->mobile_number2 = $request->mobile_number2;
                $real->date_of_manufacture = $request->date_of_manufacture;
                $real->rate = $request->rate;
                if($imageName1){
                     $real->image1 = $imageName1;
                }
                if($imageName2){
                     $real->image2 = $imageName2;
                }
                if($imageName3){
                     $real->image3 = $imageName3;
                }               
                $real->save();
              
               
                return redirect()->route('franchise.useditems.index')->with('success','Updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $matri = Used_item::where('property_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();

        
        return redirect()->route('franchise.useditems.index')->with('success','deleted');
             
    }
}
