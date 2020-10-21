@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Hospital</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.hospital.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('hospital_name') ? ' has-error' : '' }}">
                            <label for="state_name" class="col-md-4 control-label">Hospital Name</label>
                            <div class="col-md-6">
                                <input id="hospital_name" type="text" class="form-control" name="hospital_name" value="{{ old('hospital_name') }}" required autofocus>
                               @if ($errors->has('hospital_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('hospital_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>
                  
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label"> Description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                    <!-- 
                       

                  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="user_id" class="col-md-4 control-label">Owner</label>

                        <div class="col-md-6">      
                        <select id="user_id"  class="form-control" name="user_id" value="{{ old('user_id') }}" required autofocus>
                        @foreach ($user as $nat)
                               <option value="{{$nat->user_id}}">{{$nat->user_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <textarea id="Address" type="textarea" class="form-control" name="address" value="{{ old('address') }}" required autofocus ></textarea>
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
                                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autofocus>
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
                                <input id="mobile_number2" type="text" class="form-control" name="mobile_number2" value="{{ old('mobile_number2') }}" required autofocus>
                               @if ($errors->has('mobile_number2'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_number2') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hospital_capacity') ? ' has-error' : '' }}">
                            <label for="hospital_capacity" class="col-md-4 control-label"> Hospital Capacity</label>
                            <div class="col-md-6">
                                <input id="hospital_capacity" type="text" class="form-control" name="hospital_capacity" value="{{ old('hospital_capacity') }}" required autofocus>
                               @if ($errors->has('hospital_capacity'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('hospital_capacity') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    

                    
                    
                        </div>

                        <div class="form-group{{ $errors->has('open_time') ? ' has-error' : '' }}">
                            <label for="open_time" class="col-md-4 control-label">Opening</label>
                            <div class="col-md-6">
                                <input id="open_time" type="time" class="form-control" name="open_time" value="{{ old('open_time') }}" required autofocus>
                               @if ($errors->has('open_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('open_time') }}</strong>    
                            </span>
                                @endif                        
                                             
                        </div>
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('close_time') ? ' has-error' : '' }}">
                            <label for="close_time" class="col-md-4 control-label">Closing</label>
                            <div class="col-md-6">
                                <input id="close_time" type="time" class="form-control" name="close_time" value="{{ old('close_time') }}" required autofocus>
                               @if ($errors->has('close_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('close_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                    
                    
                        
                        
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label"> Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" required autofocus>
                               @if ($errors->has('website'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('website') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                            </div>
                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="facebook" class="col-md-4 control-label"> FaceBook</label>
                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" required autofocus>
                               @if ($errors->has('facebook'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('facebook') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    </div>
                        

                        <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                            <label for="whatsapp" class="col-md-4 control-label"> Whatsapp</label>
                            <div class="col-md-6">
                                <input id="whatsapp" type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}" required autofocus>
                               @if ($errors->has('whatsapp'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('whatsapp') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                            <label for="instagram" class="col-md-4 control-label"> Instagram</label>
                            <div class="col-md-6">
                                <input id="instagram" type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" required autofocus>
                               @if ($errors->has('instagram'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('instagram') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                        </div>

                            
                        <div class="form-group form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Logo</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="logo" name="logo"> 
                                @if ($errors->has('logo'))
                                <span class="help-block">
                                    <strong>{{$errors->first('logo')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Banner</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="banner" name="banner"> 
                                @if ($errors->has('banner'))
                                <span class="help-block">
                                    <strong>{{$errors->first('banner')}}</strong>
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
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image2" name="image2"> 
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
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image3" name="image3"> 
                                @if ($errors->has('image3'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image3')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group form-group{{ $errors->has('image4') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image4" name="image4"> 
                                @if ($errors->has('image1'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image4')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group form-group{{ $errors->has('image5') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image5" name="image5"> 
                                @if ($errors->has('image5'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image5')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image6') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image6" name="image6"> 
                                @if ($errors->has('image6'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image6')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image7') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image7" name="image7"> 
                                @if ($errors->has('image7'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image7')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image8') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image8" name="image8"> 
                                @if ($errors->has('image8'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image8')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image9') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image9" name="image9"> 
                                @if ($errors->has('image9'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image9')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group{{ $errors->has('image10') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="image10" name="image10"> 
                                @if ($errors->has('image10'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image10')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>






                        

                    
                        <div class="form-group{{ $errors->has('place_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="place_id" class="col-md-4 control-label">City</label>

                        <div class="col-md-6">      
                        <select id="place_id"  class="form-control" name="place_id" value="{{ old('place_id') }}" required autofocus>
                        @foreach ($city as $nat)
                               <option value="{{$nat->place_id}}">{{$nat->place_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('place_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Shop
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
