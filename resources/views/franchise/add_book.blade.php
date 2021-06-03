@extends('franchise.layouts.franchise.struct')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background:#36c6d3;color:white">Schedule Work</div>
                <div class="panel-body">
                    <script type="text/javascript">
                        function validateForm() {

                            var date  = document.forms["add"]["book_day"].value;
                            
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
                    <form class="form-horizontal"  name="add" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data"  action="{{ route('franchise.book.change',$tool->tool_id) }}">
                        {{ csrf_field() }}
                        
                        
                       
                        <div class="form-group{{ $errors->has('book_day') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Schedule Date</label>
                            <div class="col-md-6">
                                <input type="date"  id="book_day" class="form-control" name="book_day" value="{{ old('book_day') }}" required autofocus></textarea>
                                @if ($errors->has('book_day'))                                <span class="help-block">
                                    <strong>{{ $errors->first('book_day') }}</strong>    
                                </span>
                                @endif                        
                            </div>                    
                        </div>

                  
                        
                        
                        
                           

                       

                        <div class="form-group{{ $errors->has('book_time') ? ' has-error' : '' }}">
                            <label for="book_time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="book_time" type="time" class="form-control" name="book_time" value="{{ old('book_time') }}" required autofocus>
                               @if ($errors->has('book_time'))                                
                            <span class="help-block">
                                <strong>{{ $errors->first('book_time') }}</strong>    
                            </span>
                                @endif                        
                                             
                        </div>
                    
                    
                        </div>
                        
                              
                         
                    
                    
                        
                    
                    
                        
                        
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Book
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
