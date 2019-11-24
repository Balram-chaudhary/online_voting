@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.voter.nav')
@include('layouts.backend.voter.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">Change Password</h1>
          @if(Session::get('error_msg'))
          <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          {{ Session::get('error_msg') }}
          </div>
          @endif

    </section>
    <!-- Main content -->
       <section class="content">
        <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" id="profile" method="POST" enctype="multipart/form-data"  name="profile">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
              <div class="form-group">
                   <label  class="col-sm-2 control-label">Enter Your Current Password</label>
                    <div class="col-sm-10">
                    <input type="password"  name="password" id="password" placeholder="Enter Your Current Password" value="{{old('password')}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('password')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&update" class="btn btn-success" value="submit&update">Submit</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
  </div>
@stop
