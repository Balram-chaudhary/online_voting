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
                <h2 style="text-align: center">President Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($president)>0)
                    @foreach($president as $p)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$p->name}}</td>
                        <td><img src="{{url('/public/images/'.$p->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescorepresident($p->id))}}</td>
                        
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

            <br>
              <div style="overflow-x:auto;">
                <h2 style="text-align: center">Vice President Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($vicepresident)>0)
                    @foreach($vicepresident as $v)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$v->name}}</td>
                        <td><img src="{{url('/public/images/'.$v->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescorevicepresident($v->id))}}</td>
                        
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


            <br>
              <div style="overflow-x:auto;">
                <h2 style="text-align: center">General Secretary Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($generalsecretary)>0)
                    @foreach($generalsecretary as $g)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$g->name}}</td>
                        <td><img src="{{url('/public/images/'.$g->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescoregeneralsecretary($g->id))}}</td>
                        
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

            <br>
              <div style="overflow-x:auto;">
                <h2 style="text-align: center">Deputy General Secretary Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($deputygeneral)>0)
                    @foreach($deputygeneral as $d)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name}}</td>
                        <td><img src="{{url('/public/images/'.$d->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescoredeputygeneral($d->id))}}</td>
                        
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

            <br>
              <div style="overflow-x:auto;">
                <h2 style="text-align: center">Treasurer Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($treasurer)>0)
                    @foreach($treasurer as $t)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$t->name}}</td>
                        <td><img src="{{url('/public/images/'.$t->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescoretreasurer($t->id))}}</td>
                        
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




           <br>
              <div style="overflow-x:auto;">
                <h2 style="text-align: center">Member Result</h2>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                   <th>Image</th>
                   <th>Score</th>
                </tr>
               </thead>
               <tbody id="voter">
                <?php $i=1;?>
                 @if(sizeof($member)>0)
                    @foreach($member as $m)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$m->name}}</td>
                        <td><img src="{{url('/public/images/'.$m->image)}}"class="img-responsive" alt="images" width="100px" height="100px"></td>
                        <td>{{count(Helpers::Votescoremember($m->id))}}</td>
                        
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
            
        </div>
      </div>
  </div>
</div>
@stop
