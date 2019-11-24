@extends('voter::layouts.master')
@section('content')
   <div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Online Voting </b> Voter Login</a>
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
  
  <form action="{{route('voter.login.submit')}}" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ isset($u_e) && $u_e !="" ? $u_e : old('email') }}">
        
       @if($errors->first('email'))
              <label class="control-label" style="float: left;">{{$errors->first('email')}}</label>
       @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ isset($u_p) && $u_p !="" ? $u_p : old('password') }}">
        @if($errors->first('password'))
              <label class="control-label" style="float: left;">{{$errors->first('password')}}</label>
        @endif
      </div>
      <div class="row">
         <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me" value="yes" {{ (isset($u_p) && $u_p !="") && (isset($u_e) && $u_e !="") ?'checked' :''}}> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   Not Register Yet?Please <a href="{{route('voter.register')}}">Register</a>
</div>
   
  </div>
  <!-- /.login-box-body -->
</div>
@stop
