@extends('voter::layouts.mastercreatepassword')
@section('content')
   <div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Online Voting </b> Voter Password Create</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>
      @if(Session::has('error_message'))
                  <div class="alert alert-danger">
              <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
              <strong>{{Session::get('error_message')}}</strong>
            </div>
          @endif
           @if(Session::get('success_msg'))
          <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            {{ Session::get('success_msg') }}
         </div>
          @endif
  
  <form action="{{route('voter.createpassword.post')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="voter_id" value="{{$id}}">
      <div class="form-group has-feedback">
        <label  class="control-label">New Password</label>
         <input type="password"  name="password" id="password" placeholder="Enter Your  Password" value="{{old('password')}}" required="required" class="form-control">
      </div>
      <div class="form-group has-feedback">
        <label  class="control-label">Confirm Password</label>
        <input type="password"  name="password_confirmation" id="cpassword" placeholder="Confirm Password" value="{{old('cpassword')}}" required="required" class="form-control">
                 <div>
                    @if ($errors->has('password'))
                     <span class="help-block">
                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                     </span>
                    @endif
                  </div>
      </div>
      <div class="row">
         
        <div class="col-xs-4">
         <button type="submit" name="submit&update" class="btn btn-success" value="submit&update">Create Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
</div>
   
  </div>
  <!-- /.login-box-body -->
</div>
@stop
