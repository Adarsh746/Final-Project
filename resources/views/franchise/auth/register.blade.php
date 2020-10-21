@extends('franchise.layouts.app')

@section('content')
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Job.in</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/login-3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
               <h1 style="color:white;font-weight: 1000;"><span style="color:red">Legis Eye</span></h2> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="register-form" enctype="multipart/form-data" action="{{ route('franchise.register') }}" method="post" novalidate="novalidate" style="display: block;">
                <h3 class="font-green">Sign Up</h3>
                {{ csrf_field() }}
                <p class="hint"> Enter your details below: </p>
                <div class="form-group form-group{{ $errors->has('employeer_name') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Franchise Name</label>
                    <input class="form-control placeholder-no-fix" required type="text" placeholder="Lawyer Name" name="employeer_name">
                    @if ($errors->has('employeer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employeer_name') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group  form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" required type="text" placeholder="Email" name="email">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Contact</label>
                    <input class="form-control placeholder-no-fix" required type="text" placeholder="contact" name="contact"> 
                    @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('contact')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('contact1') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Contact 2</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="contact 2" name="contact1"> 
                    @if ($errors->has('contact1'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('contact1')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group  form-group{{ $errors->has('aadhar_number') ? ' has-error' : ''}}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">AADHAR Number</label>
                    <input class="form-control placeholder-no-fix" required minlength="12" maxlength="12" type="text" placeholder="AADHAR Number" name="aadhar_number">
                    @if ($errors->has('aadhar_number'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('aadhar_number')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('DOB') ? ' has-error' : '' }}">
                    <label class="control-label ">Date Of Birth</label>
                    <input class="form-control placeholder-no-fix" type="date" name="DOB" placeholder="Date Of Birth"> 
                    @if ($errors->has('DOB'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('DOB')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">District</label>
                    <select  class="form-control placeholder-no-fix"  id="blood_group" name="blood_group">
                    
                        <option value="" > Select Blood Group</option>
                        <option value="A+" > A+</option>
                        <option value="A-" > A-</option>
                        <option value="B+" > B+</option>
                        <option value="B-" > B-</option>
                        <option value="O+" > O+</option>
                        <option value="O-" > O-</option>
                        <option value="AB+"> AB+</option>
                        <option value="AB-"> AB-</option>
                       
                       
                        
                    </select>
                    @if ($errors->has('blood_group'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('blood_group')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="control-label "> Image</label>
                    <input class="form-control placeholder-no-fix" type="file" placeholder=" Image" name="image"> 
                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('image')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('prem_address') ? ' has-error' : '' }}">
                    <label class="control-label "> Prmenent Address</label>
                    <input class="form-control placeholder-no-fix" type="Textarea" placeholder="Prmenent Address" name="prem_address"> 
                    @if ($errors->has('prem_address'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('prem_address')}}</strong>
                                    </span>
                                @endif
                </div>
                 <div class="form-group form-group{{ $errors->has('curr_address') ? ' has-error' : '' }}">
                    <label class="control-label "> Current Address</label>
                    <input class="form-control placeholder-no-fix" type="Textarea" placeholder="Current Address" name="curr_address"> 
                    @if ($errors->has('curr_address'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('curr_address')}}</strong>
                                    </span>
                                @endif
                </div>

                   <!--  <div class="form-group form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9 ">About</label>
                    <input class="form-control placeholder-no-fix" type="Textarea" name="about" placeholder="About"> 
                    @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('about')}}</strong>
                                    </span>
                                @endif
                </div> -->
                    <!-- <div class="form-group form-group{{ $errors->has('employeer_cirtificate') ? ' has-error' : '' }}">
                    <label class="control-label ">Employer Certificate</label>
                    <input class="form-control placeholder-no-fix" type="file" placeholder=" employeer_cirtificate" name="employeer_cirtificate"> 
                    @if ($errors->has('employeer_cirtificate'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('employeer_cirtificate')}}</strong>
                                    </span>
                                @endif
                </div> -->

                    <div class="form-group form-group{{ $errors->has('nation') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Nation</label>
                    <select  class="form-control placeholder-no-fix" onclick="getStates(this.value);" id="nation" name="nation" aria-placeholder="Select nation">
                    <option value="" selected="selected" > Select Nation</option>
                    @foreach($nat as $value)
                          <option value="{{ $value->nation_id }}" > {{ $value->nation_name }}</option>
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
                    
                          <option value="" > Select State</option>
                       
                        
                    </select>
                    @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('state')}}</strong>
                                    </span>
                                @endif
                </div>
                
                <div class="form-group form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">District</label>
                    <select required  class="form-control placeholder-no-fix"  onclick="getPost(this.value);"  id="district" name="district">
                    
                          <option value="" > Select District</option>
                       
                        
                    </select>
                    @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('district')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('post_office_id') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Post Office</label>
                    <select  class="form-control placeholder-no-fix" required   id="post_office_id" name="post_office_id">
                    
                          <option value="" > Select Post Office</option>
                       
                        
                    </select>
                    @if ($errors->has('post_office_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('post_office_id')}}</strong>
                                    </span>
                                @endif
                </div>
                <!-- <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"> </div> -->
                    <div class="form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"> 
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"> </div>
                <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="tnc"> I agree to the
                        <a href="javascript:;">Terms of Service </a> &amp;
                        <a href="javascript:;">Privacy Policy </a>
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            
        </div>
        <div>
        <div class="copyright"  style="color:black;"> ©Thanuz </div>
        </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <script>

    function getPost(sid)
    {   
        console.log(sid);
            $.ajax({
                url:"{{route('user.showpost','')}}/"+sid,
                type:"GET",
                success: function(data){
                    

                    var options = '<option value="">Choose Post Office</option>';

                        $.each(data, function(i, item) {
                            options += "<option value='"+item.post_office_id +"'>"+item.post_office_name+" pin:"+item.pincode+" </option>";
                        });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                    $("#post_office_id option").remove();
                    $("#post_office_id").append(options);



                    // $.each(data, function(i, item) {

                    //     alert(item.state_id +'|'+ item.state_name);

                }

            });

    }


        </script>

        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>
@endsection






