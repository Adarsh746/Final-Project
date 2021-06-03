@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Rent</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.rent.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('tool_name') ? ' has-error' : '' }}">
                            <label for="tool_name" class="col-md-4 control-label">Tool Name</label>
                            <div class="col-md-6">
                                <input id="tool_name" type="text" class="form-control" name="tool_name" value="{{ old('tool_name') }}" required autofocus>
                               @if ($errors->has('tool_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('tool_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>

                 <!-- <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            
                    
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
                        </div>-->
                        
                        <div class="form-group{{ $errors->has('tool_count') ? ' has-error' : '' }}">
                            <label for="tool_count" class="col-md-4 control-label"> Tool Count</label>
                            <div class="col-md-6">
                                <input id="tool_count" type="text" class="form-control" name="tool_count" value="{{ old('tool_count') }}" required autofocus>
                               @if ($errors->has('tool_count'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('tool_count') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea id="Description" type="textarea" class="form-control" name="address" value="{{ old('description') }}" required autofocus ></textarea>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        </div>
                            </div>
                            <!--<div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
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
                        
                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label for="twitter" class="col-md-4 control-label"> Twitter</label>
                            <div class="col-md-6">
                                <input id="twitter" type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" required autofocus>
                               @if ($errors->has('twitter'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('twitter') }}</strong>    
                        
                    
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

                            <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
                            <label for="youtube" class="col-md-4 control-label"> Youtube</label>
                            <div class="col-md-6">
                                <input id="youtube" type="youtube" class="form-control" name="youtube" value="{{ old('youtube') }}" required autofocus>
                               @if ($errors->has('youtube'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('youtube') }}</strong>    
                        
                    
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
                        </div>-->
                        <div class="form-group form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">Image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="Image" name="image"> 
                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--<div class="form-group form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
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
                        </div>-->

                        

                    
                      
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Rent
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
