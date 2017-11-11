@extends('layouts.app-template')
@section('title')
{{$title = 'ادارة الموقع'}}
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" dir="rtl">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <center>
    @if(Session::has('messagea'))
              <div class="alert {{ Session::get('m-classa') }} alert-dismissible fade in" style="margin: 20px 30px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong> {{ Session::get('messagea') }}
                    </div>
                @endif
    </center>
      <h1 style="float: left;">
     

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>الصفحة الرئيسية</a></li>
        <li><a href="{{url('/system-management/social')}}">مواقع التواصل</a></li>
      </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      
      @yield('action-content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection