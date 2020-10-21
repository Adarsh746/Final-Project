
@extends('franchise.layouts.profile')

@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Interview Shedule</span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                    <div class="portlet-body form">
                                        <div class="mt-clipboard-container">
                                        <div style="padding-left:20px">
                                            <h4 class="profile-desc-title">Personal Info</h4><br>
                                            <label class="control-label bold">User Id :&nbsp;</label>
                                            {{$app->user_id}}<br>
                                            <label class="control-label bold">User name :&nbsp;</label>
                                            {{$app->user_name}}<br>
                                            <label class="control-label bold">Job Name :&nbsp;</label>
                                            {{$app->job_name}}<br>
                                            <label class="control-label bold">Job Id :&nbsp;</label>
                                            {{$app->job_id}}<br>
                                            <label class="control-label bold">Application Id :&nbsp;</label>
                                            {{$app->app_id}}<br>
                                            <label class=" bold">Select Date :&nbsp;</label>
                                            
                                        </div>
                                <form method="POST" action="{{route('employeer.app.update',$app->app_id)}}">
                                <input type="text" class="hidden"  name="job_name"value="{{$app->job_name}}">  
                                <input type="text" class="hidden"  name="user_name"value="{{$app->user_name}}">  
                                <input type="text" class="hidden"  name="email"value="{{$app->email}}">  
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="col-md-3">
                                        <div class="input-group date form_datetime form_datetime bs-datetime">  
                                                 
                                             <input type="text" id="txtdate" size="16" name="date" placeholder="{{$app->interview_date}}" class="form-control">                 
                                            <span class="input-group-addon">                   
                                                <button class="btn default date-set" type="button">                          
                                                    <i class="fa fa-calendar"></i>                        
                                                </button>                     
                                            </span>                
                                        </div>             
                                        
                                      <div class="row">
                                                                                   
                                    <button type="submit" style="margin-left: 15px;margin-top: 10px;"  onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-calendar"></i> Invite</a>
                                    </button>
                                    </div>
                                </div>
                                </form>
                              
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
