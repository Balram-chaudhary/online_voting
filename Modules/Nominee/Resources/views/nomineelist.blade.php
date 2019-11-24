@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
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

      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body">
         <br>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Nominee Name</th>
                   <th>Party Name</th>
                   <th>Image</th>
                   <th>Licence Id</th>
                  <th>Post</th>
                  <th>State</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Operation</th>
                </tr>
               </thead>
               <tbody id="nominee">
                <?php $i=1;?>
                 @if(sizeof($nominee)>0)
                    @foreach($nominee as $n)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$n->name}}</td>
                        <td>{{$n->party_name}}</td>
                        <td><img src="{{url('/public/images/'.$n->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{$n->licence_id}}</td>
                        <td>@if($n->post=='p')President @elseif($n->post=='v')Vice President @elseif($n->post=='gs')General Secretary @elseif($n->post=='ds')Deputy general secretary @elseif($n->post=='t') Treasurer @else Member @endif</td>
                        <td>@if($n->state=='p1')Province 1 @elseif($n->state=='p2')Province 2 @elseif($n->state=='p3')Province 3 @elseif($n->state=='p4')Province 4 @elseif($n->state=='p5')Province 5 @elseif($n->state=='p6')Province 6 @else Province 7 @endif</td>
                        <td>{{$n->address}}</td>
                        <td>@if($n->status=='1')Active @else Inactive @endif</td>
                        <td>
                        	<a href="{{route('nominee.edit',[$n->id])}}" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>     
                       &nbsp; 
                    <a href="{{route('nominee.remove',[$n->id])}}" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" onclick="if (!confirm('Are you sure to delete?')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
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
            <!-- /.box-body -->
            <div class="box-footer clearfix" id="paginated">
              {{ $nominee->links() }}
          </div>
        </div>
      </div>
  </div>
</div>
@stop
