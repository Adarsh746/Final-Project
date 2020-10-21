<?php
    namespace App\Http\Controllers\Admin;
    use\Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use App\Hospital;
    use App\User;
    use App\Local_place;
    use App\Doctor;




    class DoctorController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response 
         */
        public function index()
        {

            $doctor = DB::table('doctors')
    
    ->join('hospitals','hospitals.hospital_id','=','doctors.hospital_id')


    ->select()
    ->where('hospitals.status', '=', 0)
    // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
    ->where('doctors.status', '=', 0)
    ->get();


            // $state =State::select('nation_id','state_name','state_id')->get();

            return view('admin.view_doctor', compact('doctor'));
             }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
        
       
       $hospital = hospital::select('hospital_id','hospital_name')
        ->where('hospitals.status', '=', 0)
       ->get();

        return view('admin.add_doctor', compact('hospital'));
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
            



           
         if ($request['image']) {
            $imageName1 = time() . '1.' . $request->file('image')->Extension();
            $request['image']->move(
            base_path() . '/public/doctor/images/', $imageName1
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

                 $doctor = new Doctor  ();
                $doctor->hospital_id = $request->hospital_id;
                
                $doctor->doctor_name = $request->doctor_name;
                $doctor->designation = $request->designation;
                $doctor->doctor_category = $request->doctor_category;
                $doctor->address = $request->address;
                $doctor->mobile_number = $request->mobile_number;
                $doctor->open_time = $request->open_time;
                $doctor->close_time = $request->close_time;
                
                // $shop->logo = $request->logo;
                // $shop->banner = $request->banner;
                // $shop->image1 = $request->image1;
                // $shop->image2 = $request->image2;
                // $shop->image3 = $request->image3;
                // $shop->image4 = $request->image4;
                // $shop->image5 = $request->image5;
                if($imageName1){
                         $doctor->image = $imageName1;
                    }
                    



                    
                   $doctor->save();

              // return view('table');
            return redirect()->route('admin.doctor.index')->with('success','Registration Success');

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
          $doctor = DB::table('doctors')
    
    ->join('hospitals','hospitals.hospital_id','=','doctors.hospital_id')


    ->select()
    ->where('hospitals.status', '=', 0)
    // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
    ->where('doctors.status', '=', 0)
    ->first();

    $hospital = hospital::select('hospital_id','hospital_name')
        ->where('hospitals.status', '=', 0)
       ->get();

        return view('admin.edit_doctor', compact('hospital','doctor'));


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
            



           
         if ($request['image']) {
            $imageName1 = time() . '1.' . $request->file('image')->Extension();
            $request['image']->move(
            base_path() . '/public/doctor/images/', $imageName1
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

                 $doctor = Doctor::find($id);
                $doctor->hospital_id = $request->hospital_id;
                
                $doctor->doctor_name = $request->doctor_name;
                $doctor->designation = $request->designation;
                $doctor->doctor_category = $request->doctor_category;
                $doctor->address = $request->address;
                $doctor->mobile_number = $request->mobile_number;
                $doctor->open_time = $request->open_time;
                $doctor->close_time = $request->close_time;
                
                // $shop->logo = $request->logo;
                // $shop->banner = $request->banner;
                // $shop->image1 = $request->image1;
                // $shop->image2 = $request->image2;
                // $shop->image3 = $request->image3;
                // $shop->image4 = $request->image4;
                // $shop->image5 = $request->image5;
                if($imageName1){
                         $doctor->image = $imageName1;
                    }
                    



                    
                   $doctor->save();

              // return view('table');
            return redirect()->route('admin.doctor.index')->with('success','Updated');

            
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
             $matri = Hospital::where('doctor_id',$id)->first();
            $matri ->status = 1;
            $matri ->save();
            
            return redirect()->route('admin.doctor.index')->with('success','deleted');
        }
    }
