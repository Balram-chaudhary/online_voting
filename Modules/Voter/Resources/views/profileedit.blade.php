@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.voter.nav')
@include('layouts.backend.voter.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">Profile Edit</h1>
      @if(Session::get('success_msg'))
          <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            {{ Session::get('success_msg') }}
         </div>
          @endif
          @if(Session::get('error_msg'))
          <div class="alert alert-success">
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
             <input type="hidden" name="profile_id" value="{{$profile->id}}">
             <input type="hidden" name="old_profile_image" value="{{$profile->image}}">
              <div class="box-body">
              <div class="form-group">
                   <label  class="col-sm-2 control-label">UserName</label>
                    <div class="col-sm-10">
                    <input type="text"  name="uname" id="uname" placeholder="Enter Username" value="{{$profile->name}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('uname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">               
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('/public/images/'.$profile->image)}}"class="portfolio-box">
                  <img src="{{url('/public/images/'.$profile->image)}}"class="img-responsive" alt="images" width="100px" height="100px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
               </div> 
              </div>
                <div class="form-group">
                    <label for="pimage" class="col-sm-2 control-label">Profile Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}" >
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                </div>

               
               <div class="form-group">
                   <label for="price" class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-10">
                    <input type="text"  name="contact" id="post"  value="{{$profile->phone}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('contact')}}</span>
                  </div>
                </div>

                <div class="form-group">
                   <label for="aprice" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                    <input type="text"  name="address" id="address"  value="{{$profile->address}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('address')}}</span>
                  </div>
                </div>
               

                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&update" class="btn btn-success" value="submit&update">Submit & Update</button>
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
