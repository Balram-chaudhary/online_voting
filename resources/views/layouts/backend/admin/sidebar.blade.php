 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::guard('admin'))
          <li class="treeview @if($menu_active=='nominee'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-users" aria-hidden="true"></i><span>Nominees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('nominee.create')}}"><i class="fa fa-user" aria-hidden="true"></i><span>Create Nomine</span></a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('nominee.list')}}"><i class="fa fa-users" aria-hidden="true"></i><span>Nominee List</span></a></li>
          </ul>
        </li>        
         @endif

          @if(Auth::guard('admin'))
          <li class="treeview @if($menu_active=='voters'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-users" aria-hidden="true"></i><span>Voters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('admin.voter.list')}}"><i class="fa fa-users" aria-hidden="true"></i><span>Voter List</span></a></li>
          </ul>
        </li>        
         @endif

         @if(Auth::guard('admin'))
          <li class="treeview @if($menu_active=='vote'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-book" aria-hidden="true"></i><span>Vote Score</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('admin.vote.result')}}"><i class="fa fa-book" aria-hidden="true"></i><span>Vote Score</span></a></li>
          </ul>
        </li>        
         @endif
          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>