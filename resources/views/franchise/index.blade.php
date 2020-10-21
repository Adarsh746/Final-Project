
@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="row">
                            <div class="col-md-6">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa fa-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Lawyer</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="mt-clipboard-container">
                                        <div>
                                            <h4 class="profile-desc-title " style="color:black">Personal Info</h4>
                                            <label class="control-label bold" style="color:red">Lawyer id :&nbsp;</label>
                                            {{Auth::user()->franchise_id}}<br>
                                            <label class="control-label bold" style="color:red"> Name :&nbsp;</label>
                                            {{ Auth::user()->franchise_name }}<br>
                                            <label class="control-label bold" style="color:red">Contact :&nbsp;</label>
                                            {{Auth::user()->contact}}<br>
                                            <label class="control-label bold" style="color:red">Nation :&nbsp;</label>
                                            
                                           
                                        <a href="{{URL::route('franchise.emp.show',auth::user()->franchise_id)}}"class="btn btn-primary green circle">Edit</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa  fa-industry  font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">{{ Auth::user()->franchise_name }}</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body form">
                                       
                                        <div class="mt-clipboard-container">
                                        <h4 class="profile-desc-title " style="color:black">Account Activity</h4>
                                        <div>
                                        <div class="portlet light ">
                                        <!-- STAT -->
                                        <div class="row list-separated profile-stat">
                                            
                                            <div class="col-md-3 col-sm-4 col-xs-4">
                                                <div class="uppercase profile-stat-title">  </div>
                                                <div class="uppercase profile-stat-text"> Pending Cases </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-4">
                                                <div class="uppercase profile-stat-title">  </div>
                                                <div class="uppercase profile-stat-text"> Client No </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-4">
                                                <div class="uppercase profile-stat-title">  </div>
                                                <div class="uppercase profile-stat-text"> Assigned Cases </div>
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