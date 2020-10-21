
@extends('franchise.layouts.profile')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Jobs</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                      @if( Auth::user()->aproval_status == 1 )
                            <a type="button" href="{{URL::route('employeer.job.create')}}" class="btn green" >Add New</a>

                            @else
                            <p class="small" style="color:red">You Can Add Jobs After Account Approval<br>Currently Under Process<p>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label=" Username : activate to sort column ascending">Job id</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Job Name</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Job Type</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Nation</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > State</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > District</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Qualification</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Subject</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Category</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Sub Category</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Experience</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Expected Salary</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Status</th>

                            
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" Edit : activate to sort column ascending"> Edit </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> Delete </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> View More </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->job_id }}</td>
                                <td>{{ $value->job_name }} </td>
                                <td>@if( $value->job_type==1)
                                    Full Time
                                    @else
                                   Part Time
                                    @endif </td>
                              
                                <td>{{ $value->nation_name }} </td>
                                <td>{{ $value->state_name }} </td>
                                <td>{{ $value->district_name }} </td>
                                <td>{{ $value->qualification_name }} </td>
                                <td>{{ $value->subject_name }} </td>
                                <td>{{ $value->cat_name }} </td>
                                <td>{{ $value->sub_cat_name }} </td>
                                <td>{{ $value->experience }} </td>
                                <td>{{ $value->salary }} </td>
                                <td>@if( $value->verification_status==0)
                                    Waiting For Aproval
                                @elseif($value->verification_status ==1)
                                    Aproved 
                                    @else
                                    Declined
                                    @endif
                            </td>
                            @if( Auth::user()->employeer_name == $value->employeer_name )
                                <td class="text-center">
                                <a  href="{{URL::route('employeer.job.show',$value->job_id )}}" class="btn btn-outline btn-circle btn-sm purple">
                                                                <i class="fa fa-edit"></i> Edit </a>
                                
                                </td>
                                <td class="text-center">

                                <form method="POST" action="{{route('employeer.job.destroy',$value->job_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle red btn-sm blue delConfirm">
                                    <i class="fa fa-trash-o"></i> Delete</a>
                                    </button>
                                </form>
                               
                                                               
                                                               
                                </td>
                                @else  
                                <td class="text-center">
                                <i class="fa fa-times"></i> Not Allowed </a>
                                </td>
                                <td class="text-center">
                                <i class="fa fa-times"></i> Not Allowed</a>
                                </td>
                            
                                @endif
                                <td class="text-center">
                                    <a  href="{{URL::route('employeer.job.edit',$value->job_id )}}">
                                        <button type="submit"  class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
                                    <i class="fa fa-eye">

                                    </i> view
                                    </button>
                                </a>    
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('data-tab-head')
    <link href="{{asset('/assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('data-tab-foot')
    <script src="{{asset('/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/pages/scripts/table-datatables-editable.min.js')}}" type="text/javascript"></script>
@endpush

@push('confirmdel')
    <script>
        function dlt(dle) {
            if(confirm('are you sure')) {
                $form = $('<form  method="post" action="' + dle + '"></form>');
                $form.append('{{ method_field('DELETE')}}');
                $form.append('{{ csrf_field() }}');
                $('body').append($form);
                $form.submit();
            }
        }
        </script>


    <script>
        $(document).ready(function() {
            @if (session()->has('success'))
            toastr.success('{{session()->get('success')}}');
            @endif
        });
    </script>
        @endpush