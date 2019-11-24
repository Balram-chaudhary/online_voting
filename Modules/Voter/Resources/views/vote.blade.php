@extends('layouts.backend.othermain')
@section('content')
@include('layouts.backend.voter.nav')
@include('layouts.backend.voter.sidebar')
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
            
            <!-- /.box-header -->
            <!-- form start -->

            <form  action="" class="form-horizontal formpadding" id="product" method="POST" enctype="multipart/form-data" file="true" name="product">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
               <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">President</label>
                    <div class="col-sm-10">
                  <select name="president" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for Presidnet</option>
                   @if(sizeof($president)>0)
                    @foreach($president as  $p)
                   <option value="{{$p->id}}" data-img-src="{{url('/public/images/'.$p->image)}}">{{$p->name}}</option>
                   @endforeach
                   @else
                    <option disabled>No Nominee for President</option>
                   @endif  
                  </select>
                 </div>
                </div>


                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">Vice President</label>
                    <div class="col-sm-10">
                  <select name="vicepresident" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for Vice Presidnet</option>
                   @if(sizeof($vicepresident)>0)
                    @foreach($vicepresident as  $v)
                   <option value="{{$v->id}}" data-img-src="{{url('/public/images/'.$v->image)}}">{{$v->name}}</option>
                   @endforeach 
                   @else
                    <option disabled>No Nominee for Vice President</option>
                   @endif
                  </select>
                 </div>
                </div>


               
                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">General Secretary</label>
                    <div class="col-sm-10">
                  <select name="generalsecretary" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for General Secretary</option>
                   @if(sizeof($generalsecretary)>0)
                    @foreach($generalsecretary as  $g)
                   <option value="{{$g->id}}" data-img-src="{{url('/public/images/'.$g->image)}}">{{$g->name}}</option>
                   @endforeach
                   @else
                    <option disabled>No Nominee for General Secretary</option>
                   @endif
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">Deputy General Secretary</label>
                    <div class="col-sm-10">
                  <select name="deputygeneral" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for Deputy General Secretary</option>
                   @if(sizeof($deputygeneral)>0)
                    @foreach($deputygeneral as  $d)
                   <option value="{{$d->id}}" data-img-src="{{url('/public/images/'.$d->image)}}">{{$d->name}}</option>
                   @endforeach
                   @else
                    <option disabled>No Nominee for Deputy General Secretary</option>
                   @endif  
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">Treasure</label>
                    <div class="col-sm-10">
                  <select name="treasurer" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for Treasure</option>
                   @if(sizeof($treasurer)>0)
                    @foreach($treasurer as  $t)
                   <option value="{{$t->id}}" data-img-src="{{url('/public/images/'.$t->image)}}">{{$t->name}}</option>
                   @endforeach
                    @else
                    <option disabled>No Nominee for Treasure</option>
                   @endif  
                  </select>
                 </div>
                </div>
                
                <div class="form-group">
                   <label for="post" class="col-sm-2 control-label">Member</label>
                    <div class="col-sm-10">
                  <select name="member" id="post" required="required" class="my-select">
                   <option selected="selected" disabled>Select Nominee for Member</option>
                    @if(sizeof($member)>0)
                    @foreach($member as  $m)
                   <option value="{{$m->id}}" data-img-src="{{url('/public/images/'.$m->image)}}">{{$m->name}}</option>
                   @endforeach
                    @else
                    <option disabled>No Nominee for Member</option>
                   @endif   
                  </select>
                 </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&vote" class="btn btn-success" value="submit&vote">Submit & Vote</button>
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
<!-- <script>
    CKEDITOR.replace('productdescription');
    CKEDITOR.replace('productspecification');
</script> -->
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
   <script src="{{asset('/public/frontend/src/dist/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/public/frontend/src/chosen/chosen.js')}}" type="text/javascript"></script>
  <script src="{{asset('/public/frontend/src/ImageSelect.jquery.js')}}" type="text/javascript"></script>
  </script>
  <script type="text/javascript">
    $(".my-select").chosen({width:"100%"});
  </script>

 @stop
