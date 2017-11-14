@extends('layouts.app-template')
@section('title')
{{$title = 'ادارة الموظفين'}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/emlist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/newemployee.css')}}">
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" dir="rtl">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="float: left;">


      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>الصفحة الرئيسية</a></li>
        <li>موظفين</li>
        @if($new)
        <li>{{$new}}</li>
        @endif
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
@section('js')


@endsection