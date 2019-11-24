 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
         @if(Auth::guard('voter'))
         @if( Auth::guard('voter')->user()->status=='u'||Auth::guard('voter')->user()->status=='b'||Auth::guard('voter')->user()->status=='vc')
          <li class="treeview @if($menu_active=='vote'){{'active menu-open'}}@endif" style="display: none;">
          <a href="javascript:void(0)">
          <i class="fa fa-user" aria-hidden="true"></i><span>Vote</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('voter.vote')}}"><i class="fa fa-user" aria-hidden="true"></i><span>Vote</span></a></li>
          </ul>
        </li>    
        @else
         <li class="treeview @if($menu_active=='vote'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-user" aria-hidden="true"></i><span>Vote</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('voter.vote')}}"><i class="fa fa-user" aria-hidden="true"></i><span>Vote</span></a></li>
          </ul>
        </li>        
         @endif
         @endif
        @if(Auth::guard('voter'))
          <li class="treeview @if($menu_active=='profile'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-cogs" aria-hidden="true"></i><span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('voter.profile')}}"><i class="fa fa-user" aria-hidden="true"></i><span>Profile</span></a></li>
           <li class="@if($submenu_active=='profileedit'){{'active'}}@endif"><a href="{{route('voter.profile.edit')}}"><i class="fa fa-edit" aria-hidden="true"></i><span>Profile Edit</span></a></li>
            <li class="@if($submenu_active=='changepassword'){{'active'}}@endif"><a href="{{route('voter.change.password')}}"><i class="fa fa-edit" aria-hidden="true"></i><span>Change Password</span></a></li>
          </ul>
        

        </li>        
         @endif
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>