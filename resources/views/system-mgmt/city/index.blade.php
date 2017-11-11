@extends('system-mgmt.city.base')
@section('action-content')
    <!-- Main content -->
    <style type="text/css">
              td,th{
                text-align: center;
              }
              .dataTables_info{
                float: left;
                color: #b39c6a;
              }
            </style>

    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title"></h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary"  style="color: #fff;background-color: #b39c6a;border-color: #a18c5f;" href="{{ route('city.create') }}">اضافة امارة جديدة</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
     
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th  class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="city: activate to sort column ascending">اسم الامارة</th>
                
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            {{$cities}}
            @foreach ($cities as $city)
                <tr role="row" class="odd">
                  <td>{{ $city->name }}</td>
                  
                  <td>
                    <form class="row" method="POST" action="{{ route('city.destroy', ['id' => $city->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('city.edit', ['id' => $city->id]) }}" class="btn btn-warning btn-margin">
                        تعديل
                        </a>
                        <button type="submit" class="btn btn-danger btn-margin">
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($cities)}} of {{count($cities)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $cities->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

@endsection