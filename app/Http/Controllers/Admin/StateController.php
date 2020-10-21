<?php

namespace App\Http\Controllers\Admin;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\State;
use App\Nation;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $state = DB::table('states')
->leftjoin('nations','nations.nation_id','=','states.nation_id')
->select('states.state_id','states.state_name','nations.nation_name')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('states.status', '=', 0)
->where('nations.status', '=', 0)
->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('admin.view_state', compact('state'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nation =Nation::select('nation_id','nation_name')->get();

        return view('admin.add_state', compact('nation'));
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
            'state_name' => 'required',
            'nation_id' => 'required',

        ]);

                $state = new State();
                $state->nation_id = $request->nation_id;
                $state->state_name = $request->state_name;
                
                $state->save();

            // return view('table');
             return redirect()->route('admin.home')->with('success','Registration Success');

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
         $state = DB::table('states')
         ->join('nations','nations.nation_id','=','states.nation_id')
         ->select('states.state_id','states.state_name','nations.nation_name','states.nation_id')
        // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
         ->where('states.status', '=', 0)
         ->where('nations.status', '=', 0)
         ->first();
         
         $nation = Nation::select('nation_id','nation_name')
         ->where('nations.status', '=', 0)->get();

        return view('admin.edit_state', compact('nation','state'));
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
        $this->validate($request, [
            'state_name' => 'required',
            'nation_id' => 'required',

        ]);

                $state = state::find($id);
                $state->nation_id = $request->nation_id;
                $state->state_name = $request->state_name;
                
                $state->save();
                return redirect()->route('admin.state.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri = State::where('state_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.state.index')->with('success','deleted');
    }
}
