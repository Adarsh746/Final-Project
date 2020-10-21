<?php
    namespace App\Http\Controllers\Admin;
    use\Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use App\Hospital;
    use App\User;
    use App\Local_place;




    class HospitalController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            $hospital = DB::table('hospitals')
    ->join('local_places','local_places.place_id','=','hospitals.city_id')
    ->join('users','users.user_id','=','hospitals.user_id')


    ->select()
    // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
    ->where('hospitals.status', '=', 0)
    ->get();


            // $state =State::select('nation_id','state_name','state_id')->get();

            return view('admin.view_hospital', compact('hospital'));
             }

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

        return view('admin.add_hospital', compact('user','city'));
      }

        // /**
        //  * Store a newly created resource in storage.
        //  *
        //  * @param  \Illuminate\Http\Request  $request
        //  * @return \Illuminate\Http\Response

        

        public function store(Request $request)
        {
           // dd($request);
            $imageName1 = null;
            $imageName2 = null;
            $imageName3 = null;
            $imageName4 = null;
            $imageName5 = null;
            $imageName6 = null;
            $imageName7 = null;
            $imageName8 = null;
            $imageName9 = null;
            $imageName10 = null;
            $baner = null;
            $log = null;



           
         if ($request['image1']) {
            $imageName1 = time() . '1.' . $request->file('image1')->Extension();
            $request['image1']->move(
            base_path() . '/public/hospital/images/', $imageName1
        );
          }
          if ($request['image2']) {
            $imageName2 = time() . '2.' . $request->file('image2')->Extension();
            $request['image2']->move(
            base_path() . '/public/hospital/images/', $imageName2
        );
          }
          if ($request['image3']) {
            $imageName3 = time() . '3.' . $request->file('image3')->Extension();
            $request['image3']->move(
            base_path() . '/public/hospital/images/', $imageName3
        );
          }
          if ($request['image4']) {
            $imageName4 = time() . '4.' . $request->file('image4')->Extension();
            $request['image4']->move(
            base_path() . '/public/hospital/images/', $imageName4
        );
          }
          if ($request['image3']) {
            $imageName5 = time() . '5.' . $request->file('image5')->Extension();
            $request['image5']->move(
            base_path() . '/public/hospital/images/', $imageName5
        );
          }
          if ($request['banner']) {
            $baner = time() . '6.' . $request->file('banner')->Extension();
            $request['banner']->move(
            base_path() . '/public/hospital/images/', $baner
        );
          }
          if ($request['logo']) {
            $log = time() . '8.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $log
        );
          }
          if ($request['logo']) {
            $log = time() . '9.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName6
        );
          }
          if ($request['logo']) {
            $log = time() . '10.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName7
        );
          }
          if ($request['logo']) {
            $log = time() . '11.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/',$imageName8
        );
          }
          if ($request['logo']) {
            $log = time() . '12.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/',$imageName9
        );
          }
          if ($request['logo']) {
            $log = time() . '13.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName10
        );
          }


            // $this->validate($request, [
            //    'hospital_name' => 'required',
            //    'hospital_capacity' => 'required',
            //    'open_time' => 'required',
            //    'close_time' => 'required',
              
            //    'place_id' => 'required',
            //    'shop_cat_name' => 'required',
            //    'address' => 'required',
            //    'mobile_number' => 'required'




            //  ]);

                 $hospital = new Hospital  ();
                $hospital->city_id = $request->place_id;
                
                $hospital->hospital_name = $request->hospital_name;
                $hospital->description = $request->description;
                $hospital->hospital_capacity = $request->hospital_capacity;
                $hospital->address = $request->address;
                $hospital->mobile_number = $request->mobile_number;
                $hospital->mobile_number2 = $request->mobile_number2;
                $hospital->open_time = $request->open_time;
                $hospital->close_time = $request->close_time;
                $hospital->website = $request->website;
                $hospital->facebook = $request->facebook;
                $hospital->user_id = 1;
                $hospital->whatsapp = $request->whatsapp;
                $hospital->instagram = $request->instagram;
                
                // $shop->logo = $request->logo;
                // $shop->banner = $request->banner;
                // $shop->image1 = $request->image1;
                // $shop->image2 = $request->image2;
                // $shop->image3 = $request->image3;
                // $shop->image4 = $request->image4;
                // $shop->image5 = $request->image5;
                if($imageName1){
                         $shop->image1 = $imageName1;
                    }
                    if($imageName2){
                         $shop->image2 = $imageName2;
                    }
                    if($imageName3){
                         $shop->image3 = $imageName3;
                    }
                    if($imageName4){
                         $shop->image4 = $imageName4;
                    }
                    if($imageName5){
                         $shop->image5 = $imageName5;
                    }
                    if($imageName6){
                         $shop->image6 = $imageName6;
                    }
                    if($imageName7){
                         $shop->image7 = $imageName7;
                    }
                    if($imageName8){
                         $shop->image8 = $imageName8;
                    }
                    if($imageName9){
                         $shop->image9 = $imageName9;
                    }
                    if($imageName10){
                         $shop->image10 = $imageName10;
                    }
                    if($baner){
                         $shop->banner = $baner;
                    }
                    if($log){
                         $shop->logo = $log;
                    }



                    
                   $hospital->save();

              // return view('table');
            return redirect()->route('admin.hospital.index')->with('success','Registration Success');

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

          $hospital = DB::table('hospitals')
    ->join('local_places','local_places.place_id','=','hospitals.city_id')
    ->join('users','users.user_id','=','hospitals.user_id')



    ->select()
    ->where('hospitals.status', '=', 0)


    ->first();

    $user =User::select('user_id','user_name')->get();
       $city =Local_place::select('place_id','place_name')
       ->get();

    

        return view('admin.edit_hospital', compact('user','city','hospital'));

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
             $imageName1 = null;
            $imageName2 = null;
            $imageName3 = null;
            $imageName4 = null;
            $imageName5 = null;
            $imageName6 = null;
            $imageName7 = null;
            $imageName8 = null;
            $imageName9 = null;
            $imageName10 = null;
            $baner = null;
            $log = null;



           
         if ($request['image1']) {
            $imageName1 = time() . '1.' . $request->file('image1')->Extension();
            $request['image1']->move(
            base_path() . '/public/hospital/images/', $imageName1
        );
          }
          if ($request['image2']) {
            $imageName2 = time() . '2.' . $request->file('image2')->Extension();
            $request['image2']->move(
            base_path() . '/public/hospital/images/', $imageName2
        );
          }
          if ($request['image3']) {
            $imageName3 = time() . '3.' . $request->file('image3')->Extension();
            $request['image3']->move(
            base_path() . '/public/hospital/images/', $imageName3
        );
          }
          if ($request['image4']) {
            $imageName4 = time() . '4.' . $request->file('image4')->Extension();
            $request['image4']->move(
            base_path() . '/public/hospital/images/', $imageName4
        );
          }
          if ($request['image3']) {
            $imageName5 = time() . '5.' . $request->file('image5')->Extension();
            $request['image5']->move(
            base_path() . '/public/hospital/images/', $imageName5
        );
          }
          if ($request['banner']) {
            $baner = time() . '6.' . $request->file('banner')->Extension();
            $request['banner']->move(
            base_path() . '/public/hospital/images/', $baner
        );
          }
          if ($request['logo']) {
            $log = time() . '8.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $log
        );
          }
          if ($request['logo']) {
            $log = time() . '9.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName6
        );
          }
          if ($request['logo']) {
            $log = time() . '10.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName7
        );
          }
          if ($request['logo']) {
            $log = time() . '11.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/',$imageName8
        );
          }
          if ($request['logo']) {
            $log = time() . '12.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/',$imageName9
        );
          }
          if ($request['logo']) {
            $log = time() . '13.' . $request->file('logo')->Extension();
            $request['logo']->move(
            base_path() . '/public/hospital/images/', $imageName10
        );
          }
          

                $hospital = Hospital::find($id);
                $hospital->city_id = $request->place_id;

                
                $hospital->hospital_name = $request->hospital_name;
                $hospital->description = $request->description;
                $hospital->hospital_capacity = $request->hospital_capacity;
                $hospital->address = $request->address;
                $hospital->mobile_number = $request->mobile_number;
                $hospital->mobile_number2 = $request->mobile_number2;
                $hospital->open_time = $request->open_time;
                $hospital->close_time = $request->close_time;
                $hospital->website = $request->website;
                $hospital->facebook = $request->facebook;
                $hospital->user_id = 1;
                $hospital->whatsapp = $request->whatsapp;
                $hospital->instagram = $request->instagram;
                
                // $shop->logo = $request->logo;
                // $shop->banner = $request->banner;
                // $shop->image1 = $request->image1;
                // $shop->image2 = $request->image2;
                // $shop->image3 = $request->image3;
                // $shop->image4 = $request->image4;
                // $shop->image5 = $request->image5;
                if($imageName1){
                         $shop->image1 = $imageName1;
                    }
                    if($imageName2){
                         $shop->image2 = $imageName2;
                    }
                    if($imageName3){
                         $shop->image3 = $imageName3;
                    }
                    if($imageName4){
                         $shop->image4 = $imageName4;
                    }
                    if($imageName5){
                         $shop->image5 = $imageName5;
                    }
                    if($imageName6){
                         $shop->image6 = $imageName6;
                    }
                    if($imageName7){
                         $shop->image7 = $imageName7;
                    }
                    if($imageName8){
                         $shop->image8 = $imageName8;
                    }
                    if($imageName9){
                         $shop->image9 = $imageName9;
                    }
                    if($imageName10){
                         $shop->image10 = $imageName10;
                    }
                    if($baner){
                         $shop->banner = $baner;
                    }
                    if($log){
                         $shop->logo = $log;
                    }



                    
                   $hospital->save();

              // return view('table');
            return redirect()->route('admin.hospital.index')->with('success','Updated');


                 
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
             $matri = Hospital::where('hospital_id',$id)->first();
            $matri ->status = 1;
            $matri ->save();
            
            return redirect()->route('admin.hospital.index')->with('success','deleted');
        }
    }
