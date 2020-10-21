@extends('admin.layouts.admin.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Jobs</span>
            </div>

        </div>
       
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="district_id : activate to sort column descending"> Job id</th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  Name : activate to sort column ascending"> Job Name</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  employer: activate to sort column ascending">Employer</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  quali : activate to sort column ascending"> Qualification</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  subject : activate to sort column ascending"> Subject</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  cat : activate to sort column ascending"> Category</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  subcat : activate to sort column ascending"> Sub Category</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  type : activate to sort column ascending"> Job Type</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  salary : activate to sort column ascending"> Salary</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  exp : activate to sort column ascending"> Experience Required</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  nation : activate to sort column ascending">Nation</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  state : activate to sort column ascending">State</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="  district : activate to sort column ascending">District</th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> Delete </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> View More </th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->job_id }}</td>
                                <td>{{ $value->job_name }} </td>
                                <td>{{ $value->employeer_name }} </td>
                             
                                <td>{{ $value->qualification_name }} </td>
                                <td>{{ $value->subject_name }} </td>
                                <td>{{ $value->cat_name }} </td>
                                <td>{{ $value->sub_cat_name }} </td>
                                <td>{{ $value->job_type }} </td>
                                <td>{{ $value->salary }} </td>
                                <td>{{ $value->experience }} </td>

                                <td>{{ $value->nation_name }} </td>
                                <td>{{ $value->state_name }} </td>
                                <td>{{ $value->district_name }} </td>
                            
                                <td class="text-center">

                                <form method="POST" action="{{route('admin.job.destroy',$value->job_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-trash-o"></i> Delete</a>
                                    </button>
                                </form>
                               
                                                               
                                                               
                                </td>
                                <td class="text-center">
<a  href="{{URL::route('admin.job.edit',$value->job_id )}}"><button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
<i class="fa fa-eye"></i> view
</button></a>


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