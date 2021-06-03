@extends('user.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add New Tool</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('user.tool.store') }}">
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
                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label"> Rent/Day</label>
                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control" name="rate" value="{{ old('rate') }}" required autofocus>
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
                                <textarea id="description" type="textarea" class="form-control" name="description" value="{{ old('description') }}" required autofocus ></textarea>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        </div>
                            </div>
                           
                        <div class="form-group form-group{{ $errors->has('tool_image') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label ">tool_image</label>
                            <div class="col-md-6">
                                <input class="form-control placeholder-no-fix" type="file" placeholder="tool_image" name="tool_image"> 
                                @if ($errors->has('tool_image'))
                                <span class="help-block">
                                    <strong>{{$errors->first('tool_image')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        

                    
                      
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Tool
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
