<?php

namespace App\Http\Controllers\Franchise;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\User\Controller;
use Illuminate\Support\Facades\DB;
use App\message;
use App\Franchise;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:franchise');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('franchise.index');
    }
    public function view()
    {
        return view('franchise.index');
    }
    

     public function edit($id)
    {
        

         $franchise = DB::table('franchises')

 ->join('nations','nations.nation_id','=','franchises.nation_id')
 ->join('states','states.state_id','=','franchises.state_id')
 ->join('districts','districts.district_id','=','franchises.district_id')
 ->join('post_offices','post_offices.post_office_id','=','franchises.post_office_id')
 ->where('franchises.franchise_id', '=', $id)


 ->select('franchises.franchise_name','franchises.email','franchises.password','franchises.contact','franchises.contact1','franchises.DOB','franchises.image','franchises.prem_address','franchises.curr_address','franchises.skills','districts.district_name','post_offices.post_office_name')

 //->where(['states.status', '=',0, 'nations.status' ,'=', 0])
 ->where('franchises.status', '=', 0)

 ->first();

 $user =User::select('user_id','user_name')->get();
  


//         // $state =State::select('nation_id','state_name','state_id')->get();

        return view('franchise.edit', compact('franchise','user'));  
    }
    public function change()
    {

    }
    public function update()
    {
       
       

       
        $unread = DB::table('tickets')
        ->leftjoin('messages','tickets.id','=','messages.ticket_id')
        ->where('tickets.employeer_id',auth::user()->employeer_id)
        ->where('messages.user_type',1)
        ->where('messages.view_status',0)
        ->count();
        
        
        


        $mysessages = DB::table('messages')
        ->leftjoin('tickets', 'messages.ticket_id', '=', 'tickets.id')
        ->leftjoin('employeers', 'employeers.employeer_id', '=', 'tickets.employeer_id')
        ->leftjoin('jobs', 'tickets.job_id', '=', 'jobs.job_id')
        // ->leftjoin('employeers', 'employeers.employeer_id', '=', 'jobs.employeer_id')
        ->where('tickets.employeer_id',Auth::user()->employeer_id)

        ->select('employeers.employeer_name','jobs.job_name','messages.user_type','tickets.id as tid','messages.id as mid','messages.created_at','messages.message','messages.view_status')
        ->orderBy('mid', 'desc')->get();
        $myticket = $mysessages->Unique('tid');
        
// dd($mysessages);


        return  ['myticket'=> $myticket,'unread'=>$unread];



    }


    public function show()
    {
        
       

       
        $unread = DB::table('tickets')
        ->leftjoin('messages','tickets.id','=','messages.ticket_id')
        ->where('tickets.employeer_id',auth::user()->employeer_id)
        ->where('messages.user_type',1)
        ->where('messages.view_status',0)
        ->count();
        
        
        


        $mysessages = DB::table('messages')
        ->leftjoin('tickets', 'messages.ticket_id', '=', 'tickets.id')
        ->leftjoin('employeers', 'employeers.employeer_id', '=', 'tickets.employeer_id')
        ->leftjoin('jobs', 'tickets.job_id', '=', 'jobs.job_id')
        // ->leftjoin('employeers', 'employeers.employeer_id', '=', 'jobs.employeer_id')
        ->where('tickets.employeer_id',Auth::user()->employeer_id)

        ->select('employeers.employeer_name','jobs.job_name','messages.user_type','tickets.id as tid','messages.id as mid','messages.created_at','messages.message','messages.view_status')
        ->orderBy('mid', 'desc')->get();
        $myticket = $mysessages->Unique('tid');
        
// dd($mysessages);


        return  ['myticket'=> $myticket,'unread'=>$unread];



    }


public function msg($id)
    {




        $data =DB::table('messages')
        ->leftjoin('tickets', 'tickets.id', '=', 'messages.ticket_id')
        ->where('tickets.id',$id)
        ->select('messages.created_at as cat','tickets.id as tid','messages.message','messages.image','messages.view_status','messages.id as mid','messages.user_type')
        ->orderBy('mid', 'asc')->get();
       $data= $data->Unique('mid');

        DB::table('messages')
        ->where('ticket_id',$id )
        ->where('user_type',1)
        ->where('view_status',0)
        ->update(['view_status' =>DB::raw(1)]);
        return $data;
           
   
            
        }


    public function send(Request $request)
    {

        $msg =new message();
        $msg ->user_type = 2;
        $msg ->ticket_id = $request->tid;
        if ($request->image == null) {
            $msg ->message = $request->message;
        }
        if ($request->message == null) {

            $imageName = time() . '.' . $request['images']->getClientOriginalExtension();
    
            $request['images']->move(
            base_path() . '/public/user/chat/', $imageName
            );

            $msg ->image = $imageName;
        } 
       
        
        $msg ->save();



    }
}
