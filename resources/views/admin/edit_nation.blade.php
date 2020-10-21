@extends('admin.layouts.admin.struct')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading "style="background:#36c6d3;color:white">Edit Nation</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.nation.change', $nation->nation_id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nation_name') ? ' has-error' : '' }}">
                            <label for="nation_name" class="col-md-4 control-label">Nation</label>

                            <div class="col-md-6">
                                <input id="nation_name" type="text" class="form-control" name="nation_name" value="{{ $nation->nation_name }}" required autofocus>

                                @if ($errors->has('nation_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nation_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
