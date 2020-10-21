@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Property</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('franchise.realestate.store') }}">
                        {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('property_type') ? ' has-error' : '' }}">
                        <label for="property_type" class="col-md-4 control-label">Property Type</label>
                        <div class="col-md-6">      
                        <select onchange="rateChange()" id="property_type"  class="form-control" name="property_type" value="{{ old('property_type') }}" required autofocus>
                               <option class="home" value="home">Home</option>
                               <option class="land" value="land">Land</option>
                               <option class="shop" value="shop">Shop</option>
                               <option class="building" value="building">Building</option>
                        </select>

                                @if ($errors->has('property_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('property_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('property_category') ? ' has-error' : '' }}">
                        <label for="property_category" class="col-md-4 control-label">Property For</label>
                        <div class="col-md-6">      
                        <select id="property_category"  class="form-control" name="property_category" value="{{ old('property_category') }}" required autofocus>
                               <option  value="0">Sale</option>
                               <option  value="1">Rent</option>
                               <option  value="2">Lease</option>
                        </select>

                                @if ($errors->has('property_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('property_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <textarea id="ddress" type="textarea" class="form-control" name="address" value="{{ old('address') }}" required autofocus></textarea>
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
                        <select id="city_id"  class="form-control" name="city_id" value="{{ old('city_id') }}" required autofocus>
                        @foreach ($post as $dst)
                               <option value="{{$dst->place_id}}">{{$dst->place_name}} </option>
                               @endforeach
                        </select>

                                @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                          <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rate <span class="rate hm bld shp">For Property In Rs</span><span class="rate lnd">Per Cent In Rs</span>
                            </label>
                            <div class="col-md-6">
                                <input id="rate" type="number" min="1"   class="form-control" name="rate" value="{{ old('rate') }}" required autofocus>
                               @if ($errors->has('rate'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('rate') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>


                       



                        <div class="form-group{{ $errors->has('discription') ? ' has-error' : '' }}">
                            <label for="discription" class="col-md-4 control-label">Discription</label>
                            <div class="col-md-6">
                                <textarea id="discription" type="textarea" class="form-control" name="discription" value="{{ old('discription') }}" required autofocus></textarea>
                               @if ($errors->has('discription'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('discription') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        
                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" type="tel" pattern="^\d{10}$" required="required"  class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" autofocus>
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
                                <input id="mobile_number2" type="tel" type="tel" pattern="^\d{10}$"  class="form-control" name="mobile_number2" value="{{ old('mobile_number2') }}" autofocus>
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
                        <select id="user_id"  class="form-control" name="user_id" value="{{ old('user_id') }}" required autofocus>
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
                                    Add New Property
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
