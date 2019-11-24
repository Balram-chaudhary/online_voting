  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/voter/dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Online Voting</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Online</b>Voting</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle customtoggle" data-toggle="dropdown">

              <img src="{{url('/public/images').'/'.Auth::guard('voter')->user()->image}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::guard('voter')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/public/images').'/'.Auth::guard('voter')->user()->image}}" class="img-circle" alt="User Image">

                <p>
                 {{ Auth::guard('voter')->user()->name }}
                  <small>Member since</small>
                  @php
                  echo date("jS F, Y", strtotime(Auth::guard('voter')->user()->created_at)); 
                  @endphp
 
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
             <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('voter.profile')}}" class="btn btn-default btn-flat"  style="color:#fff; border:#069180; background-color:#069180; ">Voter Profile</a>
                </div>

                <div class="pull-right">
                  <a href="{{route('voter.dashboard.logout')}}" class="btn btn-default btn-flat" style="color:#fff; border:#a83521; background-color:#a83521; ">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>