<?php

namespace App\Http\Controllers\Admin;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Cases;
use App\User;
use App\Local_place;
use App\Franchise;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cases = DB::table('cases')

->leftjoin('users','users.user_id','=','cases.user_id')
->leftjoin('franchises','franchises.franchise_id','=','cases.franchise_id')

->select()

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('cases.status', '=', 0)
->get();


$user =User::select('user_id','user_name')->get();
 $franchise =franchise::select('franchise_id','franchise_name')->get();



        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('admin.view_case', compact('cases','user','franchise'));     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
  $franchise =franchise::select('franchise_id','franchise_name')->get();

    return view('admin.add_case', compact('user','franchise'));
  }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
         
        
        


       

             $case = new Cases();
           
            $case->user_id = $request->user_id;
            $case->case_no = $request->case_no;
            $case->case_name = $request->case_name; 
             $case->case_type = $request->case_type;
            $case->description = $request->description;
            $case->franchise_id = $request->franchise_id;
            $case->rate = $request->rate;

           
            
            
                
               $case->save();

          // return view('table');
        return redirect()->route('admin.case.index')->with('success','Case Register Success');

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

    


        $case = DB::table('cases')

->join('users','users.user_id','=','cases.user_id')
->leftjoin('franchises','franchises.franchise_id','=','cases.franchise_id')




->select()
->where('cases.case_id','=',$id)
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('cases.status', '=', 0)

->first();
        


$user =User::select('user_id','user_name')->get();

 $franchise =franchise::select('franchise_id','franchise_name')->get();
   


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('admin.edit_case', compact('case','user','franchise'));  
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
       


       
 
        
        


        

             $case = Cases::find($id);
            
            $case->case_no = $request->case_no;
            $case->case_name = $request->case_name; 
             $case->case_type = $request->case_type;
            $case->description = $request->description;
            $case->franchise_id = $request->franchise_id;
            $case->rate = $request->rate;


                
               $case->save();

          // return view('table');
        return redirect()->route('admin.case.index')->with('success','Updated');

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
         $matri = cases::where('case_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.case.index')->with('success','deleted');
    }
}
