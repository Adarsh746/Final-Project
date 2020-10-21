
@extends('user.layouts.profile')

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
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" >  Salary Per Year</th>

                            @guest
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> Apply </th>
                            @else
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> Apply </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> View More </th>
                            @endguest
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
                                <!-- <td>{{ $value->job_discription }} </td> -->
                                <td>{{ $value->nation_name }} </td>
                                <td>{{ $value->state_name }} </td>
                                <td>{{ $value->district_name }} </td>
                                <td>{{ $value->qualification_name }} </td>
                                <td>{{ $value->subject_name }} </td>
                                <td>{{ $value->cat_name }} </td>
                                <td>{{ $value->sub_cat_name }} </td>
                                <td>{{ $value->experience }} </td>
                                <td>{{ $value->salary }} </td>
                         
                            
                                @guest
                                <td class="text-center"><a class="btn btn-outline btn-circle green btn-sm blue" href="{{ route('user.login') }}">Login</a></td>
                                @else
                                @php
                                $a = 0
                                @endphp
                                @foreach($appl as $app)
                                
                                    @if($app->job_id == $value->job_id)
                                    @php
                                    $a = 1
                                    @endphp

                                        @if($app->app_status == 0)
                                            <td class="text-center"><a href="{{URL::route('user.app.index')}}"class="btn btn-outline btn-circle green btn-sm blue">Applied</a></td>
                                        @elseif($app->app_status == 1)
                                            <td class="text-center"><a href="{{URL::route('user.app.index')}}" class="btn btn-outline btn-circle green btn-sm blue">Interview Sheduled</a></td>
                                        @elseif($app->app_status == 2)
                                            <td class="text-center"><a href="{{URL::route('user.app.index')}}" class="btn btn-outline btn-circle green btn-sm blue"></a>Rejected</td>
                                    @elseif($app->app_status == 3)
                                            <td class="text-center"><a href="{{URL::route('user.app.index')}}" class="btn btn-outline btn-circle green btn-sm blue">Short Listed</a></td>
                                       @endif
                                       @endif 
                                     
                               @endforeach
                               @if($a != 1 ) 

<td class="text-center">
                <a  onclick="sendMsg({{ $value->job_id}})"><button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                <i class="fa fa-plus"></i> Apply
                </button></a>
               </td>
              @endif
                             
                                <td class="text-center">
                                <a  href="{{URL::route('user.job.edit',$value->job_id )}}"><button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
                                <i class="fa fa-eye"></i> view
                                </button></a>
                                </td>
                                @endguest
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



<script>



function sendMsg(jobid)
        {
           
            var route ='{{route('user.app.show',"")}}/'+jobid;

            $.ajax({
                url:route,
                
                

                success: function(data) {
                    alert(data)
                }



            });

        }

       

</script>


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
     
        $(document).ready(function() {
            @if (session()->has('success'))
            toastr.success('{{session()->get('success')}}');
            @endif
        });


    </script>

 @endpush


