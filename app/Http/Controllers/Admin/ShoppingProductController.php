<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Shopping_category;
use App\Shopping_sub_category;
use App\Shopping_product;
use App\Franchise_group;
use App\Franchise;

class ShoppingProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $sh_pro = DB::table('shopping_products')
        ->leftjoin('shopping_sub_categories', 'shopping_sub_categories.shopping_sub_cat_id', '=', 'shopping_products.shopping_sub_cat_id')
        ->leftjoin('franchises', 'franchises.franchise_id', '=', 'shopping_products.shopping_pro_franchise_id')
        ->select('franchises.franchise_id','franchises.franchise_name','shopping_products.shopping_pro_name','shopping_products.shopping_pro_id','shopping_products.shopping_pro_details','shopping_products.shopping_pro_status','shopping_products.shopping_pro_stock','shopping_products.shopping_pro_price','shopping_products.shopping_product_unit','shopping_products.image','shopping_products.shopping_pro_additional_details','shopping_sub_categories.shopping_sub_cat_name')
        ->get();        
                
        return view('admin.view_shopping_product', compact('sh_pro'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_cat =Shopping_sub_category::select('shopping_sub_cat_id','shopping_sub_cat_name')->get();
        $fran =Franchise::select('franchise_id','franchise_name')->get();
       
                
        return view('admin.add_shopping_product', compact('sub_cat','fran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request['image']) {
          

        $imageName = time() . '.' . $request->file('image')->Extension();
    
        $request['image']->move(
        base_path() . '/public/product/images/', $imageName
    );
      }
        $this->validate($request, [
            'shopping_pro_name' => 'required',
            'shopping_pro_details' => 'required',
            'shopping_pro_stock' => 'required',
            'shopping_pro_price' => 'required',
            'shopping_product_unit' => 'required',
            'shopping_pro_additional_details' => 'required',
            'shopping_pro_franchise_id' => 'required',
            'shopping_sub_cat_id' => 'required',           
        ]);

                $sh_pro = new Shopping_product();
               
                                       
                $sh_pro ->shopping_pro_name = $request->shopping_pro_name;
                $sh_pro ->shopping_pro_details = $request->shopping_pro_details;
                $sh_pro ->shopping_pro_status = $request->shopping_pro_status;
                $sh_pro ->shopping_pro_stock = $request->shopping_pro_stock;
                $sh_pro ->shopping_pro_price  = $request->shopping_pro_price;
                $sh_pro ->shopping_product_unit = $request->shopping_product_unit;
                $sh_pro ->shopping_pro_additional_details = $request->shopping_pro_additional_details;
                $sh_pro ->image = $imageName;
                $sh_pro ->shopping_pro_franchise_id  = $request->shopping_pro_franchise_id;
                $sh_pro ->shopping_sub_cat_id = $request->shopping_sub_cat_id;
                $sh_pro ->product_scope = $request->product_scope;
               
                $sh_pro ->save();

            // return view('table');
             return redirect()->route('admin.shoppro.index')->with('success','New Product Added');
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
        $sh_pro = DB::table('shopping_products')
        ->leftjoin('shopping_sub_categories', 'shopping_sub_categories.shopping_sub_cat_id', '=', 'shopping_products.shopping_sub_cat_id')
        ->leftjoin('franchises', 'franchises.franchise_id', '=', 'shopping_products.shopping_pro_franchise_id')
        ->select('franchises.franchise_id','franchises.franchise_name','shopping_products.shopping_pro_name','shopping_products.shopping_pro_id','shopping_products.shopping_pro_details','shopping_products.shopping_pro_status','shopping_products.shopping_pro_stock','shopping_products.shopping_pro_price','shopping_products.shopping_product_unit','shopping_products.image','shopping_products.shopping_pro_additional_details','shopping_sub_categories.shopping_sub_cat_name')
        ->where('shopping_products.shopping_pro_id', '=', $id)
        ->where('shopping_products.status', '=', 0)
        ->first();
        $sub_cat =Shopping_sub_category::select('shopping_sub_cat_id','shopping_sub_cat_name')->get();
        $fran =Franchise::select('franchise_id','franchise_name')->get();
       
                
        return view('admin.edit_shopping_product', compact('sub_cat','fran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        

        $emp =Franchise::find($id);
        $emp ->aproval_status = 1;
        $emp ->save();
        return redirect('admin/emp/create')->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp =Franchise::find($id);
        $emp ->account_status = 1;
        $emp ->save();
        return redirect('admin/emp/create')->with('success','deleted');
        
    }
    
}
