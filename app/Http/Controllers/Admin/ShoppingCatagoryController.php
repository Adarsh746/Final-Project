<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shopping_category;
class ShoppingCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Shopping_category::select('shopping_cat_id','shopping_cat_name')
        ->where('shopping_categories.status', '=', 0)
        ->get();

        return view('admin.view_shopping_catagory', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_category');
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
            'cat_name' => 'required',
           

        ]);

                $catagory = new Shopping_category();
               
                $catagory->shopping_cat_name = $request->cat_name;
                
                $catagory->save();

            // return view('table');
             return redirect()->route('admin.catagory.index')->with('success','New Shopping Catagory Added');

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
        $cat = Shopping_category::select('shopping_cat_id','shopping_cat_name')
        ->where('shopping_categories.shopping_cat_id', '=', $id)
        ->first();
        return view('admin.edit_category', compact('cat'));
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
            'cat_name' => 'required',
           

        ]);

                $catagory = Shopping_category::find($id);
               
                $catagory->shopping_cat_name = $request->cat_name;
                
                $catagory->save();
                return redirect()->route('admin.catagory.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $matri = Shopping_category::where('shopping_cat_id',$id)->first();
        $matri ->status = 1;
        $matri ->save();
        
        return redirect()->route('admin.catagory.index')->with('success','deleted');
    }
}
