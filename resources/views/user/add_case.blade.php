@extends('user.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Case</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('user.case.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('case_no') ? ' has-error' : '' }}">
                            <label for="case_no" class="col-md-4 control-label">Case Number</label>
                            <div class="col-md-6">
                                <input id="case_no" type="text" class="form-control" name="case_no" value="{{ old('case_no') }}" required autofocus>
                               @if ($errors->has('case_no'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('case_no') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('case_name') ? ' has-error' : '' }}">
                            <label for="case_name" class="col-md-4 control-label">Case Name</label>
                            <div class="col-md-6">
                                <input id="case_name" type="text" class="form-control" name="case_name" value="{{ old('case_name') }}" required autofocus>
                               @if ($errors->has('case_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('case_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Case Type</label>
                            <div class="col-md-6">
                                <select id="case_type"  class="form-control" name="case_type"  required autofocus>
                                   
                                    <option value="Criminal Case">Criminal Case</option>
                                    <option value="Ciivil Case">Ciivil Case</option>
                                     <option value="IPR Case">IPR Case</option>
                                     <option value="Dishonor of Check">Dishonor of Check    </option>

                                   
                                </select>
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
                    
                    
                        
                        
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Schedule New case
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
