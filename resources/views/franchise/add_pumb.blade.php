@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Petrol Pumb</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('franchise.pumb.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('pumb_name') ? ' has-error' : '' }}">
                            <label for="pumb_name" class="col-md-4 control-label">Pumb Name</label>
                            <div class="col-md-6">
                                <input id="pumb_name" type="text" class="form-control" name="pumb_name" value="{{ old('pumb_name') }}" required autofocus>
                               @if ($errors->has('atm_bank'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pumb_name') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('pumb_company') ? ' has-error' : '' }}">
                            <label for="pumb_company" class="col-md-4 control-label">Pumb Company</label>
                            <div class="col-md-6">
                                <input id="pumb_company" type="text" class="form-control" name="pumb_company" value="{{ old('pumb_company') }}" required autofocus>
                               @if ($errors->has('pumb_company'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pumb_company') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                         <div class="form-group{{ $errors->has('pumb_address') ? ' has-error' : '' }}">
                            <label for="pumb_address" class="col-md-4 control-label">Pumb Address</label>
                            <div class="col-md-6">
                                <input id="pumb_address" type="textarea" class="form-control" name="pumb_address" value="{{ old('pumb_address') }}" required autofocus>
                               @if ($errors->has('pumb_address'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pumb_address') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                         <div class="form-group{{ $errors->has('pumb_open_time') ? ' has-error' : '' }}">
                            <label for="pumb_open_time" class="col-md-4 control-label">Pumb Opening</label>
                            <div class="col-md-6">
                                <input id="pumb_open_time" type="time" class="form-control" name="pumb_open_time" value="{{ old('pumb_open_time') }}" required autofocus>
                               @if ($errors->has('pumb_open_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pumb_open_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>

                        <div class="form-group{{ $errors->has('pumb_close_time') ? ' has-error' : '' }}">
                            <label for="pumb_close_time" class="col-md-4 control-label">Pumb Closing</label>
                            <div class="col-md-6">
                                <input id="pumb_close_time" type="time" class="form-control" name="pumb_close_time" value="{{ old('pumb_close_time') }}" required autofocus>
                               @if ($errors->has('pumb_close_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pumb_close_time') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>


                        
                        
                    
                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="city_id" class="col-md-4 control-label">City Name</label>

                        <div class="col-md-6">      
                        <select id="city_id"  class="form-control" name="city_id" value="{{ old('city_id') }}" required autofocus>
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
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Pumb
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
