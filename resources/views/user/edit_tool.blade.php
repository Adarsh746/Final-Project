    @extends('user.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading " style="background:#36c6d3;color:white">Edit Tool</div>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('user.tool.change',$rent->rent_id) }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('tool_name') ? ' has-error' : '' }}">
                            <label for="tool_name" class="col-md-4 control-label">Tool Name</label>
                            <div class="col-md-6">
                                <input id="tool_name" type="text" class="form-control" name="tool_name" value="{{ $rent->tool_name }}" required autofocus>
                               @if ($errors->has('tool_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('tool_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                
                        
                            </div>

                        </div>

                  <div class="form-group{{ $errors->has('tool_count') ? ' has-error' : '' }}">
                            
                    
                        <label for="tool_count" class="col-md-4 control-label">tool_count</label>

                        <div class="col-md-6">      
                        <input id="tool_count" type="text" class="form-control" name="tool_count" value="{{ $rent->tool_count }}" required autofocus>
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
                                
                        
                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rent/Tool</label>
                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control" name="rate" value="{{ $rent->rate }}" required autofocus>
                               @if ($errors->has('rate'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('rate') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                         </div>
                       
                          
                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $rent->description }}" required autofocus>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                                @endif
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Save Changes
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
