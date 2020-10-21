@extends('franchise.layouts.profile')


@section('content')
<div class="col-md-12">
<div class="portlet-body">
                                                    <div class="tab-content ">
                                                        <!-- PERSONAL INFO TAB -->

                                                        <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Job</span>
                                                    </div>
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <form role="form"  method="POST" action="{{Route('employeer.job.store')}}">
                                                                <div class="form-group">
                                                                     {{ csrf_field() }}
                
                                                                    <input type="text" value="{{Auth::user()->employeer_id}}" class="form-control hidden" name="emp_id" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Job Name</label>
                                                                    <input type="text" placeholder="Job" class="form-control " name="job_name" /> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">About Job</label>
                                                                    <input type="textfield" placeholder="About Job" class="form-control " name="about" /> 
                                                                </div>
                                                                
                                                                    <div class="form-group">
                                                                    <label class="control-label">Qualification</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getSubject(this.value);" id="quali" name="quali" aria-placeholder="Select nation">
                                                                  
                                                                        @foreach($quali as $value)
                                                                             <option value="{{ $value->quali_id }}" > {{ $value->qualification_name }}</option>
                                                                         @endforeach
                                                                    </select>
                                                              
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Subject</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="subject" name="subject"> 
                                                                
                                                                     </select>
                                                                     <div class="form-group">
                                                                    <label class="control-label">Category</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getSubcat(this.value);" id="cat" name="cat" aria-placeholder="Select nation">
                                                                  
                                                                        @foreach($cat as $value)
                                                                             <option value="{{ $value->cat_id }}" > {{ $value->cat_name }}</option>
                                                                         @endforeach
                                                                    </select>
                                                              
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Subcategory</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="subcat" name="subcat"> 
                                                                
                                                                     </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label class="control-label">Experience</label>
                                                                    <input type="number" placeholder="In year Only" class="form-control " name="experience" /> </div>
                                                                    <div class="form-group">
                                                                    <label class="control-label">Job Type</label>
                                                                    <select  class="form-control placeholder-no-fix"  id="job_type" name="job_type"> 
                                                                  <option value=1>Full Time</option>
                                                                  <option value=2>Part Time</option>
                                                        
                                                             </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Salary</label>
                                                                    <input type="text" placeholder="CTC" class="form-control " name="salary" /> </div>
                                                                    

                                                                 <div class="form-group">
                                                                    <label class="control-label">Nation</label>
                                                                   <select  class="form-control placeholder-no-fix" onchange="getStates(this.value);" id="nation" name="nation" aria-placeholder="Select nation">
                                                                  
                                                                        @foreach($nation as $value)
                                                                             <option value="{{ $value->nation_id }}" > {{ $value->nation_name }}</option>
                                                                         @endforeach
                                                                       
                                                                  
                                                                    </select>
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">State</label>
                                                                    <select  class="form-control placeholder-no-fix" onchange="getDistrict(this.value);" id="state" name="state"> 
                                                                  
                                                        
                                                             </select>
                                                            </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">District</label>
                                                                    <select class="form-control " id="district" name="district">
                                                                      
                                                                   
                                                                    </select>
                                                                </div>
                                                              
                                                                <div class="margiv-top-10">
                                                                 
                                                                    <button type="submit"  class="btn green" tabindex="3">Save</button>	
                                                                </div>
                                                                <div class="margiv-top-10" style="margin-top:5px">
                                                                <button type="button" id="cancel" class="btn red" tabindex="3">Back</button>
                                                               
                                                                </div>
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
                                    $("#subcat option").remove();
                                    $("#subcat").append(options);



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