<?php

namespace App\Http\Controllers\Franchise;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\work;
use App\User;
use App\Franchise;
use Illuminate\Support\Facades\Auth;
use App\Local_place;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $work = DB::table('works')

->leftjoin('users','users.user_id','=','works.user_id')
->leftjoin('franchises','franchises.franchise_id','=','works.franchise_id')


->select()

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('works.status', '=', 0)
->where('works.work_status', '=', 0)
->where('works.franchise_id', '=', Auth::user()->franchise_id )
->where('works.user_del','=',0)

->get();


$user =User::select('user_id','user_name')->get();
 $franchise =Franchise::select('franchise_id','franchise_name')->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('franchise.view_work', compact('work','user'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
   $user =User::select('user_id','user_name')->get();
   $city =Local_place::select('place_id','place_name')
   ->get();

    return view('franchise.add_work', compact('user','city'));
  }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    

    public function store(Request $request)
    {
        
    
    
        $this->validate($request, [
           'work_name' => 'required',
           // 'work_date' => 'required',
           'time' => 'required',
           'description' => 'required',
           


         ]);

             $work = new work();
            $work->work_name = $request->work_name;
            $work->work_date = $request->work_date;
            $work->time = $request->time;
            $work->description = $request->descritpion;
            



                
               $work->save();

          // return view('table');
        return redirect()->route('franchise.work.index')->with('success','Schedule Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $work =work::find($id);
        $work ->work_status = 1;
        $work ->save();
        return redirect('franchise/work/index')->with('success','updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    return view('admin.edit_shop', compact('user','city','shop'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $work = DB::table('works')

->leftjoin('users','users.user_id','=','works.user_id')
->leftjoin('franchises','franchises.franchise_id','=','works.franchise_id')


->select()

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->where('works.status', '=', 0)
->where('works.user_del', '=', 0)
->where('works.work_status', '=', 1)
->where('works.franchise_id', '=', Auth::user()->franchise_id )

->get();


$user =User::select('user_id','user_name')->get();
 $franchise =Franchise::select('franchise_id','franchise_name')->get();


        // $state =State::select('nation_id','state_name','state_id')->get();

        return view('franchise.view_mywork', compact('work','user'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri = work::where('work_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('franchise.work.index')->with('success','deleted');
    }
}
