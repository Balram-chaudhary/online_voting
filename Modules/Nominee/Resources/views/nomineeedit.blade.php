@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
       <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
       {{-- <a href="javascript:history.back()" class="btn btn-primary breadCrumbRightBackBtn">Back</a> --}}
    </h4>
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
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <a href="{{route('nominee.list')}}" class="btn btn-success addBtnRight">Nominee List</a>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->

            <form  action="" class="form-horizontal formpadding" id="product" method="POST" enctype="multipart/form-data" file="true" name="product">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <input type="hidden" name="nominee_id" value="{{$nominee->id}}">
             <input type="hidden" name="old_nominee_image" value="{{$nominee->image}}">

              <div class="box-body">
              <div class="form-group">
                   <label for="pname" class="col-sm-2 control-label">Nominee Name</label>
                    <div class="col-sm-10">
                    <div class="col-sm-10">
                    <input type="text"  name="name" id="name" placeholder="Enter Nominee Name" value="{{$nominee->name}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('name')}}</span>
                  </div>
                 </div>
                </div>

                  <div class="form-group">
                   <label for="pname" class="col-sm-2 control-label">Party Name</label>
                    <div class="col-sm-10">
                    <div class="col-sm-10">
                    <input type="text"  name="pname" id="pname" placeholder="Enter Party Name" value="{{$nominee->party_name}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('pname')}}</span>
                  </div>
                 </div>
                </div>
              
              <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('/public/images/'.$nominee->image)}}"class="portfolio-box">
                  <img src="{{url('/public/images/'.$nominee->image)}}"class="img-responsive" alt="images" width="400px" height="400px">
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
                    <label for="slider" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>

                
                 <div class="form-group">
                   <label for="licence" class="col-sm-2 control-label">Licence Id</label>
                    <div class="col-sm-10">
                    <input type="text"  name="licence" id="licence"  value="{{$nominee->licence_id}}" placeholder="Enter Enter Licence Number" required="required" class="form-control" >
                     <span class="help-block errortext">{{$errors->first('licence')}}</span>
                  </div>
                </div>

               <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">Post</label>
                    <div class="col-sm-10">
                  <select name="post" id="post" required="required" class="form-control">
                   <option selected="selected" disabled>Select Post</option>
                   <option value="p" {{$nominee->post == 'p' ? 'selected' : ''}}>President</option>
                   <option value="v" {{$nominee->post == 'v' ? 'selected' : ''}}>Vice President</option>
                   <option value="gs" {{$nominee->post == 'gs' ? 'selected' : ''}}>General Secretary</option>
                   <option value="ds" {{$nominee->post == 'ds' ? 'selected' : ''}}>Deputy General Secretary</option>
                   <option value="t" {{$nominee->post == 't' ? 'selected' : ''}}>Treasurer</option>
                   <option value="m" {{$nominee->post == 'm' ? 'selected' : ''}}>Member</option> 
                  </select>
                 </div>
                </div>

                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
                  <select name="state" id="state" required="required" class="form-control">
                   <option selected="selected" disabled>Select State</option>
                   <option value="p1" {{$nominee->state == 'p1' ? 'selected' : ''}}>Province 1</option>
                   <option value="p2" {{$nominee->state == 'p2' ? 'selected' : ''}}>Province 2</option>
                   <option value="p3" {{$nominee->state == 'p3' ? 'selected' : ''}}>Province 3</option>
                   <option value="p4" {{$nominee->state == 'p4' ? 'selected' : ''}}>Province 4</option>
                   <option value="p5" {{$nominee->state == 'p5' ? 'selected' : ''}}>Province 5</option>
                   <option value="p6" {{$nominee->state == 'p6' ? 'selected' : ''}}>Province 6</option>
                   <option value="p7" {{$nominee->state == 'p7' ? 'selected' : ''}}>Province 7</option> 
                  </select>
                 </div>
                </div>

               <div class="form-group">
                   <label for="licence" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                    <input type="text"  name="address" id="address"  value="{{$nominee->address}}" placeholder="Enter Enter Address" required="required" class="form-control" >
                     <span class="help-block errortext">{{$errors->first('address')}}</span>
                  </div>
                </div>
               
                 <div class="form-group">
                   <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                  <select name="status" id="status" required="required" class="form-control">
                   <option value="1" {{$nominee->status == '1' ? 'selected' : ''}}>Active</option>
                   <option value="0" {{$nominee->status == '0' ? 'selected' : ''}}>Inactive</option>
                   
                  </select>
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
@section('footer_resources')
<script>
    CKEDITOR.replace('productdescription');
    CKEDITOR.replace('productspecification');
</script>
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
 @stop
