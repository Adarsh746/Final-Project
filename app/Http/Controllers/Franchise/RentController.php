<?php

namespace App\Http\Controllers\Franchise;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Tool;
use App\User;
use App\Franchise;
use App\Local_place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;


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
->leftjoin('post_offices','post_offices.post_office_id','=','tools.post')





->select()



->where('tools.status','=',0)
->where('tools.post','=',Auth::user()->post_office_id)
->where('tools.owner','!=',Auth::user()->franchise_name)

 // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->get();

  

        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('franchise.view_rent', compact('rent'));     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
   $franchise =franchise::select('franchise_id','franchise_name')->get();

    return view('franchise.add_rent', compact('user','franchise'));
  }

  public function store(Request $request)
    {

        

        $id=Auth::user()->franchise_id;
       

         $user_city = Auth::user()->post_office_id;
         $user=Auth::user()->franchise_name;
         $con=Auth::user()->contact;
         $add=Auth::user()->curr_address;
         

         

        // $franchise = (Auth::user()->franchise_id);
        // // $tool = Auth::tool();
        $image = null;
       
     if ($request['tool_image']) {
        $image = time() . '1.' . $request->file('tool_image')->Extension();
        $request['tool_image']->move(
        base_path() . '/public/tool/images/', $image
    );
      }

      
      
        // $this->validate($request, [
        //    'tool_name' => 'required',
        //    'place_id' => 'required',
        //    // 'tool_image' => 'required',
        //    'tool_count' => 'required'
           



        //   ]);


             $tool = new tool();
            $tool->tool_name = $request->tool_name;
            $tool->tool_count = $request->tool_count;
            $tool->owner=$user;
            $tool->address=$add;
            $tool->contact=$con;
            
            $tool->franchise_id = $id ;
            $tool->post= $user_city;
            $tool->rate = $request->rate;
            $tool->description = $request->description;
            // $shop->logo = $request->logo;
            // $shop->banner = $request->banner;
            // $shop->image1 = $request->image1;
            // $shop->image2 = $request->image2;
            // $shop->image3 = $request->image3;
            // $shop->image4 = $request->image4;
            // $shop->image5 = $request->image5;
            if($image){
                     $tool->tool_image = $image;
                }
                
               $tool->save();

          // return view('table');
        return redirect()->route('franchise.rent.index')->with('success','Registration Success');

    }
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
        $imageName = null;
       


       
     if ($request['tool_image']) {
        $image = time() . '1.' . $request->file('tool_image')->Extension();
        $request['image1']->move(
        base_path() . '/public/rent/images/', $image
    );
      }
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
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
            if($image){
                     $rent->tool_image = $image;
                }
                
               $rent->save();

          // return view('table');
        return redirect()->route('franchise.rent.index')->with('success','Updated');

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
        
        return redirect()->route('franchise.rent.index')->with('success','deleted');
    }
}
