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

->leftjoin('franchises','franchises.franchise_id','=','tools.franchise_id')
->join('post_offices','post_offices.post_office_id','=','franchises.post_office_id')



->select()
->where('franchises.account_status', '=', 0)
 ->where('franchises.franchise_id', '=', Auth::user()->franchise_id )
 ->where('tools.status','=','0')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->get();


 return view('franchise.view_tool', compact('rent'));
     



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

    return view('franchise.add_rent', compact('user','franchise'));
     }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    



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

        $tool = DB::table('tools')

->leftjoin('franchises','franchises.franchise_id','=','tools.franchise_id')
->join('post_offices','post_offices.post_office_id','=','franchises.post_office_id')



->select()
->where('tools.tool_id', '=', $id)
->where('franchises.account_status', '=', 0)
 ->where('franchises.franchise_id', '=', Auth::user()->franchise_id )
 ->where('tools.status','=','0')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->first();
 return view('franchise.edit_tool', compact('tool'));

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
       $fid=Auth::user()->franchise_id;
     

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
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
            $tool = tool::find($id);
           $tool->tool_name = $request->tool_name;
            $tool->tool_count = $request->tool_count;
            
            $tool->franchise_id = $fid ;
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
        return redirect()->route('franchise.tool.index')->with('success','Edited Successfully');

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
        
        return redirect()->route('franchise.tool.index')->with('success','deleted');
    }
}
