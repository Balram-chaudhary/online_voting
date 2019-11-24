<!DOCTYPE html>
<html lang="en">
<head>

<title>Table information </title>
<style type="text/css">

.container{
	margin:20px 0px 0px 175px;
}
</style>

</head>
<body>
<div class="container">
<label>
	FirstName:{{$maildata['name']}}
</label><span></span><br><br>

<label>
	Email:{{$maildata['email']}}
</label><span></span><br><br>
<label>
	Phone:{{$maildata['phone']}}
</label><span></span>
<br><br>

<label>
	Subject:{{$maildata['subject']}}
</label><span></span><br><br>
<label>
	Subject:{{$maildata['message']}}
</label><span></span>



</body>


</html>