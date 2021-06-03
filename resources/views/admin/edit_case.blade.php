@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Edit Case</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.case.change',$case->case_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('case_no') ? ' has-error' : '' }}">
                            <label for="case_no" class="col-md-4 control-label">Case Number</label>
                            <div class="col-md-6">
                                <input id="case_no" type="text" class="form-control" name="case_no" value="{{ $case->case_no }}" required autofocus>
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
                                <input id="case_name" type="text" class="form-control" name="case_name" value="{{ $case->case_name }}" required autofocus>
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
                                    <option value="Ciivil Case">Civil Case</option>
                                     <option value="IPR Case">IPR Case</option>
                                     <option value="Dishonor of Check">Dishonor of Check    </option>

                                   
                                </select>
                            </div>
                        </div>
                        

                  
                        
                        
                           

                       

                        
                    
                    
                        
                        
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label"> Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $case->description }}" required autofocus>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                    <div class="form-group{{ $errors->has('franchise_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="franchise_id" class="col-md-4 control-label">Assign Lawyer</label>

                        <div class="col-md-6">      
                        <select id="franchise_id"  class="form-control" name="franchise_id" value="{{ old('franchise_id') }}" required autofocus>
                        @foreach ($franchise as $nat)
                               <option value="{{$nat->franchise_id}}">{{$nat->franchise_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('franchise_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('franchise_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         x
                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control" name="rate" value="{{ old('rate') }}" required autofocus>
                               @if ($errors->has('rate'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('rate') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        </div>
                    
                        
                        
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Edit case
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
