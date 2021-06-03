<?php

namespace App\Http\Controllers\User;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Tool;
use App\User;
use App\Franchise;
use App\Local_place;
use Illuminate\Support\Facades\Auth;


class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $rent = DB::table('tools')

->leftjoin('Users','users.user_id','=','tools.user_id')
->join('post_offices','post_offices.post_office_id','=','users.post_office_id')
->leftjoin('districts','districts.district_id','=','users.district_id')



->select()
->where('users.account_status', '=', 0)
 ->where('users.user_id', '=', Auth::user()->user_id )
 ->where('tools.status','=','0')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->get();



 return view('user.view_tool', compact('rent'));
     



        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
   $user =User::select('user_id','user_name')->get();
   $franchise =franchise::select('franchise_id','franchise_name')->get();

    return view('user.add_rent', compact('user','franchise'));
  
    
     }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
        

        $id=Auth::user()->user_id;
        $user_city = Auth::user()->post_office_id;
         $user=Auth::user()->user_name;
         $con=Auth::user()->contact;
         
         $add=Auth::user()->address;
         
     

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
            $tool->contacts=$con;
            
            $tool->user_id = $id ;
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
        return redirect()->route('user.tool.index')->with('success','Registration Success');

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
        $rent = DB::table('tools')

->leftjoin('users','users.user_id','=','tools.user_id')
->join('post_offices','post_offices.post_office_id','=','users.post_office_id')



->select()
->where('tools.tool_id', '=', $id)
->where('users.account_status', '=', 0)
->where('users.user_id', '=', Auth::user()->user_id )
 ->where('tools.status','=','0')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->first();
 return view('user.edit_tool', compact('rent'));

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
       $uid=Auth::user()->user_id;
     

        // $franchise = (Auth::user()->franchise_id);
        // // $rent = Auth::rent();
        $image = null;
       
     if ($request['tool_image']) {
        $image = time() . '1.' . $request->file('tool_image')->Extension();
        $request['tool_image']->move(
        base_path() . '/public/rent/images/', $image
    );
      }
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
            $rent = rent::find($id);
           $rent->tool_name = $request->tool_name;
            $rent->tool_count = $request->tool_count;
            
            $rent->user_id = $uid ;
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
        return redirect()->route('user.tool.index')->with('success','Edited Successfully');

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
         $matri = tool::where('tool_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('user.tool.index')->with('success','deleted');
    }
}
