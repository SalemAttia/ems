@extends('layouts.app-template')
@section('title')
 {{$title = 'الصفحة الرئيسية'}}
@endsection
@section('css')
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small> <i class="fa fa-dashboard"></i> الصفحة الرئيسية</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
         <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">المديرين</span>
              <span class="info-box-number">{{$users}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">جميع الموظفين</span>
              <span class="info-box-number">{{$allemployee}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-female"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الموظفين النساء</span>
              <span class="info-box-number">{{$women}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-male"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الموظفين الرجال</span>
              <span class="info-box-number">{{$men}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row1 -->
         <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua" style="background-color: #b39c6a !important;"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> الفئات الوظيفية</span>
              <span class="info-box-number">{{$position}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background: #e2dac5 !important;"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">المؤهلات</span>
              <span class="info-box-number">{{$degree}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green" style="background-color: #decc9c !important;"><i class="fa fa-hand-peace-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">اصحاب الهمم</span>
              <span class="info-box-number">{{$currant}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
        <span class="info-box-icon bg-yellow" style="    background-color: #f9ca80 !important;"><i class="fa fa-heart-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">المتطوعين</span>
              <span class="info-box-number">{{$old}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row1 -->
    

      <!-- \. end page Content .\ -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
@endsection
@section('js')
@endsection
