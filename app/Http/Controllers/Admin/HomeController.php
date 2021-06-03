<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Franchise;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        

        $franchise = franchise::where('account_status', '=', 0)->count();
        

        


       
       
        
        return view('admin/admin',compact('franchise'));
    }

    public function view()
    {
       
    



    }

public function show($id)
    {




    }
    public function chat($id)
    {
        
        
        
        return view('chat-box');
    }

    public function msg($id)
    {




        
        }


    public function send(Request $request)
    {
      
      
       
        

        
    }
public function openView($id)
{

    
    


return ['details'=>$details,'against'=>$against];
}
public function destroy(Request $request)
{
    

}
}