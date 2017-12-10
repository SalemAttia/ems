    <!-- Main Header -->
    <header class="main-header" <?php if ( Session('locale') == 'en') echo 'dir="ltr"'; else echo 'dir="rtl"';?>>

      <!-- Logo -->
      <a href="#" class="logo">
        
        <span class="logo-mini"><b>E</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>User</b>EM</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu" style="<?php if ( Session('locale') == 'en') echo 'float: left; margin-top: 2%;'; else echo 'float: right';?>">
            <form action="{{route('langaugea')}}" method="post">
               {{csrf_field()}}
               <select class="dropdown-toggle" style="color: #777;background: rgba(204, 204, 204, 0);border: 0;margin-top: 11px;" name="langauge" id="formid">
                <option value="ar" >عربى</option>
                <option value="en" <?php if ( Session('locale') == 'en') echo "selected";?> >English</option>
                
              </select>
              
            </form>
          </li>
          <!-- /.messages-menu -->
          
          
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              @if(Auth::user()->pictuer())
              <img src="{{asset(Auth::user()->pictuer())}}" class="user-image" alt="User Image">
              @else
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              @endif
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->username}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
               @if(Auth::user()->pictuer())
              <img src="{{asset(Auth::user()->pictuer())}}" class="img-circle" alt="User Image">
              @else
               <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

              @endif
               
                <p>
                  {{Auth::user()->username}}
                  <small>User</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/')}}" class="btn btn-default btn-flat">الصفحة الشخصية</a>
                </div>
                <div class="pull-right">
                 <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل خروج</a>
               </div>
             </li>
           </ul>
         </li>
         

         
       </ul>
     </div>
   </nav>
 </header>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>