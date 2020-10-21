@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Edit Doctor</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('franchise.doctor.change',$doctor->doctor_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('doctor_name') ? ' has-error' : '' }}">
                            <label for="doctor_name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="doctor_name" type="text" class="form-control" name="doctor_name" value="{{ $doctor->doctor_name }}" required autofocus>
                               @if ($errors->has('doctor_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('doctor_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>
                  
                        .
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>
                            <div class="col-md-6">
                                <input  id="designation" type="text" class="form-control" name="designation" value="{{ $doctor->designation }}" required autofocus>
                               @if ($errors->has('designation'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('designation') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>

                        <div class="form-group{{ $errors->has('hospital_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="place_id" class="col-md-4 control-label">Hospital Name</label>

                        <div class="col-md-6">      
                        <select id="place_id"  class="form-control" name="hospital_id" value="{{ $doctor->hospital_id }}" required autofocus>
                        @foreach ($hospital as $nat)
                               <option value="{{$nat->hospital_id}}">{{$nat->hospital_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('hospital_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hospital_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control" name="address" value="{{ $doctor->address }}" required autofocus >
                               @if ($errors->has('address'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ $doctor->mobile_number }}" required autofocus>
                               @if ($errors->has('mobile_number'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_number') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>

                        

                        <div class="form-group{{ $errors->has('doctor_category') ? ' has-error' : '' }}">
                            <label for="doctor_category" class="col-md-4 control-label"> Doctor Category</label>
                            <div class="col-md-6">
                                <input id="doctor_category" type="text" class="form-control" name="doctor_category" value="{{ $doctor->doctor_category }}" required autofocus>
                               @if ($errors->has('doctor_category'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('doctor_category') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    

                    
                    
                        </div>

                        <div class="form-group{{ $errors->has('open_time') ? ' has-error' : '' }}">
                            <label for="open_time" class="col-md-4 control-label">Consulting Time Starts</label>
                            <div class="col-md-6">
                                <input id="open_time" type="time" class="form-control" name="open_time" value="{{$doctor->open_time}}" required autofocus>
                               @if ($errors->has('open_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('open_time') }}</strong>    
                            </span>
                                @endif                        
                                             
                        </div>
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('close_time') ? ' has-error' : '' }}">
                            <label for="close_time" class="col-md-4 control-label">Consulting Time Ends</label>
                            <div class="col-md-6">
                                <input id="close_time" type="time" class="form-control" name="close_time" value="{{ $doctor->close_time}}" required autofocus>
                               @if ($errors->has('close_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('close_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                    
                    
                        
                        
                        
                            
                        <div class="form-group form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image" name="image"> 
                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
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
