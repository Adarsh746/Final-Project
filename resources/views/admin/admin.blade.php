@extends('admin.layouts.admin.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Status Table</span>
            </div>

        </div>
       
            
                  

                    <div class="col-md-12">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa  fa-account  font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">{{ Auth::user()->admin_name }}</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body form">
                                       
                                        <div class="mt-clipboard-container">
                                        <h4 class="profile-desc-title bold" style="color:black">System Status</h4>
                                        <div>
                                        <div class="portlet light ">
                                        <!-- STAT -->
                                        <div class="row list-separated profile-stat">
                                            
                                            <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                                                <div class="uppercase profile-stat-title bold"> {{ $franchise }} </div>
                                                <div class="uppercase profile-stat-text bold" style="color:red"> No Of Labourers</div>
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- END STAT -->
                                      
                                   
                                        
                                            </div>
                                    </div>
                                        </div>
                                    </div>
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