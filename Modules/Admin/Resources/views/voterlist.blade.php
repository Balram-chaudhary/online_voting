@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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

      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body">
         
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           <div class="row" style="width:500px;">
           <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <div class="dataTables_length" id="example1_length">
            
            </div>
           </div>   
         </div>
       </div>
         <br>
              <div style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Licence Number</th>
                  <th>Licence Image</th>
                  <th>State</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Operation</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($voters)>0)
                    @foreach($voters as $v)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->email}}</td>
                        <td>{{$v->phone}}</td>
                        <td><img src="{{url('/public/images/'.$v->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{$v->licence_number}}</td>
                        <td><img src="{{url('/public/images/'.$v->licence_image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>@if($v->state=='p1')Province 1 @elseif($v->state=='p2')Province 2 @elseif($v->state=='p3')Province 3 @elseif($v->state=='p4')Province 4 @elseif($v->state=='v5')Province 5 @elseif($v->state='v6')Province 6 @else Province 7 @endif</td>
                        <td>{{$v->address}}</td>
                        <td>@if($v->status=='u')Unverified @elseif($v->status=='v')Verified @elseif($v->status=='vc')Voting Closed @else Block @endif</td>
                        
                        <td>
                        	<a href="{{route('admin.voter.edit',[$v->id])}}" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>     
                    
                        </td>
                      </tr>
                    @endforeach
                @else
                <tr>
                  <td colspan="6" align="center">-- No Record Found !! ---</td>
                </tr>
                 @endif
               </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix" id="paginated">
              {{ $voters->links() }}
          </div>
        </div>
      </div>
  </div>
</div>
@stop
