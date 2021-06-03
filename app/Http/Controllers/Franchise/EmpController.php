<?php

namespace App\Http\Controllers\Franchise;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Franchise;
use App\Nation;
class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //dd('hi');
        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->select('franchises.franchise_id','franchises.email','franchises.franchise_name','franchises.contact',
        'nations.nation_name','states.state_name',
        'districts.district_name','franchises.email')
        ->where('franchises.account_status', '=', 0)
        ->where('franchises.franchise_id', '=', Auth::user()->franchise_id )

        ->get();        
        
        
       
    


            return view('franchise.index', compact('emp'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            

            ]);
            
            
           
            	
    
    
    
            $emp =Franchise::find(Auth::user()->franchise_id);
                
            $emp ->email = $request->email;
            $emp ->franchise_name = $request->franchise_name;
            $emp ->contact = $request->contact;
            $emp ->nation_id = $request->nation;
            $emp ->state_id = $request->state;
            $emp ->district_id = $request->district;
            $emp ->about = $request->about;
          
    
    if($request->cirtificate !='')
    {
    
    
            $cirtificate = time() . '.' . $request['cirtificate']->getClientOriginalExtension();
        
            $request['cirtificate']->move(
            base_path() . '/public/certificate/', $cirtificate
            );
            $emp ->employeer_cirtificate = $cirtificate;
        }
       
            $emp ->save();
    
                
    return redirect(route('franchise.login'));

    }
    public function edit()
    {

        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        // ->where('franchises.franchise_id', '=', $id)
        ->select()
        ->where('franchises.account_status', '=', 0)
        ->where('franchises.franchise_id', '=', Auth::user()->franchise_id )

        
    //$this->authorize('modifyFranchises', auth()->user());
    ->first(); 
    
        
         
        return view('franchise.edit', compact('emp'));       
    }
    public function change(Request $request, $id)
    {
       
     

        // $franchise = (Auth::user()->franchise_id);
        // // $rent = Auth::rent();
        $image1 = null;
       
     if ($request['image']) {
        $image = time() . '1.' . $request->file('image')->Extension();
        $request['image']->move(
        base_path() . '/public/franchise/images/', $image1
    );
      }
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
           $emp =Franchise::find($id);

            $emp ->franchise_name = $request->franchise_name;   
            $emp ->email = $request->email;
            
            $emp ->contact = $request->contact;
            $emp ->curr_address = $request->curr_address;
            $emp ->contact1 = $request->contact1;
           
            if($image1){
                     $emp->image = $image1;
                }
                
               $emp->save();
                
             

          // return view('table');
        return redirect()->route('franchise.emp.index')->with('success','Edited Successfully');

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


        $emp =DB::table('franchises')
       
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->join('post_offices', 'franchises.post_office_id', '=', 'post_offices.post_office_id')
        ->select('franchises.franchise_id','franchises.email','franchises.franchise_name','franchises.contact','nations.nation_name','states.state_name','districts.district_name','franchises.curr_address','post_offices.pincode','franchises.email','franchises.aadhar_number')
        ->where('franchises.account_status', '=', 0)
        ->where('franchises.aproval_status', '=', 1)
        
        
        ->get();        
                
        return view('franchise.view_emp', compact('emp'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        
    }
    
}
