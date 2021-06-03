@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add work</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('franchise.meeting.change',$meeting->meeting_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('meeting_topic') ? ' has-error' : '' }}">
                            <label for="meeting_topic" class="col-md-4 control-label">Work Details</label>
                            <div class="col-md-6">
                                <input id="meeting_topic" type="text" class="form-control" name="meeting_topic" value="{{ $meeting->meeting_topic }}" required autofocus>
                               @if ($errors->has('meeting_topic'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('meeting_topic') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('franchise_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="franchise_id" class="col-md-4 control-label">Labourer</label>

                        <div class="col-md-6">      
                        <select id="franchise_id"  class="form-control" name="franchise_id" value="{{ $meeting->franchise_id }}" required autofocus>
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
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                <input type="date"  id="date" class="form-control" name="date" value="{{ $meeting->date }}" required autofocus></textarea>
                                @if ($errors->has('date'))                                <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>

                  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="user_id" class="col-md-4 control-label">Client</label>

                        <div class="col-md-6">      
                        <select id="user_id"  class="form-control" name="user_id" value="{{ $meeting->user_id }}" required autofocus>
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
                        </div>
                        
                        
                        
                           

                       

                        <div class="form-group{{ $errors->has('open_time') ? ' has-error' : '' }}">
                            <label for="open_time" class="col-md-4 control-label">Starting Time</label>
                            <div class="col-md-6">
                                <input id="open_time" type="time" class="form-control" name="open_time" value="{{ $meeting->open_time }}" required autofocus>
                               @if ($errors->has('open_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('open_time') }}</strong>    
                            </span>
                                @endif                        
                                             
                        </div>
                    
                    
                        </div>
                        <div class="form-group{{ $errors->has('close_time') ? ' has-error' : '' }}">
                            <label for="close_time" class="col-md-4 control-label">Finishing Time</label>
                            <div class="col-md-6">
                                <input id="close_time" type="time" class="form-control" name="close_time" value="{{ $meeting->close_time }}" required autofocus>
                               @if ($errors->has('close_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('close_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label"> Description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ $meeting->description }}" required autofocus></textarea>
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
                                    Schedule New Work
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
