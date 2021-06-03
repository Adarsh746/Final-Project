
@extends('user.layouts.franchise.struct')

@section('content')
<div class="row">
                            <div class="col-md-6">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa fa-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Citizen</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="mt-clipboard-container">
                                        <div>
                                            <h4 class="profile-desc-title " style="color:black">Personal Info</h4>

                                            <img src="/user/images/{{Auth::user()->image}}" style="max-height:100px; max-width:100px"><br>

                                            <label class="control-label bold" style="color:red">Citizen id :&nbsp;</label>
                                            {{Auth::user()->user_id}}<br>
                                            <label class="control-label bold" style="color:red"> Name :&nbsp;</label>
                                            {{ Auth::user()->user_name }}<br>
                                            <label class="control-label bold" style="color:red">Contact :&nbsp;</label>
                                            {{Auth::user()->contact}}<br>
                                           
                                            <label class="control-label bold" style="color:red">DOB :&nbsp;</label>
                                            {{Auth::user()->dob}}<br>


                                            <label class="control-label bold" style="color:red">Email :&nbsp;</label>
                                            {{Auth::user()->email}}<br>

                                            <!-- <a type="button" href="{{URL::route('user.home.edit')}}" class="btn btn-success uppercase pull-right" align="center">Edit Profile</a> -->


                                            
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                           <!-- <div class="col-md-6">
                                <div class="portlet light form-fit bordered">
                                   
                                   
                                </div>
                            </div>-->
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