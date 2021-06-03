<?php

namespace App\Http\Controllers\User;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Meeting;
use App\User;
use App\Local_place;
use App\Franchise;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $user = Auth::user();
             $user_name=$user->user_id;


      $meeting = DB::table('meetings')

->join('users','users.user_id','=','meetings.user_id')
->join('franchises','franchises.franchise_id','=','meetings.franchise_id')



->select()

->where('meetings.user_id','=',$user_name)
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('meetings.status', '=', 0)
->get();


$user =User::select('user_id','user_name')->get();
   $franchise =franchise::select('franchise_id','franchise_name')->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('user.view_meeting', compact('meeting','franchise','user'));     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
  $franchise =franchise::select('franchise_id','franchise_name')->get();

    return view('franchise.add_meeting', compact('user','franchise'));
  }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
       
        $this->validate($request, [
           'meeting_topic' => 'required',
           'date' => 'required',
           'open_time' => 'required',
           'close_time' => 'required'


         ]);

             $meeting = new Meeting();
            $meeting->franchise_id = $request->franchise_id;
            $meeting->user_id = $request->user_id;
            $meeting->meeting_topic = $request->meeting_topic;
            $meeting->description = $request->description;
            $meeting->date = $request->date;
            $meeting->open_time = $request->open_time;
            $meeting->close_time = $request->close_time;
            
                
               $meeting->save();

          // return view('table');
        return redirect()->route('franchise.meeting.index')->with('success','Schedule Success');

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

        $meeting = DB::table('meetings')

->join('users','users.user_id','=','meetings.user_id')
->join('franchises','franchises.franchise_id','=','meetings.franchise_id')


->select()

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('meetings.status', '=', 0)

->first();

$user =User::select('user_id','user_name')->get();
   $franchise =franchise::select('franchise_id','franchise_name')->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('franchise.edit_meeting', compact('meeting','franchise','user'));  
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
           'meeting_topic' => 'required',
           'date' => 'required',
           'open_time' => 'required',
           'close_time' => 'required'


         ]);

             $meeting = meeting::find($id);
             $meeting->franchise_id = $request->franchise_id;
            $meeting->user_id = $request->user_id;
            $meeting->meeting_topic = $request->meeting_topic;
            $meeting->description = $request->description;
            $meeting->date = $request->date;
            $meeting->open_time = $request->open_time;
            $meeting->close_time = $request->close_time;


                
               $meeting->save();

          // return view('table');
        return redirect()->route('franchise.meeting.index')->with('success','Updated');

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
         $matri = Meeting::where('meeting_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('franchise.meeting.index')->with('success','deleted');
    }
}
