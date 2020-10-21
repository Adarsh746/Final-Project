@extends('user.layouts.profile')

@section('content')
<div class="col-md-12">
<div class="portlet-body">
 <div class="tab-content ">
                                                        <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Job Preference</span>
                                                    </div>
                                                   

                                                  <div class="tab-pane active" id="tab_1_1">
                                                            <form role="form" method="POST" action="{{Route('user.pref.store')}}">
                                                                <div class="form-group">
                                                                {{ csrf_field() }}
                                                                    <input type="text" value="{{Auth::user()->user_id}}" class="form-control hidden" name="user_id" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Job Name</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="job_name" name="job_name" aria-placeholder="Select nation">
                                                                    <option  value="{{$pref->job_id or ''}}" > {{$pref->job_name or ''}}</option>
                                                                        @foreach($job as $value)
                                                                             <option value="{{ $value->job_id }}" > {{ $value->job_name }}</option>
                                                                         @endforeach
                                                                    </select> 
                                                                    @if ($errors->has('job_name'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('job_name')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label">Qualification</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getSubject(this.value);" id="quali" name="quali" aria-placeholder="Select nation">
                                                                   <option value="{{$pref->quali_id or ''}}" > {{$pref->qualification_name or ''}}</option>                                                                        @foreach($quali as $value)
                                                                             <option value="{{ $value->quali_id }}" > {{ $value->qualification_name }}</option>
                                                                         @endforeach
                                                                    </select>
                                                                    @if ($errors->has('quali'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('quali')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Subject</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="subject" name="subject"> 
                                                                    <option value="{{$pref->subject_id or ''}}" > {{$pref->subject_name or ''}}</option>    
                                                                     </select>
                                                                     @if ($errors->has('subject'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('subject')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                    </div>

                                                                     <div class="form-group">
                                                                    <label class="control-label">Category</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getSubcat(this.value);" id="cat" name="cat" aria-placeholder="Select nation">
                                                                   <option value="{{$pref->cat_id or ''}}" > {{$pref->cat_name or ''}}</option>    
                                                                        @foreach($cat as $value)
                                                                             <option value="{{ $value->cat_id }}" > {{ $value->cat_name }}</option>
                                                                         @endforeach
                                                                    </select>
                                                                    @if ($errors->has('cat_name'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('cat_name')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Subcategory</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="sub_cat" name="sub_cat"> 
                                                                    <option value="{{$pref->sub_cat_id or ''}}" > {{$pref->sub_cat_name or ''}}</option>    
                                                                     </select>
                                                                     @if ($errors->has('sub_cat'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('sub_cat')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label class="control-label">Experience</label>
                                                                    <input type="number" placeholder="In year Only" value="{{$pref->experience or ''}}"class="form-control " name="experience" /> 
                                                                    @if ($errors->has('experience'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('experience')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                
                                                                </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label">Job Type</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="job_type" name="job_type"> 
                                                                        
                                                                  <option value=1>Full Time</option>
                                                                  <option value=2>Part Time</option>
                                                        
                                                             </select>
                                                             @if ($errors->has('job_type'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('job_type')}}</strong>
                                                                         </span>
                                                                     @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Expeted Salary</label>
                                                                    <input type="text" placeholder="CTC" class="form-control " value="{{$pref->exp_salary or ''}}" name="exp_salary" /> 
                                                                    @if ($errors->has('exp_salary'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('exp_salary')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                    
                                                                
                                                                 <div class="form-group">
                                                                    <label class="control-label">Nation</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getStates(this.value);" id="nation" name="nation" aria-placeholder="Select nation">
                                                                   <option value="{{$pref->nation_id or ''}}" > {{$pref->nation_name or ''}}</option>
                                                                        @foreach($nation as $value)
                                                                             <option value="{{ $value->nation_id }}" > {{ $value->nation_name }}</option>
                                                                         @endforeach
                                                                       
                                                                  
                                                                    </select>
                                                                    @if ($errors->has('nation'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('nation')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                    <select  class="form-control placeholder-no-fix" onchange="getDistrict(this.value);" id="state" name="state"> 
                                                                    <option value="{{$pref->state_id or ''}}" > {{$pref->state_name or ''}}</option>
                                                        
                                                             </select>
                                                             @if ($errors->has('state'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('state')}}</strong>
                                                                         </span>
                                                                     @endif
                                                            </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">District</label>
                                                                    <select class="form-control " id="district" name="district">
                                                                      
                                                                    <option value="{{$pref->district_id or ''}}" > {{$pref->district_name or ''}}</option>
                                                                    </select>
                                                                    @if ($errors->has('district'))
                                                                        <span class="help-block">
                                                                        <strong>{{$errors->first('district')}}</strong>
                                                                         </span>
                                                                     @endif
                                                                </div>
                                                              @if($pref !='')
                                                              <div class="margiv-top-10">
                                                                 
                                                                    <button type="submit"  class="btn green" tabindex="3" name='action' value='update'>Update</button>	
                                                                </div>
                                                               
                                                              @else
                                                                <div class="margiv-top-10">
                                                                 
                                                                    <button type="submit"  class="btn green" tabindex="3" name='action' value='store'>Save</button>	
                                                                </div>
                                                                
                                                                @endif
                                                            </form>
                                                        </div>
                                                         </div>
                                                </div>
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
                                    $("#state option").remove();
                                    $("#state").append(options);



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
                                        url:"{{route('user.showsub','')}}/"+cid,
                                    
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
                                        url:"{{route('user.showsubcat','')}}/"+sid,
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



   
                                $("#cancel").click(function ()
                                 {
                                    $('#tab_1_1')[0].reset();
   
                                });
                            </script>







</div>






@endsection