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
    
        return view('user.index');
    }
    public function view()
    {
        
        return view('user.index');

    }

    public function edit($id)
    {

        $shop = DB::table('shops')
->join('local_places','local_places.place_id','=','shops.city_id')
->join('users','users.user_id','=','shops.user_id')
->where('shops.shop_id', '=', $id)


->select('shops.shop_id','shops.city_id','users.user_name','shops.shop_name','shops.shop_cat_name','shops.image1','shops.image2','shops.image3','shops.image4','shops.image5','shops.address','shops.logo','shops.banner','shops.website','shops.facebook','shops.twitter','shops.instagram','shops.whatsapp','shops.open_time','shops.youtube','shops.close_time','shops.mobile_number','shops.mobile_number2','local_places.place_name')
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('shops.status', '=', 0)

->first();

$user =User::select('user_id','user_name')->get();
   $city =Local_place::select('place_id','place_name')
   ->get();

    return view('user.add_shop', compact('user','city','shop'));

    }
    

    
}
