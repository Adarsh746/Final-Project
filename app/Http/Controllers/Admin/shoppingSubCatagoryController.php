<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shopping_sub_category;
use App\Shopping_category;

class ShoppingSubCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_cat = DB::table('shopping_categories')
        ->leftjoin('shopping_sub_categories','shopping_sub_categories.shopping_cat_id','=','shopping_categories.shopping_cat_id')
        ->select('shopping_sub_categories.shopping_sub_cat_id','shopping_sub_categories.shopping_sub_cat_name','shopping_categories.shopping_cat_name')
           ->where('shopping_sub_categories.status', '=', 0)
        ->get();

        // $sub_cat =Sub_category::select('sub_cat_id','sub_cat_name','cat_id')->get();

        return view('admin.view_shopping_sub_catagory', compact('sub_cat'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
        $catagory = Shopping_category::select('shopping_cat_id','shopping_cat_name')->get();

        return view('admin.add_shopping_sub_catagory', compact('catagory'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_cat_name' => 'required',
            'cat_id' => 'required',

        ]);

                $sub_cat = new Shopping_sub_category();
                $sub_cat->shopping_cat_id = $request->cat_id;
                $sub_cat->shopping_sub_cat_name = $request->sub_cat_name;
                
                $sub_cat->save();

            // return view('table');
             return redirect()->route('admin.subcat.index')->with('success','New Shopping Subcatagory Added');

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
         $sub_cat = DB::table('shopping_categories')
        ->join('shopping_sub_categories','shopping_sub_categories.shopping_cat_id','=','shopping_categories.shopping_cat_id')
        ->select('shopping_sub_categories.shopping_sub_cat_id','shopping_sub_categories.shopping_sub_cat_name','shopping_categories.shopping_cat_name','shopping_categories.shopping_cat_id')
        ->where('shopping_sub_categories.status', '=', 0)
        ->where('shopping_sub_categories.shopping_sub_cat_id', '=', $id)
        ->first();
        $catagory = Shopping_category::select('shopping_cat_id','shopping_cat_name')
        ->where('shopping_categories.status', '=', 0)

        ->get();

        return view('admin.edit_shopping_sub_catagory', compact('catagory','sub_cat'));

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
                $this->validate($request, [
            'sub_cat_name' => 'required',
            'cat_id' => 'required',

        ]);
                

                $sub_cat = Shopping_sub_category::find($id);
                $sub_cat->shopping_cat_id = $request->cat_id;
                $sub_cat->shopping_sub_cat_name = $request->sub_cat_name;
                
                $sub_cat->save();

            // return view('table');
             return redirect()->route('admin.subcat.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matri = Shopping_sub_category::where('shopping_sub_cat_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.subcat.index')->with('success','deleted');
    }
}
