@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.voter.nav')
@include('layouts.backend.voter.sidebar')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        User Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{url('/public/images').'/'.Auth::guard('voter')->user()->image}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::guard('voter')->user()->name}}</h3>
              <p class="text-muted text-center">{{Auth::guard('voter')->user()->email}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <strong><i class="fa fa-user margin-r-5"></i>Username</strong>

              <p class="text-muted">
               {{Auth::guard('voter')->user()->name}}
              </p>
              <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i>State</strong>

              <p class="text-muted">@if(Auth::guard('voter')->user()->state=='p1')Province 1 @elseif(Auth::guard('voter')->user()->state=='p2')Province 2 @elseif(Auth::guard('voter')->user()->state=='p3')Province 3  @elseif(Auth::guard('voter')->user()->state=='p4')Province 4 @elseif(Auth::guard('voter')->user()->state=='p5')Province 5 @elseif(Auth::guard('voter')->user()->state=='p6')Province 6 @else Province 7 @endif</p>
             <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>

              <p class="text-muted">{{Auth::guard('voter')->user()->address}}</p>
              
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i>Licence Number</strong>

              <p class="text-muted">{{Auth::guard('voter')->user()->licence_number}}</p>
            

             <strong><i class="fa fa-map-marker margin-r-5"></i>Licence Image</strong>

               <img class="profile-user-img img-responsive" src="{{url('/public/images').'/'.Auth::guard('voter')->user()->licence_image}}" alt="User profile picture">


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
@stop