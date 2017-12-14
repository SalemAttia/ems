@extends('user-employee.employees-mgmt.base')
@section('title')
{{$title = 'EditProfile'}}

@endsection

@section('action-content')
   <!-- Main content -->
    
      <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', ['id' => $employee->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <!-- Your Page Content Here -->
      <div class="row form-group">
        <div class="col-xs-12">
         @include('user-employee.partial.ar.ul')
        </div>
      </div>

      <div>
      @if ( Session('locale') == 'en')
        @include('user-employee.partial.edit.en.step1')
         @include('user-employee.partial.edit.en.step2')
         @include('user-employee.partial.edit.en.step3')
         @include('user-employee.partial.edit.en.step4')
         @include('user-employee.partial.edit.en.step5')
       @else

       @include('user-employee.partial.edit.step1')
       @include('user-employee.partial.edit.step2')
       @include('user-employee.partial.edit.step3')
       @include('user-employee.partial.edit.step4')
       @include('user-employee.partial.edit.step5')
      @endif
       
     
    
  </div>
</form>
@endsection

