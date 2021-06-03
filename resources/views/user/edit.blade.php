    @extends('user.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading " style="background:#36c6d3;color:white">Edit Tool</div>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('user.user.change',$user->user_id) }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <label for="user_name" class="col-md-4 control-label">Citizen Name</label>
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" required autofocus>
                               @if ($errors->has('user_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('user_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                
                        
                            </div>

                        </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                    
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">      
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                          </div>
                        </div>
                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            
                    
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">      
                        <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required autofocus>
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
                              

                          
                          
                        
                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">contact</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ $user->contact }}" required autofocus>
                               @if ($errors->has('contact'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('contact') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>

                          
                          
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Edit Profile
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
