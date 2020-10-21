@extends('admin.layouts.admin.struct')


@section('content')

<div class="portlet-body">
    <div class="tab-content ">
        <!-- PERSONAL INFO TAB -->

        <div class="portlet-title tabbable-line">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">Shopping Products</span>
            </div>
            <div class="tab-pane active" id="tab_1_1">
                <form role="form"  method="POST" action="{{Route('admin.shoppro.store')}}" enctype="multipart/form-data">
                    <div class="form-group">
                       {{ csrf_field() }}

                   </div>
                   <div class="form-group">
                    <label class="control-label">Product Name</label>
                    <input type="text" placeholder="Product Name" class="form-control " name="shopping_pro_name" /> 
                </div>
                <div class="form-group">
                    <label class="control-label">Product Details</label>
                    <textarea type="textarea" placeholder="Product Details" class="form-control " name="shopping_pro_details" > </textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Product Stock</label>
                     <input type="text" placeholder="Product Stock" class="form-control " name="shopping_pro_stock" /> 
                    

                </div>
                <div class="form-group">
                    <label class="control-label">Product Price</label>
                      <input type="number" placeholder="Product Price" class="form-control " name="shopping_pro_price" />

                    </div>
                    <div class="form-group">
                        <label class="control-label">Product Unit</label>
                        <select  class="form-control placeholder-no-fix"  id="shopping_product_unit" name="shopping_product_unit"> 
                            <option value=pack>Pack</option>
                            <option value=kilogram>Kilogram</option>
                        </select>
                    </div>
                     <div class="form-group">
                    <label class="control-label">Product Sub Category</label>
                     <select id="shopping_sub_cat_id"  class="form-control" name="shopping_sub_cat_id"  required autofocus>
                        @foreach ($sub_cat as $sub)
                               <option value="{{$sub->shopping_sub_cat_id}}">{{$sub->shopping_sub_cat_name}}</option>
                               @endforeach
                        </select>
                    </div>
                     <div class="form-group form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="control-label ">Image</label>
                    <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image"> 
                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('image')}}</strong>
                                    </span>
                                @endif
                </div>
                    <div class="form-group">
                        <label class="control-label">Product Additional Details</label>
                        <textarea type="textarea" placeholder="Product Additional Details" class="form-control " name="shopping_pro_additional_details" > </textarea>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Franchise</label>
                     <select id="shopping_pro_franchise_id"  class="form-control" name="shopping_pro_franchise_id"  required autofocus>
                        @foreach ($fran as $franch)
                               <option value="{{$franch->franchise_id}}">{{$franch->franchise_name}} id:{{$franch->franchise_id}}</option>
                               @endforeach
                        </select>
                    </div>

                        <div class="margiv-top-10">
                            <button type="submit"  class="btn green" tabindex="3">Save</button>	
                        </div>
                        <div class="margiv-top-10" style="margin-top:5px">
                            <button type="button" id="cancel" class="btn red" tabindex="3">Back</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script >
        $("#cancel").click(function ()
        {
            $('#tab_1_1')[0].reset();
        });
    </script>
</div>
@endsection