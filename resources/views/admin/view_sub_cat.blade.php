
@extends('admin.layouts.admin.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Subcategory</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a type="button" href="{{URL::route('admin.subcat.create')}}" class="btn green" >Add New</a>


                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label=" Username : activate to sort column descending"> sub category id</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> category name</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> sub_category</th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" Edit : activate to sort column ascending"> Edit </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> Delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_cat as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->sub_cat_id }}</td>
                                <td>{{ $value->cat_name }} </td>
                                <td>{{ $value->sub_cat_name }} </td>
                                <td class="text-center">
                                <a href="javascript:;" href="" class="btn btn-outline btn-circle btn-sm purple">
                                                                <i class="fa fa-edit"></i> Edit </a>
                                
                                </td>
                                <td class="text-center">
                                <a href="javascript:;" onclick="#" class="btn btn-outline btn-circle red btn-sm blue delConfirm">
                                                                <i class="fa fa-trash-o"></i> Delete</a>
                                                               
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