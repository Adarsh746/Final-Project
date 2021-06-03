
@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="row">
                            <div class="col-md-6">
                                <div class="portlet grey form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa fa-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Labourer</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="mt-clipboard-container">
                                        <div>
                                            <h4 class="profile-desc-title " style="color:navy">PERSONAL INFO </h4>

                                             <img src="/franchise/images/{{Auth::user()->image}}" style="max-height:100px; max-width:100px"><br>
                                            <label class="control-label bold" style="color:red">Labourer id :&nbsp;</label>
                                            {{Auth::user()->franchise_id}}<br>
                                            <label class="control-label bold" style="color:red"> Name :&nbsp;</label>
                                            {{ Auth::user()->franchise_name }}<br>

                                            <label class="control-label bold" style="color:red">Aadhaar Id :&nbsp;</label>
                                            {{Auth::user()->aadhar_number}}<br>
                                            <label class="control-label bold" style="color:red">DOB :&nbsp;</label>
                                            {{Auth::user()->DOB}}<br>

                                            <label class="control-label bold" style="color:red">Contact1 :&nbsp;</label>
                                            {{Auth::user()->contact}}<br>
                                            <label class="control-label bold" style="color:red">Contact2 :&nbsp;</label>
                                            {{Auth::user()->contact1}}<br>

                                            <label class="control-label bold" style="color:red">Blood Group :&nbsp;</label>
                                            {{Auth::user()->blood_group}}<br>

                                            <label class="control-label bold" style="color:red">Permanent Address :&nbsp;</label>
                                            {{Auth::user()->prem_address}}<br>

                                            <label class="control-label bold" style="color:red">Current Address :&nbsp;</label>
                                            {{Auth::user()->curr_address}}<br>

                                            <label class="control-label bold" style="color:red">Email :&nbsp;</label>
                                            {{Auth::user()->email}}<br>

                                          
<br>


                                            
                                    </div>

                                </div>

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