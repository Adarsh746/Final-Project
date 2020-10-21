@extends('admin.layouts.admin.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Status</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
            <div class="table-scrollable"> 
                <table class="table  table-striped table-hover display nowrap table-bordered dataTable no-footer" id="example" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label=" Username : activate to sort column descending"> Month</th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">No of job views </th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> No of applications</th>
                            <!-- <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> No of jobs</th> -->
                            <!-- <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> No of employeers</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> No of users</th> -->

                            <!-- <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" Edit : activate to sort column ascending"> Edit </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> Delete </th> -->
                        </tr>
                        </thead>
                        <tbody> 
                            
                        @foreach($view_month as  $value )
                      
                            <tr role="row" class="odd">
                            <td class="sorting_1"> {{ $value->month.'-'.$value->year}}</td>
                                <td > {{ $value->uacount }}</td>
                                <td> @foreach($application as $key=> $app )
                                    
                                @php 

                               
                                     if ($app->month == $value->month && $app->year == $value->year) {
                                         echo $app->uacount;
                                     } else {
                                         echo 0;
                                     }
                                   
                                    @endphp
                            
                            @endforeach
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
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

    <style>

        .searchclearbtn {
            position: absolute;
            right: 5px;
            top: 0;
            bottom: 0;
            height: 20px;
            margin: auto;
            font-size: 20px;
            cursor: pointer;
            color: #F8BECA;

        }

        #date_from:invalid ~ .searchclearbtn{
            visibility: hidden;
        }

    </style>
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


        <script src=" https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
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
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function(){

        @if(session()->has('status'))

            toastr.options = {
            "closeButton": true,
            "timeOut": "400",
            "positionClass": "toast-top-center"
        }
        // toastr.success('{{ session()->get('status.data') }}');
        toastr.{{ session()->get('status.status') }}('{{ session()->get('status.data') }}');

        @endif

        $(".date-picker").datepicker({
            autoclose: !0,
            isRTL: App.isRTL(),
            format: "yyyy-mm-dd",
            useCurrent: true,
            fontAwesome: !0,
            pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left"
        });

        $(".year-picker").datepicker( {
            format: "yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years",
            autoclose: !0,
            useCurrent: true,
        });

        $(".month-picker").datepicker( {
            format: "M", // Notice the Extra space at the beginning
            viewMode: "months",
            minViewMode: "months",
            autoclose: !0,
            useCurrent: true,
        });
        
        /*$(".form-control").keyup(function(){
            $(".searchclearbtn").toggle(Boolean($(this).val()));
        });

        $(".searchclearbtn").toggle(Boolean($(".form-control").val()));


        $(".searchclearbtn").click(function(event) {

            event.stopPropagation();

            $(this).prev('input').val('').focus();
            $(this).hide();

        });*/

    });


    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
        @endpush





