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

       @include('partial.edit.step1')
       @include('partial.edit.step2')
       @include('partial.edit.step3')
       @include('partial.edit.step4')
       @include('partial.edit.step5')
        
       
     
    
  </div>
</form>
@endsection

