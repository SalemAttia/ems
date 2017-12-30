<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/mystyle.css')}}">
  @yield('css')
  
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style type="text/css">
  .login-box-body, .register-box-body {
    background: #dfe2e5 !important;
    padding: 20px !important;
    color: #dfe2e5 !important;
    opacity: 0.9 !important;
}
.login-box-msg, .register-box-msg {
    color: #000 !important;
    margin: 0;
    text-align: center;
    padding: 0 20px 20px 20px;
}
.btn-primary {
    background-color: #444444 !important;
    border-color: #444444 !important;
}
.navbar-default {
    background-color: #fbf2e1;
    border-color: #d0a177;
}
body{
  font-size: 12px !important;
  font-weight: 150;
}

</style>
<body class="hold-transition login-page" style="max-height: 400px; background: url(../dist/img/background.jpg) no-repeat; background-size: cover;">
 
 <!-- Content Wrapper. Contains page content -->

 <div class="">
 <nav class="navbar navbar-default navbar-static-top" >
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Link Ajman
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">{{trans('demo.login')}}</a></li>
                            <li><a href="{{ url('/register') }}">{{trans('demo.register')}}</a></li>
                        @else
                         <li><a href="{{ url('/profile') }}">
                                            الصفحة الشخصية
                                        </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <li>
                                        

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li> <form action="{{route('langaugea')}}" method="post">
                         {{csrf_field()}}
                             <select style="color: #777;background: rgba(204, 204, 204, 0);border: 0;margin-top: 11px;" name="langauge" id="formid">
                              <option value="ar" >عربى</option>
                              <option value="en" <?php if ( Session('locale') == 'en') echo "selected";?> >English</option>
                              
                        </select>
                        
                        </form></li>
                    </ul>
                </div>
            </div>
        </nav>
   
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
</div>

 
<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script type="text/javascript">
    $(document).ready(function(){
    $('#formid').change(function(){
     var locale = $(this).val();

     var _token =$("input[name=_token]").val();
       
            $.ajax({
                url: 'langauge',
                type: 'post',
                dataType: 'json',
                data: {
                    'locale':locale,
                    '_token':_token
                },
                    success:function(data){

                    },
                    error:function(data){
                    
                    },
                    beforSend:function(data){
                    
                    },
                    complete:function(data){
                    window.location.reload(true);
                    }
                });

    });
});
</script>
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>


  </body>
</html>