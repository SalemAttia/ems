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
  @if ( Session('locale') == 'en')
  <link rel="stylesheet" href="{{asset('dist/css/en/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/enstyle.css')}}">
  <style type="text/css">
    body::-webkit-scrollbar {
  width: 5px;
  display: block;
}
body::-webkit-scrollbar-track {
  background: #ecf0f5;
  margin-left: 10px;
}
body::-webkit-scrollbar-thumb{
  background: #b39c6a;
}
  </style>
  @else

  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/mystyle.css')}}">
  
  @endif

  @yield('css')
  
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini"  <?php if ( Session('locale') == 'en') echo 'dir="ltr" lang="en"'; else echo 'dir="rtl" lang="ar"';?>>
<div class="wrapper">

    <!-- Main Header -->
    @include('layouts.headeruser')
    <!-- Sidebar -->
    @include('layouts.sidebaruseremployee')
    @yield('content')
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
    <!-- ./wrapper -->
   
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->

<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/vue-resource.js')}}"></script>
<script src="{{asset('js/myvue.js')}}"></script>
<!-- AdminLTE App -->
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
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- any blugins here -->
 @yield('js')
<script type="text/javascript">
    $("#pop").popover();
    $("#pop2").popover();
</script>
 
  </body>
</html>