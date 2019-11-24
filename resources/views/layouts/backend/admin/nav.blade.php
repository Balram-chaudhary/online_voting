  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/admin/dashboard')}}" class="logo">
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
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu" id="markasread" onclick="markNotificationAsRead('{{count( Auth::guard('admin')->user()->unreadnotifications)}}')">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger">{{count( Auth::guard('admin')->user()->unreadnotifications)}}</span>
            </a>
            <ul class="dropdown-menu">
              @if(count( Auth::guard('admin')->user()->unreadnotifications)>0)
              <li class="header">You have {{count( Auth::guard('admin')->user()->unreadnotifications)}} notifications</li>
              <li>
                @else
                <li class="header" style="display:none;">You have {{count( Auth::guard('admin')->user()->unreadnotifications)}} notifications</li>
              <li>
                @endif
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                   @forelse(Auth::guard('admin')->user()->unreadnotifications as $notification)
                   @include('layouts.notification.'.snake_case(class_basename($notification->type)))
                   @empty
                   <a href="">No Unread Notification</a>
                   @endforelse
                  </li>
                </ul>
              </li>
            </ul>
          </li>

         <!-- end notification -->

         
         
         
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle customtoggle" data-toggle="dropdown">

              <img src="{{url('/public/images').'/'.Auth::guard('admin')->user()->image}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/public/images').'/'.Auth::guard('admin')->user()->image}}" class="img-circle" alt="User Image">

                <p>
                 {{ Auth::guard('admin')->user()->name }}
                  <small>Member since</small>
                  @php
                  echo date("jS F, Y", strtotime(Auth::guard('admin')->user()->created_at)); 
                  @endphp
 
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
             <li class="user-footer">

                <div class="pull-right">
                  <a href="{{route('admin.dashboard.logout')}}" class="btn btn-default btn-flat" style="color:#fff; border:#a83521; background-color:#a83521; ">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>