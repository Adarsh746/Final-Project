<?php

namespace App\Http\Controllers\Admin;

use\Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Local_place;
use App\Matrimony;
use App\User;



class MatrimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matri = DB::table('matrimonies')
        ->join('local_places','local_places.place_id','=','matrimonies.city_id')
        ->join('users','users.user_id','=','matrimonies.u_id')
        ->where('matrimonies.status','=',0)
        ->select ('local_places.place_name','local_places.place_id','matrimonies.mat_reg_id','matrimonies.name','matrimonies.address','matrimonies.color','matrimonies.job','matrimonies.age','matrimonies.image','matrimonies.weight','matrimonies.height','matrimonies.education','matrimonies.city_id','matrimonies.religion','matrimonies.caste','matrimonies.demands','matrimonies.mobile_number','matrimonies.gender','matrimonies.mobile_number2','matrimonies.u_id','users.user_name')

        ->get();

        return view('admin.view_matrimony', compact('matri'));   
         }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Local_place::select('place_id','place_name')->get();
        $users = User::select('user_id','user_name')->get();

        return view('admin.add_matrimony', compact('post','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  if ($request['image']) {
          

        $imageName = time() . '.' . $request->file('image')->Extension();
    
        $request['image']->move(
        base_path() . '/public/matrimony/images/', $imageName
    );
      }

        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'religion' => 'required',
            'caste' => 'required',
            'education' => 'required',
            
            'job' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
         
        ]);

                $post = new Matrimony();
                $post->city_id = $request->city_id;
                $post->name = $request->name;
                $post->u_id = $request->user_id;
                $post->age = $request->age;
                $post->height = $request->height;
                $post->weight = $request->weight;
                $post->gender = $request->gender;
                $post->education = $request->education;
                $post->job = $request->job;
                $post->mobile_number = $request->mobile_number;
                $post->mobile_number2 = $request->mobile_number2;
                $post->address = $request->address;
                $post->demands = $request->demands;
                $post->color = $request->color;
                $post->religion = $request->religion;
                $post->caste = $request->caste;
                $post->image = $imageName;
                

                $post->save();

            // return view('table');
             return redirect()->route('admin.matrimony.index')->with('success','New Entry Added');

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
         $matri = DB::table('matrimonies')
        ->join('local_places','local_places.place_id','=','matrimonies.city_id')
        ->join('users','users.user_id','=','matrimonies.u_id')
        ->where('matrimonies.status','=',0)
        ->where('matrimonies.mat_reg_id', '=', $id)
        ->select ('local_places.place_name','local_places.place_id','matrimonies.mat_reg_id','matrimonies.name','matrimonies.address','matrimonies.color','matrimonies.job','matrimonies.age','matrimonies.image','matrimonies.weight','matrimonies.height','matrimonies.education','matrimonies.city_id','matrimonies.religion','matrimonies.caste','matrimonies.demands','matrimonies.mobile_number','matrimonies.gender','matrimonies.mobile_number2','matrimonies.u_id','users.user_name')
         
        ->first();
         $post = Local_place::select('place_id','place_name')->get();
        $users = User::select('user_id','user_name')->get();

        return view('admin.edit_matrimony', compact('post','users','matri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $matri =Matrimony::where('mat_reg_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        return redirect()->route('admin.matrimony.index')->with('success','deleted');
    }
}
