@extends('system-mgmt.social.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title"></h3>
        </div>
        <div class="col-sm-8">
         <form class="form-inline" role="form" method="POST" action="{{ route('social.store') }}">
            {{ csrf_field() }}
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            <button class="btn btn-primary" type="submit" style="color: #fff;background-color: #b39c6a;border-color: #a18c5f;">حفظ</button>
          </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      
    
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th  class="sorting" tabindex="0" aria-controls="example2"  colspan="1" aria-label="Department: activate to sort column ascending">موقع التواصل</th>
                <th  aria-controls="example2" rowspan="1"aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <style type="text/css">
              td,th{
                text-align: center;
              }
              .dataTables_info{
                float: left;
                color: #b39c6a;
              }
            </style>
            <tbody>
            @foreach ($socials as $social)
                <tr role="row" class="odd">
                  <td>{{ $social->name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('social.destroy', ['id' => $social->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('social.edit', ['id' => $social->id]) }}" class="btn btn-warning  btn-margin">
                        تعديل
                        </a>
                        <button type="submit" class="btn btn-danger  btn-margin">
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($socials)}} of {{count($socials)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $socials->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
  
@endsection