    @extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading " style="background:#36c6d3;color:white">Edit Tool</div>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('franchise.emp.change',$emp->franchise_id) }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('franchise_name') ? ' has-error' : '' }}">
                            <label for="franchise_name" class="col-md-4 control-label">Labourer Name</label>
                            <div class="col-md-6">
                                <input id="franchise_name" type="text" class="form-control" name="franchise_name" value="{{ $emp->franchise_name }}" required autofocus>
                               @if ($errors->has('franchise_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('franchise_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                
                        
                            </div>

                        </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                    
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">      
                        <input id="email" type="text" class="form-control" name="email" value="{{ $emp->email }}" required autofocus>
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
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ $emp->contact }}" required autofocus>
                               @if ($errors->has('contact'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('contact') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>
                         <div class="form-group{{ $errors->has('contact1') ? ' has-error' : '' }}">
                            <label for="contact1" class="col-md-4 control-label">Additional contact</label>
                            <div class="col-md-6">
                                <input id="contact1" type="text" class="form-control" name="contact1" value="{{ $emp->contact1 }}" required autofocus>
                               @if ($errors->has('contact1'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('contact1') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>
                       
                          
                          <div class="form-group{{ $errors->has('curr_address') ? ' has-error' : '' }}">
                            <label for="curr_address" class="col-md-4 control-label">Current Address</label>
                            <div class="col-md-6">
                                <input id="curr_address" type="text" class="form-control" name="curr_address" value="{{ $emp->curr_address }}" required autofocus>
                               @if ($errors->has('curr_address'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('curr_address') }}</strong>
                                @endif
                        
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
