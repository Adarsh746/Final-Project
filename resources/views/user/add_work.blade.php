@extends('user.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Schedule Work</div>
                <div class="panel-body">
                    <script type="text/javascript">
                        function validateForm() {

                            var date  = document.forms["add"]["work_date"].value;
                            
var today = new Date();

var todaydate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

d1=Date.parse(date);
d2=Date.parse(todaydate);






                            
                        
                            if( d1 < d2)
                            {
                                alert("Invalid Date")
                                return false;
                            }
                            else
                                {
                                    return true;        
                                }


    
  //   if (dob == null || dob == "" || !pattern.test(dob)) {
  //       errMessage += "Invalid date of birth\n";
  //       return false;
  //   }
  //   else {
  //       return true
  // var curdate= new date();
  //                           var tdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  // //   }
  // var x = document.forms["myForm"]["fname"].value;
  // if (x == "") {
  //   alert("Name must be filled out");
  //   return false;
  //}
}
                    </script>
                    <form class="form-horizontal"  name="add" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data"  action="{{ route('user.work.change',$emp->franchise_id) }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('work_name') ? ' has-error' : '' }}">
                            <label for="work_name" class="col-md-4 control-label">Work Name</label>
                            <div class="col-md-6">
                                <input id="work_name" type="text" class="form-control" name="work_name" value="{{ old('work_name') }}" required autofocus>
                               @if ($errors->has('work_name'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('work_name') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                   
                    
                        </div>
                       
                        <div class="form-group{{ $errors->has('work_date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Schedule Date</label>
                            <div class="col-md-6">
                                <input type="date"  id="work_date" class="form-control" name="work_date" value="{{ old('work_date') }}" required autofocus></textarea>
                                @if ($errors->has('work_date'))                                <span class="help-block">
                                    <strong>{{ $errors->first('work_date') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>

                  
                        
                        
                        
                           

                       

                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-4 control-label">Work Time</label>
                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" required autofocus>
                               @if ($errors->has('time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('time') }}</strong>    
                            </span>
                                @endif                        
                                             
                        </div>
                    
                    
                        </div>
                        
                              
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label"> Description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                               @if ($errors->has('description'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>    
                        
                    
                            </span>
                                @endif
                        
                                
                        
                            </div>

                        
                    
                    
                        </div>
                    
                    
                        
                        
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Schedule New Work
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
