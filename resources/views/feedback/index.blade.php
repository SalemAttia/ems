@extends('feedback.base')
@section('action-content')
<!-- Main content -->
<section class="content">
 
<!-- end header here -->


<!-- here -->
<!-- Your Page Content Here -->
<div class="row">
  <div class="col-xs-12">
    
    <div class="box">
    @if(Session::has('message'))
        <center>
             
        <p class="alert {{ Session::get('alert-class') }}">
        {{ Session::get('message') }}</p>
       
        </center>
         @endif 
      <div class="box-header">
      <div class="row">
      <div class="col-md-12">
      <a href="{{route('feedback.create')}}"  class="btn btn-primary pull-left" style="background: #b39c6a !important;">
         استبيان جديد
        </a>
      </div>
      </div>

    </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>الاسم</th>
              <th>وصف</th>
              <th>نتائج الا ستبيان</th>
              <th>ارسال</th>
              <th>buttons</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Feedforms as $Feedform)
            <tr>

              <td>{{ $Feedform->name }} </td>
              
              <td>{{ $Feedform->desc }}</td>
              
              <td><a href="{{url('/admin/feedback/'.$Feedform->id)}}" class="btn btn-success">نتائج</a></td>
              <td><a href="{{url('/admin/sendform/'.$Feedform->id)}}" class="btn btn-info">ارسال</a></td></td>
              <td>
               <form class="row" method="POST" action="{{ route('feedback.destroy', ['id' => $Feedform->id]) }}" onsubmit = "return confirm('Are you sure?')">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('feedback.edit', ['id' => $Feedform->id]) }}" class="btn btn-warning btn-margin">
                  <i class="fa fa-file"></i>
                </a>
                <button type="submit" class="btn btn-danger btn-margin">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach




        </tbody>

      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>

@endsection