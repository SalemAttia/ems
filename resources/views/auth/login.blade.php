<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee |  @yield('title')</title>
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
</style>
<body class="hold-transition login-page" style="max-height: 400px; background: url(../public/dist/img/background.jpg) 100% 100%;">
<div class="login-box" >
  <div class="login-logo">
    <a href="#"><b>Employee</b>EM</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="padding: 40px;">
    <p class="login-box-msg">تسجيل الدخول</p>
   
     @if ($errors->has('password'))
   <center>
    <span class="help-block">
        <strong>كلمة السر غير صحيحة</strong>
    </span>   
   </center>
              
    @endif
    @if ($errors->has('email'))
              <center>
                  <span class="help-block">
                <p>الايمايل | كلمة السر غير صحيح</p>
              </span>
              </center>
    @endif
   
  
   <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

      <div class="form-group has-feedback">
        <input style="font-size: 11px;" type="email" name="email" dir="rtl" class="form-control" placeholder="البريد الالكترونى">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input style="font-size: 11px;" name="password" type="password" dir="rtl" class="form-control" placeholder="كلمة المرور">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label style="font-size: 11px;">
              <input type="checkbox" > تذكرنى
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button style="font-size: 10px;" type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

   <!--  <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
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