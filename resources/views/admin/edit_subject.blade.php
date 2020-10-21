@extends('admin.layouts.admin.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Add Subject</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.subject.change',$subject->subject_id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
                            <label for="subject_name" class="col-md-4 control-label">Subject</label>
                            <div class="col-md-6">
                                <input id="subject_name" type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}" required autofocus>
                                @if ($errors->has('subject_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject_name') }}</strong>


                                </span>
                                @endif



                            </div>



                        </div>


                        <div class="form-group{{ $errors->has('quali_id') ? ' has-error' : '' }}">


                            <label for="quali_id" class="col-md-4 control-label">Qualification</label>

                            <div class="col-md-6">
                                <select id="quali_id" class="form-control" name="quali_id" value="{{ $subject->subject_id }}" required autofocus>
                                    @foreach ($qualification as $quali)
                                    <option value="{{$quali->quali_id}}">{{$quali->qualification_name}}</option>
                                    @endforeach
                                </select>


                                @if ($errors->has('quali_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quali_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
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