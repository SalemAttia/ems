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
          @include('user-employee.partial.ar.ul')
        </div>
      </div>

      <div>
       @if ( Session('locale') == 'en')
        @include('user-employee.partial.en.step1')
         @include('user-employee.partial.en.step2')
         @include('user-employee.partial.en.step3')
         @include('user-employee.partial.en.step4')
         @include('user-employee.partial.en.step5')
       @else
         @include('user-employee.partial.step1')
         @include('user-employee.partial.step2')
         @include('user-employee.partial.step3')
         @include('user-employee.partial.step4')
         @include('user-employee.partial.step5')
       @endif
        
       
     
    
  </div>
</form>
@endsection

