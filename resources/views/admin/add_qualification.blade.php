@extends('admin.layouts.admin.struct')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background:#36c6d3;color:white">Add Qualification</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.qualification.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('qualification_name') ? ' has-error' : '' }}">
                            <label for="qualification_name" class="col-md-4 control-label">Qualification</label>

                            <div class="col-md-6">
                                <input id="qualification_name" type="text" class="form-control" name="qualification_name" value="{{ old('qualification_name') }}" required autofocus>

                                @if ($errors->has('qualification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qualification_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add New Qualification
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
