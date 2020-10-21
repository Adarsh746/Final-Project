
@extends('admin.layouts.admin.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">ATM</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a type="button" href="{{URL::route('admin.atm.create')}}" class="btn green" >Add New</a>


                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="idid : activate to sort column descending">ATM Id</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" atm_name: activate to sort column ascending">ATM Bank</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" atm_type: activate to sort column ascending">ATM Type</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">City Name</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Address: activate to sort column ascending">ATM Address</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Opening Time: activate to sort column ascending">Opening Time</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Closing Time: activate to sort column ascending">Closing Time</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Delete: activate to sort column ascending">Update</th>
                                 <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Delete: activate to sort column ascending">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($atm as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->atm_id }}</td>
                                <td class="sorting_1"> {{ $value->atm_bank}}</td>
                                <td class="sorting_1"> {{ $value->atm_type}}</td>
                                <td class="sorting_1"> {{ $value->place_name}}</td>
                                <td class="sorting_1"> {{ $value->atm_address}}</td>
                                <td class="sorting_1"> {{ $value->atm_open_time}}</td>
                                <td class="sorting_1"> {{ $value->atm_close_time}}</td>
                                <td class="text-center">
                               <a  href="{{route('admin.atm.edit',$value->atm_id)}}">
                                        <button type="submit"  class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
                                    <i class="fa fa-eye">

                                    </i> Edit
                                    </button>
                                </a>    
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{route('admin.atm.destroy',$value->atm_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-trash-o"></i> Delete</a>
                                    </button>
                                </form>
                            </td>
                                <!-- <td class="text-center">
                                <a href="javascript:;" href="" class="btn btn-outline btn-circle btn-sm purple">
                                                                <i class="fa fa-edit"></i> Edit </a>
                                
                                </td>
                                <td class="text-center">
                                <a href="javascript:;" onclick="#" class="btn btn-outline btn-circle red btn-sm blue delConfirm">
                                                                <i class="fa fa-trash-o"></i> Delete</a>
                                                               
                                </td> -->
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