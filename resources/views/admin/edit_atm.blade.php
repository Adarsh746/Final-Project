@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">EDIT ATM</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.atm.change',$atms->atm_id) }}">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('atm_bank') ? ' has-error' : '' }}">
                            <label for="atm_bank" class="col-md-4 control-label">ATM BANK</label>
                            <div class="col-md-6">
                                <input id="atm_bank" type="text" class="form-control" name="atm_bank" value="{{ $atms->atm_bank }}" required autofocus>
                               @if ($errors->has('atm_bank'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('atm_bank') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('atm_type') ? ' has-error' : '' }}">
                            <label for="atm_type" class="col-md-4 control-label">ATM Type</label>
                            <div class="col-md-6">
                                <input id="atm_type" type="text" class="form-control" name="atm_type" value="{{ $atms->atm_type }}" required autofocus>
                               @if ($errors->has('atm_type'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('atm_type') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                         <div class="form-group{{ $errors->has('atm_address') ? ' has-error' : '' }}">
                            <label for="atm_address" class="col-md-4 control-label">ATM Address</label>
                            <div class="col-md-6">
                                <input id="atm_address" type="textarea" class="form-control" name="atm_address" value="{{  $atms->atm_address }}" required autofocus>
                               @if ($errors->has('atm_address'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('atm_address') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('atm_open_time') ? ' has-error' : '' }}">
                            <label for="atm_open_time" class="col-md-4 control-label">ATM Opening</label>
                            <div class="col-md-6">
                                <input id="atm_open_time" type="time" class="form-control" name="atm_open_time" value="{{  $atms->atm_open_time }}" required autofocus>
                               @if ($errors->has('atm_open_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('atm_open_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        <div class="form-group{{ $errors->has('atm_close_time') ? ' has-error' : '' }}">
                            <label for="atm_close_time" class="col-md-4 control-label">ATM Closing</label>
                            <div class="col-md-6">
                                <input id="atm_close_time" type="time" class="form-control" name="atm_close_time" value="{{ $atms->atm_close_time }}" required autofocus>
                               @if ($errors->has('atm_close_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('atm_close_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>


                        
                    
                    
                       <<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">                    
                            <label for="city_id" class="col-md-4 control-label">City Name</label>
                            <div class="col-md-6">      
                                <select id="city_id"  class="form-control" name="city_id" value="{{ $atms->place_id}}" required autofocus>
                                    @foreach ($post as $dst)
                                    <option value="{{$dst->place_id}}">{{$dst->place_name}}  
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="update" class="btn btn-default">
                                    Edit Now
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
