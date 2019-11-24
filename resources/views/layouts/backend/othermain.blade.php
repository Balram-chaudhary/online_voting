<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="_token" content="{{ csrf_token() }}">
  <title>Online Voting</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('/public/backend/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
  <link rel="stylesheet" href="{{asset('/public/backend/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('/public/backend/css/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('/public/backend/css/datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('/public/backend/css/custom.css')}}">

<!-- image select -->
<link rel="stylesheet" href="{{asset('/public/frontend/src/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/src/dist/imageselect.css')}}">
    <style type="text/css">
    body {overflow: hidden;padding:10px;font:14px/1.5 Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;color:#777;font-weight:300;}h2 {margin-top: 0px;}table {width:100%;}td {padding:10px;width:45%;}td:first-child{width:10%;}
    </style>

  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46772370-1']);
  _gaq.push(['_setDomainName', 'websemantics.github.io']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- end image select -->








    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 @yield('header_resources')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="loading"></div>
  <div class="wrapper">
@yield('content')
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright © 7th sem students of estern college of engineering batch 2015.
 <a href="http://ovoting.triporbitz.com/">ovoting.triporbitz.com</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script src="{{asset('/public/backend/plugins/jQuery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('/public/backend/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('/public/backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/public/backend/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/public/backend/js/adminlte.min.js')}}"></script>
<script src="{{asset('/public/backend/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/public/backend/js/demo.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    });

    </script>

{{-- <script>
 $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script> --}}
<script>
jQuery(document).ready(function() {
    jQuery('#loading').fadeOut(1000);
});
</script>
 @yield('footer_resources')
</body>
</html>