@extends('admin.layouts.admin.struct')

@section('content')

<div class="row">
                            <div class="col-md-12">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title" style="background-color:#364150">
                                        <div class="caption">
                                            <i class="fa fa-industry font-green"></i>
                                            <span class="caption-subject font-green bold uppercase"> {{ $job->employeer_name or '' }}</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="mt-clipboard-container">
                                        <div>
                                            <h4 class="profile-desc-title " style="color:black">  {{ $job->job_name or ''}}</h4>
                                          <br>
                                            {{ $job->job_discription or ''}}<br>
                                            
                                            <label class="control-label bold" style="color:red">Location :&nbsp;</label>
                                            {{ $job->nation_name or '' }},
                                            {{ $job->state_name or '' }},
                                            {{ $job->district_name or ''}}.<br>
                                            <label class="control-label bold" style="color:red">Salary :&nbsp;</label>
                                            {{ $job->salary or '' }}.<br>
                                            <label class="control-label bold" style="color:red">Qualification :&nbsp;</label>
                                            {{ $job->qualification_name or '' }} in
                                            {{ $job->subject_name or ''}}.<br>
                                            <label class="control-label bold" style="color:red">Experience Required :&nbsp;</label>
                                            {{ $job->experience or ''}}.<br>
                                      
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


