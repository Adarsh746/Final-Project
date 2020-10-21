<?php
    namespace App\Http\Controllers\User;
    use\Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use App\Hospital;
    use App\User;
    use App\Local_place;
    use Illuminate\Support\Facades\Auth;




    class HospitalController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
          $user = Auth::user();

         $user_city = $user->post_office_id;
         

         $cty = DB::table('local_places')
         ->where('post_office_id',$user_city)
         ->get();
        foreach ($cty as $index => $value) {
            $city_id[$index] = $value->place_id;

         }

            $hospital = DB::table('hospitals')
    ->join('local_places','local_places.place_id','=','hospitals.city_id')
    ->join('users','users.user_id','=','hospitals.user_id')
    ->whereIn('hospitals.city_id',$city_id)


    ->select()
    // ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
    ->where('hospitals.status', '=', 0)
    ->get();
    dd($hospital);


            // $state =State::select('nation_id','state_name','state_id')->get();

            return view('user.view_hospital', compact('hospital'));

             }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        
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
