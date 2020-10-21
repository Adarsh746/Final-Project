@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Edit Matrimony</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('franchise.matrimony.edit',$matri->mat_reg_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $matri->name }}" required autofocus>
                               @if ($errors->has('name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
        
                         <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Age</label>
                            <div class="col-md-6">
                                <input id="age" type="number" min="18" max="100"  class="form-control" name="age" value="{{ $matri->age }}" required autofocus>
                               @if ($errors->has('age'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('age') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>


                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="col-md-4 control-label">Gender</label>
                        <div class="col-md-6">      
                        <select id="gender"  class="form-control" name="gender" value="{{ $matri->gender }}" required autofocus>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                        </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Religion') ? ' has-error' : '' }}">
                        <label for="religion" class="col-md-4 control-label">Religion</label>
                        <div class="col-md-6">      
                        <select id="religion"  class="form-control" name="religion" value="{{ $matri->religion }}" required autofocus>
                               <option value="Hindu">Hindu</option>
                               <option value="Muslim">Muslim</option>
                               <option value="Christian">Christian</option>
                        </select>

                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caste') ? ' has-error' : '' }}">
                        <label for="caste" class="col-md-4 control-label">Caste</label>
                        <div class="col-md-6">      
                        <select id="caste"  class="form-control caste" name="caste" value="{{ $matri->caste }}" required autofocus>
                            <option class="hin" value="General">General</option>
                            <option class="hin" value="OBC">OBC</option>
                            <option class="hin" value="Nair">Nair</option>
                            <option class="hin" value="Thiyya">Thiyya</option>
                            <option class="hin" value="Bhramin">Bhramin</option>
                            <option class="hin" value="Ezhava">Ezhava</option>
                            <option class="hin" value="Vishvakarma">Vishvakarma</option>
                            <option class="hin" value="Others">Others</option>
                        </select>

                                @if ($errors->has('caste'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caste') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">Weight in KG</label>
                            <div class="col-md-6">
                                <input id="weight" type="number" min="1" max="500"  class="form-control" name="weight" value="{{ $matri->weight }}" required autofocus>
                               @if ($errors->has('weight'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('weight') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            <label for="height" class="col-md-4 control-label">Height in CM</label>
                            <div class="col-md-6">
                                <input id="height" type="number" min="1" max="500"  class="form-control" name="height" value="{{$matri->height }}" required autofocus>
                               @if ($errors->has('height'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('height') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" type="tel" pattern="^\d{10}$" required="required"  class="form-control" name="mobile_number" value="{{$matri->mobile_number }}" autofocus>
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
                                <input id="mobile_number2" type="tel" type="tel" pattern="^\d{10}$"  class="form-control" name="mobile_number2" value="{{ $matri->mobile_number2 }}" autofocus>
                               @if ($errors->has('mobile_number2'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_number2') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        
                        
                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="textarea" class="form-control" name="address" value="{{ $matri->address}}" required autofocus>
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
                        <select id="city_id"  class="form-control" name="city_id" value="{{ $matri->city_id }}" required autofocus>
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

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="user_id" class="col-md-4 control-label">User Name</label>

                        <div class="col-md-6">      
                        <select id="user_id"  class="form-control" name="user_id" value="{{ $matri->user_name }}" required autofocus>
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

                         <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Education</label>
                            <div class="col-md-6">
                                <input id="education" type="textarea" class="form-control" name="education" value="{{ $matri->education }}" required autofocus>
                               @if ($errors->has('education'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('education') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                            <label for="job" class="col-md-4 control-label">Job</label>
                            <div class="col-md-6">
                                <input id="job" type="textarea" class="form-control" name="job" value="{{$matri->job }}" required autofocus>
                               @if ($errors->has('job'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('job') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Skin Tone</label>
                            <div class="col-md-6">
                                <input id="color" type="textarea" class="form-control" name="color" value="{{ $matri->color }}"  autofocus>
                               @if ($errors->has('color'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('color') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('demands') ? ' has-error' : '' }}">
                            <label for="demands" class="col-md-4 control-label">Demands</label>
                            <div class="col-md-6">
                                <input id="demands" type="textarea" class="form-control" name="address" value="{{ $matri->demands }}"  autofocus>
                               @if ($errors->has('demands'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('demands') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
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
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Update
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
