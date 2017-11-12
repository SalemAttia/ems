@extends('layouts.app-template')
@section('title')
 {{$title = 'الصفحة الرئيسية'}}
@endsection
@section('css')
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" dir="rtl" style="background: url(../public/dist/img/background.jpg) 100% 100%; background-size: cover;">
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
            <span class="info-box-icon bg-aqua" style="background: #d2cabb !important;"><i class="fa fa-user"></i></span>

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
            <span class="info-box-icon bg-red" style="background-color: #e9b57b !important;"><i class="fa fa-users"></i></span>

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
            <span class="info-box-icon bg-green" style="background-color: #c0996d !important;"><i class="fa fa-female"></i></span>

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
            <span class="info-box-icon bg-yellow" style="background-color: #e6c7a2 !important;" ><i class="fa fa-male"></i></span>

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

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #f5c47d !important;"><i class="fa fa-file-pdf-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">سيرة ذاتية</span>
              <span class="info-box-number">{{$cv}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #713f28 !important;"><i class="fa fa-university"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مؤهلات تعليم جامعى</span>
              <span class="info-box-number">{{$collage}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #d8a257 !important;"><i class="fa fa-mortar-board"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مؤهلات دراسات عليا</span>
              <span class="info-box-number">{{$hightdegree}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #6c3417 !important;"><i class="fa fa-mortar-board"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مؤهلات ماجستير</span>
              <span class="info-box-number">{{$mastr}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #ffe3bd !important;"><i class="fa fa-mortar-board"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مؤهلات دكتوراه</span>
              <span class="info-box-number">{{$doc}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #b3834e !important;"><i class="fa fa-mortar-board"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مؤهلات ثانوية عامة</span>
              <span class="info-box-number">{{$hightschool}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #f8c27e !important;"><i class="fa fa-minus-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ما دون الثانوية</span>
              <span class="info-box-number">{{$none}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="background-color: #d0b57c !important;"> <i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" >لا يوجد خبرة عمل</span>
              <span class="info-box-number">{{$workexprincenone}}</span>
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
