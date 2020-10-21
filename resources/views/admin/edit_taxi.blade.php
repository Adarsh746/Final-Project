@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Edit Taxi</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('admin.taxi.change',$taxi->taxi_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('taxi_name') ? ' has-error' : '' }}">
                            <label for="taxi_name" class="col-md-4 control-label">Taxi Name</label>
                            <div class="col-md-6">
                                <input id="taxi_name"  type="text"   class="form-control" name="taxi_name" value="{{ $taxi->taxi_name }}" autofocus>
                                @if ($errors->has('taxi_name'))                                
                                <span class="help-block">
                                    <strong>{{ $errors->first('taxi_name') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                            <label for="vehicle_no" class="col-md-4 control-label">Vehicle Number 
                            </label>
                            <div class="col-md-6">
                                <input id="vehicle_no" type="text"   class="form-control" name="vehicle_no" value="{{ $taxi->vehicle_no }}" required autofocus>
                               @if ($errors->has('vehicle_no'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('vehicle_no') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Taxi Category</label>
                            <div class="col-md-6">
                                <select id="catagory"  class="form-control" name="catagory"  required autofocus>
                                    <option value="{{ $taxi->catagory }}">{{ $taxi->catagory }}</option>
                                    <option value="goods">Goods</option>
                                     <option value="passenger">Passenger</option>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('taxi_capacity') ? ' has-error' : '' }}">
                            <label for="taxi_capacity" class="col-md-4 control-label">Capacity</label>
                            <div class="col-md-6">
                                <input id="taxi_capacity" type="text"  required="required"  class="form-control" name="taxi_capacity" value="{{ $taxi->taxi_capacity}}" autofocus>
                               @if ($errors->has('taxi_capacity'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('taxi_capacity') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        <div class="form-group{{ $errors->has('available_from') ? ' has-error' : '' }}">                    
                            <label for="available_from" class="col-md-4 control-label">Available From </label>
                            <div class="col-md-6">      
                                <Input id="available_from"  class="form-control" name="available_from" type="time" value="{{ $taxi->available_from }}" required autofocus>
                                
                                </Input>
                                @if ($errors->has('available_from'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('available_from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('available_to') ? ' has-error' : '' }}">                    
                            <label for="available_to" class="col-md-4 control-label">Available To</label>
                            <div class="col-md-6">      
                                <Input id="available_to"  class="form-control" name="available_to" type="time" value="{{ $taxi->available_to }}" required autofocus>
                                
                                </Input>
                                @if ($errors->has('available_to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('available_to') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('discription') ? ' has-error' : '' }}">
                            <label for="discription" class="col-md-4 control-label">Discription</label>
                            <div class="col-md-6">
                                <input  id="discription" type="textfield" class="form-control" name="discription" value="{{$taxi->discription }}" required autofocus>
                                @if ($errors->has('discription'))                                
                                <span class="help-block">
                                    <strong>{{ $errors->first('discription') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Taxi Type</label>
                            <div class="col-md-6">
                                <select id="taxi_type"  class="form-control" name="taxi_type"  required autofocus>
                                   
                                    <option value="{{ $taxi->taxi_type }}">{{ $taxi->taxi_type  }}</option>
                                    <option value="light vehicle">Light vehicle</option>
                                    <option value="heavy vehicle">Heavy vehicle</option>
                                     <option value="three weeler">Three weeler</option>
                                   
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rate 
                            </label>
                            <div class="col-md-6">
                                <input id="rate" type="number" min="1"   class="form-control" name="rate" value="{{  $taxi->rate }}" required autofocus>
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
                                <input id="address" type="textfield" class="form-control" name="address" value="{{  $taxi->address }}" required autofocus>
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
                                <select id="city_id"  class="form-control" name="city_id" value="{{  $taxi->city_id }}" required autofocus>
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
                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" type="tel" pattern="^\d{10}$" required="required"  class="form-control" name="mobile_number" value="{{  $taxi->mobile_number }}" autofocus>
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
                                <input id="mobile_number2" type="tel" type="tel" pattern="^\d{10}$"  class="form-control" name="mobile_number2" value="{{  $taxi->mobile_number2 }}" autofocus>
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
                                <select id="user_id"  class="form-control" name="user_id" value="{{  $taxi->user_id }}" required autofocus>
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

                       
                        

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="Update" class="btn btn-default">
                                    Edit Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
