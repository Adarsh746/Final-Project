@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add District</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.district.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('district_name') ? ' has-error' : '' }}">
                            <label for="distric_name" class="col-md-4 control-label">District Name</label>
                            <div class="col-md-6">
                                <input id="district_name" type="text" class="form-control" name="district_name" value="{{ old('district_name') }}" required autofocus>
                               @if ($errors->has('district_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('district_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                        
                    
                    
                        </div>
                        
                    
                        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="state_id" class="col-md-4 control-label">State</label>

                        <div class="col-md-6">      
                        <select id="state_id"  class="form-control" name="state_id" value="{{ old('state_name') }}" required autofocus>
                        @foreach ($state as $sta)
                               <option value="{{$sta->state_id}}">{{$sta->state_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New District
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
