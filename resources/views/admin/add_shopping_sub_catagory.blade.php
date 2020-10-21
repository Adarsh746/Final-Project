@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Shopping Subcategory</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.subcat.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('sub_cat_name') ? ' has-error' : '' }}">
                            <label for="sub_cat_name" class="col-md-4 control-label">Shopping Subcategory</label>
                            <div class="col-md-6">
                                <input id="sub_cat_name" type="text" class="form-control" name="sub_cat_name" value="{{ old('sub_cat_name') }}" required autofocus>
                               @if ($errors->has('sub_cat_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('sub_cat_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>
                        
                    
                    
                        </div>
                        
                    
                        <div class="form-group{{ $errors->has('quali_id') ? ' has-error' : '' }}">
                            
                    
                        <label for="quali_id" class="col-md-4 control-label">Category</label>

                        <div class="col-md-6">      
                        <select id="cat_id"  class="form-control" name="cat_id" value="{{ old('cat_id') }}" required autofocus>
                        @foreach ($catagory as $quali)
                               <option value="{{$quali->shopping_cat_id}}">{{$quali->shopping_cat_name}}</option>
                               @endforeach
                        </select>

                             
                                @if ($errors->has('cat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add New Subcategory
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
