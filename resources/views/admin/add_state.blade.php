@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add State</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.state.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('state_name') ? ' has-error' : '' }}">
                            <label for="state_name" class="col-md-4 control-label">State Name</label>
                            <div class="col-md-6">
                                <input id="state_name" type="text" class="form-control" name="state_name" value="{{ old('state_name') }}" required autofocus>
                               @if ($errors->has('state_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('state_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                        
                    
                    
                        </div>
                        
                    
                        <div class="form-group{{ $errors->has('nation_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="nation_id" class="col-md-4 control-label">Nation</label>

                        <div class="col-md-6">      
                        <select id="nation_id"  class="form-control" name="nation_id" value="{{ old('nation_id') }}" required autofocus>
                        @foreach ($nation as $nat)
                               <option value="{{$nat->nation_id}}">{{$nat->nation_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('nation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New State
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
