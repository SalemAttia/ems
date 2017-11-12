@extends('system-mgmt.report.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
          <div class="row">

            <div class="col-sm-6 col-sm-offset-3 col-xs-12">
            <center>
             <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
                {{ csrf_field() }}
                <input value="{{$searchingVals['jobtitle']}}" type="hidden" name="searchby[jobtitle]">
                <input value="{{$searchingVals['gender']}}" type="hidden" name="searchby[gender]">
                <input value="{{$searchingVals['qualification']}}" type="hidden" name="searchby[qualification]">
                <input value="{{$searchingVals['social_status']}}" type="hidden" name="searchby[social_status]">
                <input value="{{$searchingVals['The_owners_of_inspiration']}}" type="hidden" name="searchby[The_owners_of_inspiration]">

                <input value="{{$searchingVals['passing_year']}}" type="hidden" name="searchby[passing_year]">
                <input value="{{$searchingVals['working_period']}}" type="hidden" name="searchby[working_period]">
                <input value="{{$searchingVals['work_type']}}" type="hidden" name="searchby[work_type]">
                <input value="{{$searchingVals['work_section']}}" type="hidden" name="searchby[work_section]">
                <input value="{{$searchingVals['work_place']}}" type="hidden" name="searchby[work_place]">
                
               <button style="" type="submit" class="btn btn-primary pull-right">
                  Export to Excel
                </button >
            </form>
               
                <form class="form-horizontal" role="form" method="POST" action="{{ route('report.pdf') }}">
                {{ csrf_field() }}
                <input value="{{$searchingVals['jobtitle']}}" type="hidden" name="searchby[jobtitle]">
                <input value="{{$searchingVals['gender']}}" type="hidden" name="searchby[gender]">
                <input value="{{$searchingVals['qualification']}}" type="hidden" name="searchby[qualification]">
                <input value="{{$searchingVals['social_status']}}" type="hidden" name="searchby[social_status]">
                <input value="{{$searchingVals['The_owners_of_inspiration']}}" type="hidden" name="searchby[The_owners_of_inspiration]">
                <input value="{{$searchingVals['passing_year']}}" type="hidden" name="searchby[passing_year]">
                <input value="{{$searchingVals['working_period']}}" type="hidden" name="searchby[working_period]">
                <input value="{{$searchingVals['work_type']}}" type="hidden" name="searchby[work_type]">
                <input value="{{$searchingVals['work_section']}}" type="hidden" name="searchby[work_section]">
                <input value="{{$searchingVals['work_place']}}" type="hidden" name="searchby[work_place]">
                <button style="" type="submit" class="btn btn-primary pull-left">
                  Export to PDF
                </button>
            </form>
                
              
            </center>
              
            </div>
           
          </div>
        </div>
        <!-- /.box-header -->
        
          <!-- /.box-header -->
        @include('system-mgmt.report.search')

  
</div>
<!-- end header here -->


<!-- here -->
<!-- Your Page Content Here -->
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">قائمة الموظفين</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>الاسم</th>
              <th>الصورة</th>
              <th class="hidden-xs">الجنسية</th>
              <th>رقم التليفون</th>
              <th class="hidden-xs">السيرة الذاتية</th>
              <th>الحساب الشخصى</th>
              <th>buttons</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)
                <tr>
                
                  <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->last_name }} </td>
                  <td><img src="{{asset($employee->picture)}}"></td>
                  <td class="hidden-xs">{{ $employee->nationality }}</td>
                  <td>{{ $employee->phone1 }}</td>
                  <td class="hidden-xs"><a href="{{url('download/'.$employee->cv)}}" class="fa fa-download"></a></td>
                   <td><a href="{{url('employee-management/'.$employee->id)}}" class="fa fa-user" fa-lg style="width: 50px; height: 50px;"></a></td>
                   <td>
                   <form class="row" method="POST" action="{{ route('employee-management.destroy', ['id' => $employee->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('employee-management.edit', ['id' => $employee->id]) }}" class="btn btn-warning btn-margin">
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