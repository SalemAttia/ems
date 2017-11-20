@extends('user-employee.employees-mgmt.base')
@section('title')
{{$title = 'profile'}}

@endsection
@section('action-content')
   <!-- Main content -->
    
      <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
      <!-- Your Page Content Here -->
      <div class="row form-group">
        <div class="col-xs-12">
          <ul class="nav nav-pills nav-justified thumbnail setup-panel">
            <li class="active" style="border-left: 1px solid #b39c6a;"><a href="#step-1">
              <h4 class="list-group-item-heading">الخطوة الاولى </h4>
              <p class="list-group-item-text">المعلومات الاساسية</p>
            </a></li>
            <li class="disabled"><a href="#step-2" style="border-left: 1px solid #b39c6a;">
              <h4 class="list-group-item-heading">الخطوة الثانية</h4>
              <p class="list-group-item-text">معلومات التعليم</p>
            </a></li>
            <li class="disabled"><a href="#step-3" style="border-left: 1px solid #b39c6a;">
              <h4 class="list-group-item-heading">الخطوة الثالثة</h4>
              <p class="list-group-item-text">خبرات العمل</p>
            </a></li>
            <li class="disabled"><a href="#step-4" style="border-left: 1px solid #b39c6a;">
              <h4 class="list-group-item-heading">الخطوة الرابعة</h4>
              <p class="list-group-item-text">نبذة مختصرة</p>
            </a></li>
            <li class="disabled"><a href="#step-5">
              <h4 class="list-group-item-heading">الخطوة الخامسة</h4>
              <p class="list-group-item-text">وسائل التواصل</p>
            </a></li>


          </ul>
        </div>
      </div>

      <div>

       @include('user-employee.partial.step1')
       @include('user-employee.partial.step2')
       @include('user-employee.partial.step3')
       @include('user-employee.partial.step4')
       @include('user-employee.partial.step5')
        
       
     
    
  </div>
</form>
@endsection

