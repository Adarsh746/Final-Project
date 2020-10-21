
@extends('franchise.layouts.franchise.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Hospital</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a type="button" href="{{URL::route('franchise.hospital.create')}}" class="btn green" >Add New</a>


                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label=" state_id : activate to sort column descending"> Hospital id</th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> Hodpital Name</th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Hospital Capacity </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  City </th>
                            
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Address </th>
                             <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Description </th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Open Time </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> Close Time </th>

                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Logo </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Banner </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Image </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Website </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Facebook </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Instagram </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Whatsapp </th>
                            
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">  Mobile Number </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending"> Mobile Number </th>



                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 72px;" aria-label=" Edit : activate to sort column ascending"> Edit </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 98px;" aria-label=" Delete : activate to sort column ascending"> Delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hospital as $value)

                            <tr role="row" class="odd">
                                <td class="sorting_1"> {{ $value->hospital_id }}</td>
                               
                                <td class="sorting_1"> {{ $value->hospital_name }}</td>
                                <td class="sorting_1"> {{ $value->hospital_capacity }}</td>
                                <td class="sorting_1"> {{ $value->place_name}}</td>
                                <!-- <td class="sorting_1"> {{ $value->user_name}}</td> -->
                                <td class="sorting_1"> {{ $value->address }}</td>
                                <td class="sorting_1"> {{ $value->description }}</td>
                                <td class="sorting_1"> {{ $value->open_time }}</td>
                                <td class="sorting_1"> {{ $value->close_time }}</td>
                                <td class="sorting_2"> <img class="dt-img" src="/hospital/images/{{ $value->logo}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->banner}}"></td>        
                               <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image1}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image2}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image3}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image4}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image5}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image6}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image7}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image8}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image9}}"></td>
                                <td class="sorting_11"> <img class="dt-img" src="/hospital/images/{{ $value->image10}}"></td>
                               

                                <td class="sorting_1"> {{ $value->website }}</td>
                                <td class="sorting_1"> {{ $value->facebook }}</td>
                                <td class="sorting_1"> {{ $value->instagram }}</td>
                                <td class="sorting_1"> {{ $value->whatsapp }}</td>
                                
                                <td class="sorting_1"> {{ $value->mobile_number }}</td>
                                <td class="sorting_1"> {{ $value->mobile_number2 }}</td>
                                <td class="text-center">

                                <a  href="{{route('franchise.hospital.edit',$value->hospital_id)}}">
                                        <button type="submit"  class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
                                    <i class="fa fa-edit">

                                    </i> Edit
                                    </button>
                                </a>    
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{route('franchise.hospital.destroy',$value->hospital_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-trash-o"></i> Delete</a>
                                    </button>
                                </form>
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