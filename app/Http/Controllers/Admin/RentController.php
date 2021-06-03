<?php

namespace App\Http\Controllers\Admin;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rent;
use App\User;
use App\franchise;
use App\Local_place;


class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rent = DB::table('tools')
->leftjoin('users','users.user_id','=','tools.user_id')
->leftjoin('franchises','franchises.franchise_id','=','tools.franchise_id')
->leftjoin('post_offices','post_offices.post_office_id','=','franchises.post_office_id')
->leftjoin('districts','districts.district_id','=','franchises.district_id')




->select()

->where('tools.status', '=', 0)
->get();



        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('admin.view_rent', compact('rent'));     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
   
    return view('admin.add_rent', compact('user'));
  }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
        $imageName = null;
       
     if ($request['tool_image']) {
        $imageName = time() . '1.' . $request->file('tool_image')->Extension();
        $request['tool_image']->move(
        base_path() . '/public/rent/image/', $imageName
    );
      }
  
      
      
        // $this->validate($request, [
        //    'tool_name' => 'required',
        //    'tool_count' => 'required',
        //    'tool_image' => 'required',
        //    'rate' => 'required',
        //    'description' => 'required'
           



        //  ]);

             $rent = new rent();
            $rent->tool_name = $request->tool_name;
            $rent->tool_count = $request->tool_count;
            $rent->user_id = $request->user_id;
            $rent->franchise_id = $request->franchise_id;
            $rent->rate = $request->rate;
            $rent->description = $request->description;
            // $shop->logo = $request->logo;
            // $shop->banner = $request->banner;
            // $shop->image1 = $request->image1;
            // $shop->image2 = $request->image2;
            // $shop->image3 = $request->image3;
            // $shop->image4 = $request->image4;
            // $shop->image5 = $request->image5;
            if($imageName){
                     $rent->tool_image = $imageName;
                }
                
               $rent->save();

          // return view('table');
        return redirect()->route('admin.rent.index')->with('success','Registration Success');

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
//     public function edit($id)
//     {

//         $rent = DB::table('rent')
// ->join('users','users.user_id','=','rent.user_id')
// ->join('franchise','franchise.franchise_id','=','rent.franchise_id')

// ->where('rent.rent_id', '=', $id)


// -->select('rent.rent_id','rent.tool_name','rent.tool_image','rent.tool_count','users.user_id','franchise.franchise_id','rent.rate','rent.description')
// // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
// ->where('rent.status', '=', 0)

// ->first();

// $user =User::select('user_id','user_name')->get();
// $franchise =franchise::select('franchise_id','franchise_name')->get();

//     return view('admin.edit_sho', compact('user','city','rent'));

//     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request, $id)
    {
        $imageName = null;
       


       
     if ($request['tool_image']) {
        $imageName = time() . '1.' . $request->file('tool_image')->Extension();
        $request['image1']->move(
        base_path() . '/public/rent/images/', $imageName
    );
      }
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'tool_count' => 'required',
       //     'tool_image' => 'required',
       //     'rate' => 'required',
       //     'description' => 'required'
           

         // ]);
             $rent = new rent();
            $rent->tool_name = $request->tool_name;
            $shop->tool_count = $request->tool_count;
            $rent->user_id = $request->user_id;
            $rent->franchise_id = $request->franchise_id;
            $rate->rate = $request->rate;
            $rate->description = $request->description;
            // $shop->logo = $request->logo;
            // $shop->banner = $request->banner;
            // $shop->image1 = $request->image1;
            // $shop->image2 = $request->image2;
            // $shop->image3 = $request->image3;
            // $shop->image4 = $request->image4;
            // $shop->image5 = $request->image5;
            if($imageName){
                     $rent->tool_image = $imageName;
                }
                
               $rent->save();

          // return view('table');
        return redirect()->route('admin.rent.index')->with('success','Updated');

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
         $matri = rent::where('rent_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.shop.index')->with('success','deleted');
    }
}
