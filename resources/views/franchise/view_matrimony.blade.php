
@extends('franchise.layouts.franchise.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">Matrimony</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a type="button" href="{{URL::route('franchise.matrimony.create')}}" class="btn green" >Add New</a>


                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="district_id : activate to sort column descending">Reg Id</th>
                                 <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" User Id: activate to sort column ascending">User Id</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Full Name : activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label="Gender: activate to sort column ascending">Gender</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_3" rowspan="1" colspan="1" style="width: 162px;" aria-label="age: activate to sort column ascending">Age</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_4" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Religion : activate to sort column ascending">Religion</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_5" rowspan="1" colspan="1" style="width: 162px;" aria-label="Caste: activate to sort column ascending">Caste</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_6" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Height : activate to sort column ascending">Height</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_7" rowspan="1" colspan="1" style="width: 162px;" aria-label="Weight: activate to sort column ascending">Weight</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_8" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Education : activate to sort column ascending">Education</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_9" rowspan="1" colspan="1" style="width: 162px;" aria-label="Job : activate to sort column ascending">Job</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_10" rowspan="1" colspan="1" style="width: 162px;" aria-label=" City : activate to sort column ascending">City</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_11" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Address : activate to sort column ascending">Address</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_12" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Mobile : activate to sort column ascending">Mobile</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_13" rowspan="1" colspan="1" style="width: 162px;" aria-label="Mobile 2 : activate to sort column ascending">Mobile2</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_14" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Image : activate to sort column ascending">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_15" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Demands: activate to sort column ascending">Demands</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Color: activate to sort column ascending">Color</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Delete: activate to sort column ascending">Edit</th>
                                 <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Delete: activate to sort column ascending">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($matri as $value)
                      
                        <tr role="row" class="odd">
                            <td class="sorting_1"> {{ $value->mat_reg_id }}</td>
                            <td class="sorting_2"> {{  $value->user_name }}{{ $value->u_id }}</td>
                            <td class="sorting_3"> {{ $value->name}}</td>
                            <td class="sorting_4"> {{ $value->gender}}</td>
                            <td class="sorting_5"> {{ $value->age}}</td>
                            <td class="sorting_6"> {{ $value->religion}}</td>
                            <td class="sorting_7"> {{ $value->caste}}</td>
                            <td class="sorting_8"> {{ $value->height}}</td>
                            <td class="sorting_9"> {{ $value->weight}}</td>
                            <td class="sorting_10"> {{ $value->education}}</td>
                            <td class="sorting_11"> {{ $value->job}}</td>
                            <td class="sorting_12"> {{ $value->place_name}}</td>
                            <td class="sorting_13"> {{ $value->address}}</td>
                            <td class="sorting_14"> {{ $value->mobile_number}}</td>
                            <td class="sorting_15"> {{ $value->mobile_number2}}</td>
                            <td class="sorting_16"> {{ $value->image}}</td>
                            <td class="sorting_17"> {{ $value->demands}}</td>
                            <td class="sorting_18"> {{ $value->color}}</td>
                            <td class="text-center">
                                <a  href="{{route('franchise.matrimony.edit',$value->mat_reg_id)}}">
                                        <button type="submit"  class="btn btn-outline btn-circle purple btn-sm blue delConfirm">
                                    <i class="fas fa-edit">

                                    </i> Edit
                                    </button>
                                </a>    
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{route('franchise.matrimony.destroy',$value->mat_reg_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-trash"></i> Delete</a>
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