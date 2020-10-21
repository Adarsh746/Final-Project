@extends('user.layouts.profile')

@section('content')
<div class="col-md-12">
       <!-- BEGIN PROFILE SIDEBAR -->
       <div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->
                                        <div class="profile-userpic">
                                            <img src="/user/images/{{$user->image}}" class="img-responsive" alt="" style="max-height:200px;max-width:200px;"> </div>
                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> {{$user->user_name}} </div>
                                            <div class="profile-usertitle-job">User</div>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                        <!-- SIDEBAR BUTTONS -->
                                        <div class="profile-userbuttons">
                                            <br><br>
                                            <!-- <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                            <button type="button" class="btn btn-circle red btn-sm">Message</button> -->
                                        </div>
                                        <!-- END SIDEBAR BUTTONS -->
                                        <!-- SIDEBAR MENU -->
                                       
                                        <!-- END MENU -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light ">
                                        <!-- STAT -->
                                        <div class="row list-separated profile-stat">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                 </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="uppercase profile-stat-title"></div>
                                                <div class="uppercase profile-stat-text"> </div>
                                            </div>

                                        </div>
                                        <!-- END STAT -->
                                        <div>
                                            <h4 class="profile-desc-title">Personal Info</h4>
                                            <label class="control-label bold">User id :&nbsp;</label>
                                            {{$user->user_id}}<br>
                                            <label class="control-label bold">User name :&nbsp;</label>
                                            {{ $user->user_name }}<br>
                                            <label class="control-label bold">Contact :&nbsp;</label>
                                            {{$user->contact}}<br>
                                            <label class="control-label bold">Date Of Birth :&nbsp;</label>
                                            {{$user->dob}}<br>
                                            <label class="control-label bold">Nation :&nbsp;</label>
                                            {{$user->nation_name }}<br>
                                            <label class="control-label bold">State :&nbsp;</label>
                                            {{$user->state_name}}<br>
                                            <label class="control-label bold">District :&nbsp;</label>
                                            {{$user->district_name}}<br>
                                            <label class="control-label bold">Image :&nbsp;</label>
                                            <img src="/user/images/{{$user->image}}" style="max-height:100px;max-width:100px"><br>
                                        </div>
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_1" data-toggle="tab">Edit Info</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <form role="form" method="post" action="{{route('user.user.update',$user->user_id)}}" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                 <input name="_method" type="hidden" value="PUT">
                                                                <div class="form-group">
                                                                 
                                                                    <input type="hidden"   value="{{$user->user_id}}" class="form-control"  /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label"> Name</label>
                                                                    <input type="text" value="{{ $user->user_name }}" class="form-control" name='name'/> </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label"> Email</label>
                                                                    <input type="text" value="{{ $user->email }}" class="form-control" name='email'/> </div>
                                                              
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile Number</label>
                                                                    <input type="text"  value="{{$user->contact}}"class="form-control"name='contact' /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Date Of Birth</label>
                                                                    <input type="date"  value="{{$user->dob}}" class="form-control" name='dob'/> </div>
                                                                 <div class="form-group">
                                                                    <label class="control-label">Nation</label>
                                                                   <select  class="form-control placeholder-no-fix" onclick="getStates(this.value);" id="nation_id" name="nation_id" aria-placeholder="Select nation">
                                                                   <option value="{{ $user->nation_id }}"  > {{$user->nation_name}}</option>
                                                                        @foreach($nation as $value)
                                                                             <option value="{{ $value->nation_id }}" > {{ $value->nation_name }}</option>
                                                                         @endforeach
                                                                       
                                                                  
                                                                    </select>
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                    <select  class="form-control placeholder-no-fix" onclick="getDistrict(this.value);" id="state_id" name="state"> 
                                                                  
                                                                    <option value="{{ $user->state_id }}" > {{$user->state_name}}</option>
                                                             </select>
                                                            </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">District</label>
                                                                    <select class="form-control " id="district" name="district_id">
                                                                        <option  value="{{ $user->district_id }}">{{$user->district_name}}</option>
                                                                   
                                                                    </select>
                                                                </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label"> Image : </label> <img src="/user/images/{{$user->image}}" style="max-height:100px;max-width:100px"><br>
                                                                    <input type="file" value="{{ $user->image }}" class="form-control" name='image'/> </div>
                                                              
                                                                <div class="margiv-top-10">
                                                                <button type="submit"  class="btn primary green" tabindex="3" >Save Changes</button>	
                                                                    <button type="button" id="cancel" class="btn primary" tabindex="3">Cancel</button>	
                                                                </div>
                                                            </form>
                                                        </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>

                            <script >
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
                                    $("#state_id option").remove();
                                    $("#state_id").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.state_id +'|'+ item.state_name);
                    // });

                                    }

                                    });

                                }
   

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

                    //     alert(item.district_id +'|'+ item.district_name);
                    // });
                                    }

                                    });

                                }
                                function getSubject(cid)
                                {
                                    $.ajax({
             
                                    type:"GET",
                                    success: function(data){
                                    var options = '<option value="">Choose Subject</option>';
                                    $.each(data, function(i, item) {
                                        options += "<option value='"+item.subject_id +"'>"+item.subject_name+"</option>";
                                    });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                                    $("#subject option").remove();
                                    $("#subject").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.state_id +'|'+ item.state_name);
                    // });

                                    }

                                    });

                                }
   

                                function getSubcat(sid)
                                {  
                                    $.ajax({
                                    type:"GET",
                                    success: function(data){
                                    var options = '<option value="">Choose Sub Category</option>';
                                    $.each(data, function(i, item) {
                                        options += "<option value='"+item.sub_cat_id +"'>"+item.sub_cat_name+"</option>";
                                    });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                                    $("#sub_cat option").remove();
                                    $("#sub_cat").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.district_id +'|'+ item.district_name);
                    // });
                                    }

                                    });

                                }



   
                               
                            </script>

                            @endsection

                      