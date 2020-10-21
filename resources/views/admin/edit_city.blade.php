@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Edit City</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.city.change',$city->place_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('post_name') ? ' has-error' : '' }}">
                            <label for="city_name" class="col-md-4 control-label">City Name</label>
                            <div class="col-md-6">
                                <input id="city_name" type="text" class="form-control" name="city_name" value="{{ $city->place_name }}" required autofocus>
                               @if ($errors->has('city_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('city_name') }}</strong>    
                            </span>
                                @endif                        
                            </div>                    
                        </div>
                        
                        
                    
                        <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="post_id" class="col-md-4 control-label">District</label>

                        <div class="col-md-6">      
                        <select id="post_id"  class="form-control" name="post_id" value="{{ $city->post_office_id}}" required autofocus>
                        @foreach ($post as $dst)
                               <option value="{{$dst->post_office_id}}">{{$dst->post_office_name}} {{$dst->pincode}}</option>
                               @endforeach
                        </select>

                                @if ($errors->has('post_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Update 
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
