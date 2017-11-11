   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar ">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>
          <!-- Status -->
          <a href="#">Online <i class="fa fa-circle text-success"></i></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if($title == 'الصفحة الرئيسية') echo "active";?>">
           <a href="{{url('/')}}">
            <i class="fa fa-dashboard"></i> <span>الصفحة الرئيسية</span>
            
          </a>
        </li>
        <li class="<?php if($title == 'ادارة الموظفين') echo "active";?>"><a href="{{ url('employee-management') }}"><i class="fa fa-users"></i> <span>ادارة الموظفين</span></a></li>

        <li class="treeview <?php if($title == 'ادارة الموقع') echo "active";?>">
          <a href="#"><i class="fa fa-cog"></i> <span>ادارة الموقع</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li ><a href="{{ url('system-management/department') }}"><i class="fa fa-bank"></i>الحالة العملية</a></li>
            <li><a href="{{ url('system-management/degree') }}"><i class="fa fa-graduation-cap"></i>المؤهل</a></li>
          <li><a href="{{ url('system-management/position') }}"><i class="fa fa-briefcase"></i>الفئة الوظيفية</a></li>
          <li><a href="{{ url('system-management/city') }}"><i class="fa fa-level-down"></i>مكان العمل</a></li>
          <li><a href="{{ url('system-management/social') }}"><i class="fa fa-users"></i>وسائل التواصل</a></li>
            <li><a href="{{ url('system-management/report') }}"><i class="fa fa-flag-o"></i>التقارير</a></li>
          </ul>
        </li>
        <li class="<?php if($title == 'ادارة المستخدمين') echo "active";?>"><a href="{{ route('user-management.index') }}"><i class="fa fa-user"></i> <span>ادارة المستخدمين</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
