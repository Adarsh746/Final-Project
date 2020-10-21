<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\User\Controller;
use Illuminate\Support\Facades\DB;
use App\message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.welcome');
    }
    public function view()
    {
        return redirect('user/welcome/'.Auth::guard('web')->user()->user_id);
    }
    

    
}
