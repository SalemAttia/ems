  <!-- Your Page Content Here -->
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body emlistss">
          <div class="row">
         @foreach ($employees as $employee)
         <!--  item search -->
            <div class="col-lg-3 col-sm-4 col-xs-12" style="float: right; ">

              <div class="card hovercard" style="box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);">
                <div class="cardheader">

                </div>
                <div class="avatar">
                  <img alt="" src="{{asset('/company/'.$employee->picture)}}">
                </div>
                <div class="info">
                  <div class="title">
                    <a target="_blank" href="{{url('company/'.$employee->id)}}">{{ $employee->firstname }} {{$employee->middlename}}</a>
                  </div>
                  <div class="desc"><?php $duties = \App\workexprince::where('employee_id','=',$employee->id)->select('duties')->first(); ?>{{$duties->duties}}</div>
                  <div class="desc">{{$employee->address}}</div>
                  <div class="desc">{{$employee->phone1}}</div>
                </div>
                <div class="bottom">
                @foreach(\App\socialmeadi::where('employee_id' ,'=',$employee->id)->get() as $value)
                  
                   @if($value->soicalmedia == 'تويتر')
                   <a class="btn btn-primary btn-twitter btn-sm" target="_blank" href="//{{$value->soclink}}">
                    <i class="fa fa-twitter"></i>
                    </a>
                    @elseif($value->soicalmedia == 'google-plus')
                    <a class="btn btn-danger btn-sm"  target="_blank" rel="publisher" href="//{{$value->soclink}}">
                      <i class="fa fa-google-plus"></i>
                    </a>
                    @elseif($value->soicalmedia == 'فيس بوك')
                    <a class="btn btn-primary btn-sm" target="_blank" rel="publisher" href="//{{$value->soclink}}">
                    <i class="fa fa-facebook"></i>
                   </a>
                    @elseif($value->soicalmedia == 'behance')
                    <a class="btn btn-warning btn-sm" target="_blank" rel="publisher" href="//{{$value->soclink}}">
                     <i class="fa fa-behance"></i>
                   </a>
                    @elseif($value->soicalmedia == 'لينكدان')
                     <a class="btn btn-primary btn-sm" target="_blank" rel="publisher" href="//{{$value->soclink}}">
                    <i class="fa fa-linkedin"></i>
                    </a>
                    @elseif($value->soicalmedia == 'githup')
                     <a class="btn btn-primary btn-sm" target="_blank" style="background: #000;" rel="publisher" href="//{{$value->soclink}}">
                    <i class="fa fa-github"></i>
                    </a>
                    @endif

                  @endforeach
                 
            </div>
          </div>

        </div>
        <!-- end item search  -->
        @endforeach
      </div>
      <center>
        <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">عرض   {{count($employees)}} من {{count($employees)}} موظفين</div>
        </div>
        <style type="text/css">
          .dataTables_paginate{
            float: left;
          }
          .dataTables_info{
            line-height: 5;
          }
          .card .title a{
            font-size: 14px;
          }
        </style>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $employees->links() }}
          </div>
        </div>
      </div>
      </center>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
<!-- endhere -->