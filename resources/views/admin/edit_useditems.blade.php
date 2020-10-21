    @extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Update Item</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.useditems.change',$used_items->property_id) }}">
                        {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('item_name') ? ' has-error' : '' }}">
                            <label for="item_name" class="col-md-4 control-label">Item Name</label>
                            <div class="col-md-6">
                                <input id="item_name"  type="text"   class="form-control" name="item_name" value="{{ $used_items->item_name }}" autofocus>
                               @if ($errors->has('item_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('item_name') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Item Sub Category</label>
                            <div class="col-md-6">
                                <select id="shopping_sub_cat_id"  class="form-control" name="shopping_sub_cat_id"  required autofocus>
                                    @foreach ($sub_cat as $sub)
                                    <option value="{{$sub->shopping_sub_cat_id}}">{{$sub->shopping_sub_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('discription') ? ' has-error' : '' }}">
                            <label for="discription" class="col-md-4 control-label">Discription</label>
                            <div class="col-md-6">
                                <input id="discription" type="textfield" class="form-control" name="discription" value="{{ $used_items->discription }}" required autofocus></textarea>
                                @if ($errors->has('discription'))                                
                                <span class="help-block">
                                    <strong>{{ $errors->first('discription') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('date_of_manufacture') ? ' has-error' : '' }}">
                            <label for="date_of_manufacture" class="col-md-4 control-label">Date Of Manufacture</label>
                            <div class="col-md-6">
                                <input type="date"  id="date_of_manufacture" class="form-control" name="date_of_manufacture" value="{{ $used_items->date_of_manufacture }}" required autofocus></textarea>
                                @if ($errors->has('date_of_manufacture'))                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_manufacture') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rate 
                            </label>
                            <div class="col-md-6">
                                <input id="rate" type="number" min="1"   class="form-control" name="rate" value="{{ $used_items->rate }}" required autofocus>
                               @if ($errors->has('rate'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('rate') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id=address" type="textfield" class="form-control" name="address" value="{{ $used_items->address }}" required autofocus></input>
                               @if ($errors->has('address'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">                    
                            <label for="city_id" class="col-md-4 control-label">City Name</label>
                            <div class="col-md-6">      
                                <select id="city_id"  class="form-control" name="city_id" value="{{ $used_items->city_id }}" required autofocus>
                                    @foreach ($post as $dst)
                                    <option value="{{$dst->place_id}}">{{$dst->place_name}}  
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" type="tel" pattern="^\d{10}$" required="required"  class="form-control" name="mobile_number" value="{{ $used_items->mobile_number }}" autofocus>
                               @if ($errors->has('mobile_number'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_number') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('mobile_number2') ? ' has-error' : '' }}">
                            <label for="mobile_number2" class="col-md-4 control-label">Additional Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number2" type="tel" type="tel" pattern="^\d{10}$"  class="form-control" name="mobile_number2" value="{{ $used_items->mobile_number2 }}" autofocus>
                               @if ($errors->has('mobile_number2'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_number2') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">


                            <label for="user_id" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">      
                                <select id="user_id"  class="form-control" name="user_id" value="{{ $used_items->user_id }}" required autofocus>
                                    @foreach ($users as $user)
                                    <option value="{{$user->user_id}}">{{$user->user_name}} {{$user->user_id}} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image1"> 
                                @if ($errors->has('image1'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image1')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image2"> 
                                @if ($errors->has('image2'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image2')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image3"> 
                                @if ($errors->has('image3'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image3')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Edit now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function(){
        $(".rate").hide();
        $(".rate.hm").show();
    });
   function rateChange() {
  var x = document.getElementById("property_type").value;
   if( x == "land"){
    $(".rate").hide();
    $(".rate.lnd").show();
     
   }else{
    $(".rate").hide();
    $(".rate.hm").show();

   }
}
</script>
@endsection
