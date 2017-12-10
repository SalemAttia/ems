   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar ">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="<?php if ( Session('locale') == 'en') echo 'pull-left'; else echo 'pull-right';?> image">
         @if(Auth::user()->pictuer())
              <img src="{{asset(Auth::user()->pictuer())}}" class="img-circle" alt="User Image">
          @else
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
              @endif
        </div>
        <div class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?> info">
          <p>{{Auth::user()->username}}</p>
          <!-- Status -->
          <a href="#">Online <i class="fa fa-circle text-success"></i></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if($title == 'profile') echo "active";?>">
           <a href="{{url('/profile')}}">
            <i class="fa fa-dashboard"></i> <span>{{trans('demo.profile')}}</span>
            
          </a>
        </li>
       

        <li class="treeview <?php if($title == 'EditProfile') echo "active";?>">
          <a href="#"><i class="fa fa-cog"></i> <span>{{trans('demo.managehomepage')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li ><a href="{{ url('/profile') }}"><i class="fa fa-user"></i>{{trans('demo.profile')}}</a></li>
          <li ><a href="{{url('/accountedit') }}"><i class="fa fa-bug"></i>{{trans('demo.editaccount')}}</a></li>
            
          </ul>
        </li>
               
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
