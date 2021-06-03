<?php

namespace App\Http\Controllers\User;
use\Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Book;
use App\Tool;
use App\User;
use App\Franchise;
use App\Local_place;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        


        
          $book = DB::table('books')
          ->leftjoin('users','users.user_id','=','books.user_id')
->leftjoin('tools','tools.book','=','books.book_id')




->select()
->where('books.status','=',0)
// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->get();




 return view('user.view_book', compact('book'));
     



        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
     $user =User::select('user_id','user_name')->get();
   $franchise =franchise::select('franchise_id','franchise_name')->get();

    return view('franchise.add_rent', compact('user','franchise'));
     }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response

    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $id=Auth::user()->user_id;
        $book = DB::table('books')
          ->leftjoin('franchises','franchises.franchise_id','=','books.franchise_id')


->leftjoin('tools','tools.book','=','books.book_id')




->select()
->where('books.status','=',0)
->where('books.user_id','=',$id)

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
//$user =User::select('user_id','user_name')
->get();




 return view('franchise.view_mybook', compact('book'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        

        $tool = DB::table('tools')
// ->leftjoin('users','users.user_id','=','tools.user_id')
// ->leftjoin('franchises','franchises.franchise_id','=','tools.franchise_id')
// ->leftjoin('post_offices','post_offices.post_office_id','=','tools.post')





->select()

->where('tools.tool_id', '=', $id)

// ->where(['states.status', '=',0, 'nations.status' ,'=', 0])
->first();

 return view('user.add_book', compact('tool'));

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
       $fid=Auth::user()->user_id;
       



       $tool =tool::find($id);
        $tool ->tool_count = $tool->tool_count-1;
        $book ->save();
        $tool ->book = $tool->book+1;

        
        $tool ->save();
     

        // $franchise = (Auth::user()->franchise_id);
        // // $tool = Auth::tool();
       
      
       // $this->validate($request, [
       //     'tool_name' => 'required',
       //     'place_id' => 'required',
       //     'tool_image' => 'required',
       //     'tool_count' => 'required'
           

         // ]);
            $book = new book();
           $book->tool_name = $id;
            
            
            $book->user_id = $fid ;
            $book->book_day = $request->book_day;
            $book->book_time = $request->book_time;
            
            
               $book->save();
                
             

          // return view('table');
        return redirect()->route('user.book.show')->with('success','Booked Successfully');

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
         $matri = tool::where('book_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('user.book.index')->with('success','deleted');
    }
}
