@extends('franchise.layouts.franchise.struct')


@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Products</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="POST" action="{{Route('franchise.shoppro.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                         {{ csrf_field() }}

                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-4">Product Name</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Product Name" class="form-control " name="shopping_pro_name" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Product Details</label>
                        <div class="col-md-6">
                        <textarea type="textarea" placeholder="Product Details" class="form-control " name="shopping_pro_details" > </textarea>
                    </div></div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Product Stock</label>
                        <div class="col-md-6">
                        <input type="text" placeholder="Product Stock" class="form-control " name="shopping_pro_stock" /> 



                    </div> </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Product Price</label>
                        <div class="col-md-6">
                        <input type="number" placeholder="Product Price" class="form-control " name="shopping_pro_price" />

                    </div></div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Product Unit</label>
                        <div class="col-md-6">
                        <select  class="form-control placeholder-no-fix"  id="shopping_product_unit" name="shopping_product_unit"> 
                            <option value=pack>Pack</option>
                            <option value=kilogram>Kilogram</option>
                        </select>
                    </div></div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Product Sub Category</label>
                        <div class="col-md-6">
                        <select id="shopping_sub_cat_id"  class="form-control" name="shopping_sub_cat_id"  required autofocus>
                            @foreach ($sub_cat as $sub)
                            <option value="{{$sub->shopping_sub_cat_id}}">{{$sub->shopping_sub_cat_name}}</option>
                            @endforeach
                        </select>
                    </div></div>
                    <div class="form-group form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="control-label col-md-4 ">Image</label>
                        <div class="col-md-6">
                        <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image"> 
                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{$errors->first('image')}}</strong>
                        </span>
                        @endif
                    </div></div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Product Additional Details</label>
                        <div class="col-md-6">
                        <textarea type="textarea" placeholder="Product Additional Details" class="form-control " name="shopping_pro_additional_details" > </textarea>
                    </div>
                    </div>

                    <<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Product
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
    <script >
        $("#cancel").click(function ()
        {
            $('#tab_1_1')[0].reset();
        });
    </script>

@endsection