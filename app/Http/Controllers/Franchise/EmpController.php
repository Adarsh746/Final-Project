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
    dd('hi');
        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->select('franchises.franchise_id','franchises.email','franchises.franchise_name','franchises.contact',
        'nations.nation_name','states.state_name',
        'districts.district_name','franchises.email')
        ->where('franchises.account_status', '=', 0)
        ->where('franchises.franchise_id', '=', Auth::user()->franchise_id )

        ->first();        
        
        
       
    


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $emp =DB::table('franchises')
        ->leftjoin('nations', 'franchises.nation_id', '=', 'nations.nation_id')
        ->leftjoin('states', 'franchises.state_id', '=', 'states.state_id')
        ->leftjoin('districts', 'districts.district_id', '=', 'franchises.district_id')
        ->first();
        $nat =Nation::select('nation_id','nation_name')->get();

        return view('franchise.edit',compact('nat','emp'));
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
