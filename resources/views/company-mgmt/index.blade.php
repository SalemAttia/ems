@extends('company-mgmt.base')
@section('action-content')
    <!-- Main content -->
   
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title"></h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" style="color: #fff;background-color: #b39c6a;border-color: #a18c5f;" href="{{ route('company-management.create') }}">اضافة شركة</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
     <!-- search here -->
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th  class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">الاسم </th>
                <th  class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">البريد الالكترونى</th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">الاسم الاول</th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">الاسم الاخير</th>
                <th  aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            <style type="text/css">
              td,th{
                text-align: center;
              }
              .dataTables_info{
                float: left;
                color: #b39c6a;
              }
            </style>
            @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td class="hidden-xs">{{ $user->email }}</td>
                  
                  <td>
                    <form class="row" method="POST" action="{{ route('company-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('company-management.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-margin">
                        تعديل
                        </a>
                       
                         <button type="submit" class="btn btn-danger">
                          حذف
                        </button>
                       
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($users)}} of {{count($users)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
 
@endsection