<!DOCTYPE html>
<html>
<head>
<title>Online Voting Register Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{asset('/public/frontend/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Online Voting Registration Form</h1>
		<div class="main-agileinfo">
			@if(Session::get('success_msg'))
          <div class="alert alert-success">
            {{ Session::get('success_msg') }}
         </div>
          @endif
          @if(Session::get('error_msg'))
          <div class="alert alert-success">
          {{ Session::get('error_msg') }}
          </div>
          @endif
			<div class="agileits-top">
				<form action="" method="post" enctype="multipart/form-data" file="true">
					<input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
					<label for="slider" class="text" style="color:white;">Username</label>
					<input class="text" type="text" name="name" placeholder="Username" required="required">
                    <span class="help-block errortext">{{$errors->first('name')}}</span>
					<br>
					<label for="slider" class="text" style="color:white;">Email</label>
					<input class="text" type="email" name="email" placeholder="Email" required="required">
                    <span class="help-block errortext">{{$errors->first('email')}}</span>
					<br>
					<label for="slider" class="text" style="color:white;">Phone</label>
					<input class="text" type="text" name="phone" placeholder="phone" required="required">
					<span class="help-block errortext">{{$errors->first('phone')}}</span>
					<br>
					 <div class="form-group">
                    <label for="slider" class="text" style="color:white;"> Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}"  required="required">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
                  <br>
                  <label for="licence" class="text" style="color:white;">Licence Number</label>
                  <input class="text" type="text" name="licence" placeholder="Licence Number" required="required">
                  <span class="help-block errortext">{{$errors->first('licence')}}</span>
				   <br>
					 <div class="form-group">
                    <label for="slider" class="text" style="color:white;">Licence Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="limages" id="limages"   value="{{old('limages')}}"  required="required">
                       <span class="help-block errortext">{{$errors->first('limages')}}</span>
                    </div>
                  </div><br>

                   <div class="form-group">
                   <label for="post" class="text" style="color: white;">State</label>
                    <div class="col-sm-10">
                  <select name="state" id="state" required="required" class="form-control">
                   <option selected="selected" disabled>Select State</option>
                   <option value="p1">Province 1</option>
                   <option value="p2">Province 2</option>
                   <option value="p3">Province 3</option>
                   <option value="p4">Province 4</option>
                   <option value="p5">Province 5</option>
                   <option value="p6">Province 6</option>
                   <option value="p7">Province 7</option> 
                  </select>
                  <span class="help-block errortext">{{$errors->first('state')}}</span>
                 </div>
                </div>	
                
                <br>
                  <label for="licence" class="text" style="color:white;">Address</label>
                  <input class="text" type="text" name="address" placeholder="Your Address" required="required">
                  <span class="help-block errortext">{{$errors->first('address')}}</span>  
					
					<input type="submit" value="SIGNUP" name="submit&create">
				</form>
				<p>have an Account? <a href="{{route('voter.login')}}"> Login</a></p>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(){
               var fp = $("#images");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 8000000) {
                    alert('File size must not be more than 8 MB');
                    $('#images').val('');
               }
             //   if(lg < 2 || lg > 8){
             //    alert('images must not be less than 2 or more than 8');
             //        $('#images').val('');
             // }

           }
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#limages').change(function(){
               var fp = $("#limages");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 8000000) {
                    alert('File size must not be more than 8 MB');
                    $('#limages').val('');
               }
             //   if(lg < 2 || lg > 8){
             //    alert('images must not be less than 2 or more than 8');
             //        $('#images').val('');
             // }

           }
        });
    });
    </script>
</body>
</html>