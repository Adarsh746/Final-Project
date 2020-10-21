@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Post Office</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.post.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('post_name') ? ' has-error' : '' }}">
                            <label for="post_name" class="col-md-4 control-label">Post Office Name</label>
                            <div class="col-md-6">
                                <input id="post_name" type="text" class="form-control" name="post_name" value="{{ old('post_name') }}" required autofocus>
                               @if ($errors->has('post_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('post_name') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                            <label for="pincode" class="col-md-4 control-label">Pin Code</label>
                            <div class="col-md-6">
                                <input id="pincode" type="number" class="form-control" name="pincode" value="{{ old('pincode') }}" required autofocus>
                               @if ($errors->has('pincode'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('pincode') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        
                    
                        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="state_id" class="col-md-4 control-label">District</label>

                        <div class="col-md-6">      
                        <select id="district_id"  class="form-control" name="district_id" value="{{ old('district_name') }}" required autofocus>
                        @foreach ($district as $dst)
                               <option value="{{$dst->district_id}}">{{$dst->district_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('district_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Post Office
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
