@extends('employees-mgmt.base')

@section('action-content')
   <!-- Main content -->
    
      <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.update', ['id' => $employee->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

       @include('partial.edit.step1')
       @include('partial.edit.step2')
       @include('partial.edit.step3')
       @include('partial.edit.step4')
       @include('partial.edit.step5')
        
       
     
    
  </div>
</form>
@endsection

