@extends('franchise.layouts.profile')

@section('content')

<div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="register-form" enctype="multipart/form-data" action="{{ route('employeer.emp.store')}}" method="post" novalidate="novalidate" style="display: block;">
                <h3 class="font-green">Update</h3>
                {{ csrf_field() }}
                
                <p class="hint"> Enter your details below: </p>
                <div class="form-group form-group{{ $errors->has('employeer_name') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Employer Name</label>
                    <input class="form-control placeholder-no-fix" value="{{Auth::user()->employeer_name}}" type="text" placeholder=" Employer Name" name="employeer_name">
                    @if ($errors->has('employeer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employeer_name') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group  form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" value="{{Auth::user()->email}}" type="email" placeholder="Email" name="email">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Contact</label>
                    <input class="form-control placeholder-no-fix" type="text"value="{{Auth::user()->contact}}" placeholder="contact" name="contact"> 
                    @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('contact')}}</strong>
                                    </span>
                                @endif
                </div>
                    <div class="form-group form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9 ">About</label>
                    <input class="form-control placeholder-no-fix" type="Textarea" value="{{Auth::user()->about}}" name="about" placeholder="About"> 
                    @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('about')}}</strong>
                                    </span>
                                @endif
                </div>
                    <div class="form-group form-group{{ $errors->has('employeer_cirtificate') ? ' has-error' : '' }}">
                    <label class="control-label ">Employer Certificate : {{Auth::user()->employeer_cirtificate}}</label>
                    <input class="form-control placeholder-no-fix" type="file" name="cirtificate"> 
                    @if ($errors->has('employeer_cirtificate'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('employeer_cirtificate')}}</strong>
                                    </span>
                                @endif
                </div>

                    <div class="form-group form-group{{ $errors->has('nation') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Nation</label>
                    <select  class="form-control placeholder-no-fix" onclick="getStates(this.value);" id="nation" name="nation" aria-placeholder="Select nation">
                    <option value="{{Auth::user()->nation_id}}"  > Select Nation</option>
                    @foreach($nat as $value)
                          <option value="{{Auth::user()->nation_id}}" > {{ $emp->nation_name }}</option>
                        @endforeach
                        
                    </select>
                    @if ($errors->has('nation'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('nation')}}</strong>
                                    </span>
                                @endif
                </div>

                <div class="form-group form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">State</label>
                    <select  class="form-control placeholder-no-fix" onclick="getDistrict(this.value);" id="state" name="state">
                    
                          <option value="{{Auth::user()->state_id}}"> {{$emp->state_name}}</option>
                       
                        
                    </select>
                    @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('state')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">District</label>
                    <select  class="form-control placeholder-no-fix"  id="district" name="district">
                    
                          <option value="{{Auth::user()->district_id}}" > {{$emp->district_name}}</option>
                       
                        
                    </select>
                    @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('district')}}</strong>
                                    </span>
                                @endif
                </div>
                <!-- <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"> </div> -->
                   
                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn green btn-outline pull-right" >Back</button>
                    <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-left">Save Changes</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            
        </div>
        <script>
             function getStates(cid)
    {


            $.ajax({
                url:"{{route('user.show','')}}/"+cid,
                type:"GET",
                success: function(data){

                   

                    var options = '<option value="">Choose State</option>';

                        $.each(data, function(i, item) {
                            options += "<option value='"+item.state_id +"'>"+item.state_name+"</option>";
                        });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                    $("#state option").remove();
                    $("#state").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.state_id +'|'+ item.state_name);

                }

            });

    }
    </script>
    <script>

    function getDistrict(sid)
    {   
            $.ajax({
                url:"{{route('user.showdis','')}}/"+sid,
                type:"GET",
                success: function(data){
                    

                    var options = '<option value="">Choose District</option>';

                        $.each(data, function(i, item) {
                            options += "<option value='"+item.district_id +"'>"+item.district_name+"</option>";
                        });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                    $("#district option").remove();
                    $("#district").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.state_id +'|'+ item.state_name);

                }

            });

    }


        </script>
        @endsection
