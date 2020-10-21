
@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>

<html lang="en">
   
    <head>
        <meta charset="utf-8" />
        <title>Thanuz</title>
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
            <a href="#">
               <h1 style="color:white;font-weight: 1000;"><span style="color:red">Legis Eye</span></h2> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="register-form" enctype="multipart/form-data" action="{{ route('user.register') }}" method="post" novalidate="novalidate" style="display: block;">
                <h3 class="font-green">Sign Up</h3>
                {{ csrf_field() }}
                <p class="hint"> Enter your details below: </p>
                <div class="form-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9"> Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder=" Name" name="name">
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group  form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Contact</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="contact" name="contact"> 
                    @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('contact')}}</strong>
                                    </span>
                                @endif
                </div>
                    <div class="form-group form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    <label class="control-label ">Date Of Birth</label>
                    <input class="form-control placeholder-no-fix" type="date" name="dob" placeholder="Date Of Birth"> 
                    @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('dob')}}</strong>
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
                    <select  class="form-control placeholder-no-fix" onclick="getPost(this.value);"  id="district" name="district">
                    
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
                    <select  class="form-control placeholder-no-fix" required onclick="getcity(this.value);"  id="post_office_id" name="post_office_id">
                    
                          <option value="" > Select Post Office</option>
                       
                        
                    </select>
                    @if ($errors->has('post_office_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('post_office_id')}}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Post Office</label>
                    <select  class="form-control placeholder-no-fix" required   id="city_id" name="city_id">
                    
                          <option value="" > Select City</option>
                       
                        
                    </select>
                    @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('city_id')}}</strong>
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
        <div class="copyright"  style="color:black;"> ©Thanuz</div>
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


    function getcity(cid)
    {   
        
            $.ajax({
                url:"{{route('user.showcity','')}}/"+cid,
                type:"GET",
                success: function(data){
                    

                    var options = '<option value="">Choose City</option>';

                        $.each(data, function(i, item) {
                            options += "<option value='"+item.place_id +"'>"+item.place_name+" </option>";
                        });
                    /**
                     * remove select element with id="sid" options and append new options
                     */
                    $("#city_id option").remove();
                    $("#city_id").append(options);



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