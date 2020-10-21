
@extends('user.layouts.profile')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Applications</span>
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
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label=" Username : activate to sort column ascending">Application id</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" > Job Name</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> Appllied Date </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> Current Status </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" apply : activate to sort column ascending"> Delete Application </th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($app as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->app_id }}</td>
                                <td>{{ $value->job_name }} </td>
                                
                                <td>{{ $value->created_at }} </td>
                         
                                        @if($value->app_status == 0)
                                            <td class="text-center"><a class="btn btn-outline btn-circle green btn-sm blue">Applied</a></td>
                                        @elseif($value->app_status == 1)
                                        <td class="text-center">
                                          <a class="btn btn-outline btn-circle green btn-sm blue "
                                         href="" onclick="popup('{{$value->app_id}}')" data-target="" data-toggle="modal"> Interview Sheduled </a>
                                           </td>
                                            @elseif($value->app_status == 3)
                                            <td class="text-center"><a class="btn btn-outline btn-circle green btn-sm blue">Short Listed0</a></td>
                                        @else
                                            <td class="text-center"><a class="btn btn-outline btn-circle green btn-sm blue">Rejected</a></td>
                                        @endif
                                 
                                <td class="text-center">

                                <form action="{{route('user.app.destroy',$value->app_id)}}" method="post" >
                                    {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle red btn-sm blue delConfirm">
                                <i class="fa fa-trash-o"></i> Delete
                                </button>
                                </form>
                      
                                </td>
                             
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade ajax" id="ajax" role="basic" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content"><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Interview Details</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <h4>Interview Date :</h4><span id="date" name="date"></span>

            <h4>Interview Location :</h4><span id="location" name="location"></span>
           <h5 style="color:red" >Revert the email if you are intrested</h5>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
   
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




   


