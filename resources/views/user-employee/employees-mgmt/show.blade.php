@extends('user-employee.employees-mgmt.base')
@section('title')
{{$title = 'profile'}}

@endsection
@section('action-content')
    <!-- Your Page Content Here -->
      <div class="row">
       <div id="manprcontent" class="col-md-4 col-sm-12 col-xs-12" style="<?php if ( Session('locale') == 'en') echo 'float: left;'; else echo 'float: right';?>">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset($employee->picture)}}" alt="User profile picture">

            <h3 class="profile-username text-center">{{$employee->firstname}} {{$employee->middlename}} {{$employee->last_name}}</h3>

            <p class="text-muted text-center"><?php $duties = \App\workexprince::where('employee_id','=',$employee->id)->select('duties')->first(); ?>@if($duties){{$duties->duties}}@endif</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-flag"></i> {{trans('demo.nationality')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>" style="font-weight: 300;font-size: 11px;">{{$employee->nationality}}</a>
              </li>
              @if($employee->Summary_of_enrollment)
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-user"></i>{{trans('demo.Summary_of_enrollment')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>" style="font-weight: 300;font-size: 11px;">{{$employee->Summary_of_enrollment}}</a>
              </li>
              @endif
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-users"></i> {{trans('demo.social_status')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>" style="font-weight: 300;font-size: 11px;">{{$employee->social_status}}</a>
              </li>
              

              <li class="list-group-item">
                <b style="font-weight: 500;font-size: 11px;"><i class="fa fa-phone"></i> {{trans('demo.phone1')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>" style="font-weight: 300;font-size: 11px;">{{$employee->phone1}}</a>
              </li>
              <li class="list-group-item">
                <b style="font-weight: 500;font-size: 11px;"><i class="fa fa-inbox"></i>{{trans('demo.email')}}</b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>" style="font-weight: 300;font-size: 11px;">{{$employee->email}}</a>
              </li>
              <li class="list-group-item">
              <style type="text/css">
                .abcd{
                  margin-left: 10px;
                }
              </style>
              <center>
            <?php $soci = \App\socialmeadi::where('employee_id' ,'=',$employee->id)->get(); ?>
              @if(count($soci) > 0)
                @foreach($soci as $value)
                  
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
                  @endif

              </center>
                  
                 
                
              </li>

            </ul>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{trans('demo.aboutemployee')}}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            

            <strong><i class="fa fa-map-marker margin-r-5"></i> {{trans('demo.address')}}</strong>

            <p class="text-muted">{{$employee->address}}</p>

           <!--  <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> المهارات</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>
 -->
            <hr>

            <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i>ملاحظات</strong>

            <p>{!!$employee->shortdesc!!}</p> -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-8 col-sm-12 col-xs-12" style="<?php if ( Session('locale') == 'en') echo 'float: right;'; else echo 'float: left';?>">
        <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
          <li style="<?php if ( Session('locale') == 'en') echo 'float: left;'; else echo 'float: right';?>" class="active"><a href="#timeline"  data-toggle="tab">{{trans('demo.aboutemployee')}}</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>

                <div class="timeline-item">
                  
                  <h3 class="timeline-header"><a href="#">{{trans('demo.personalinfo')}}</a></h3>

                  <div class="timeline-body">
                  <style type="text/css">
                    .ab li{
                      background: rgb(240, 240, 240);
                    }
                  </style>
                  <ul class="list-group list-group-unbordered ab">
                  <li class="list-group-item">
                      <b><i class="fa fa-user"></i> {{trans('demo.fullname')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->firstname}} {{$employee->middlename}} {{$employee->last_name}}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fa fa-globe"></i> {{trans('demo.nationality')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->nationality}}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fa fa-phone"></i> {{trans('demo.phone1')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->phone1}}</a>
                    </li>
                    @if($employee->phone2)
                    <li class="list-group-item">
                      <b><i class="fa fa-phone"></i> {{trans('demo.phone1')}} </b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->phone2}}</a>
                    </li>
                    @endif
                    
                    <li class="list-group-item">
                      <b><i class="fa fa-inbox"></i>{{trans('demo.address')}}</b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->address}}</a>
                    </li>
                    @if($employee->address2)
                    <li class="list-group-item">
                      <b><i class="fa fa-inbox"></i>{{trans('demo.address2')}}</b> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$employee->address2}}</a>
                    </li>
                    @endif

                  </ul>
                  </div>
                  
                </div>
              </li>
              <!-- END timeline item -->
           
              <!-- timeline item -->

              <li>
                <i class="fa fa-graduation-cap bg-yellow"></i>

                <div class="timeline-item">
                 

                  <h3 class="timeline-header"><a href="#">{{trans('demo.education')}}</a></h3>

                  <div class="timeline-body" dir="rtl">
                    <table class="table table-condensed" <?php if ( Session('locale') == 'en') echo 'dir="ltr"'; else echo 'dir="rtl"';?>>
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">{{trans('demo.scien')}}</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">{{trans('demo.dist')}}</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">{{trans('demo.spc')}}</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">{{trans('demo.yearof')}}</th>
                      </tr>
                      <?php $i = 1;?>
                      @foreach(\App\education::where('employee_id' ,'=',$employee->id)->get() as $valu) 
                      <tr style="font-size: 12px; text-align: center; font-weight: 200;">
                        <td>{{$i}}</td>
                        <td>{{$valu->degree_name}}</td>
                        <td>{{$valu->university_name}}</td>
                        <td>{{$valu->cgp}}</td>
                        <td>{{$valu->passing_year}}</td>
                        <?php $i++;?>
                      </tr> 
                
                  @endforeach
                      
                      
                      
                    </table>
                  </div>
                  
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-briefcase bg-purple"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#">{{trans('demo.workexp')}}</a></h3>
                  @if(count(\App\workexprince::where('employee_id' ,'=',$employee->id)->get()) > 0)
                  <div class="timeline-body">
                         <table class="table table-condensed">
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.work_practical_situation')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.employer')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.job_category')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.job_title')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.work_place')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.year_of_experience')}}</th>
                      </tr>
                      
                       <?php $i = 1;?>
                      @foreach(\App\workexprince::where('employee_id' ,'=',$employee->id)->get() as $valu) 
                      <tr style="font-size: 10px; text-align: center; font-weight: 150;">
                        <td>{{$i}}</td>
                        <td>{{$valu->work_type}}</td>
                        <td>{{$valu->company_name}}</td>
                        <td>{{$valu->work_section}}</td>
                        <td>{{$valu->duties}}</td>
                        <td>{{$valu->work_place}}</td>
                        <td>{{$valu->working_period}}</td>
                        <?php $i++;?>
                      </tr> 
                
                  @endforeach
                      
                    </table>
                  </div>
                  @endif
                </div>
              </li>
              <!-- END timeline item -->
              <!-- training activity -->
              <!-- timeline item -->
              @if(count(\App\training_activity::where('employee_id' ,'=',$employee->id)->get()) > 0)
              <li>
                <i class="fa fa-briefcase bg-purple"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#">{{trans('demo.training_activity')}}</a></h3>

                  <div class="timeline-body">
                         <table class="table table-condensed">
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.name_of_training')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.training_center')}}</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">{{trans('demo.training_date')}}</th>
                        
                      </tr>
                      
                       <?php $i = 1;?>
                      @foreach(\App\training_activity::where('employee_id' ,'=',$employee->id)->get() as $tra) 
                      <tr style="font-size: 10px; text-align: center; font-weight: 150;">
                        <td>{{$i}}</td>
                        <td>{{$tra->traninigname}}</td>
                        <td>{{$tra->destination}}</td>
                        <td>{{$tra->dateoftraninig}}</td>
                        
                        <?php $i++;?>
                      </tr> 
                
                  @endforeach
                      
                    </table>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              @endif
              <!-- end trainig activity -->
              @if($employee->shortdesc)
              <!-- timeline item -->
              <li>
                <i class="fa fa-file-text-o bg-green"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#">{{trans('demo.aboutemployee')}}</a></h3>

                  <div class="timeline-body">
                    <p style="font-size: 12px;">
                     {!!$employee->shortdesc!!}
                    </p>
                  </div>
                </div>
              </li>
              @endif
              <!-- END timeline item -->
              <?php $soci = \App\socialmeadi::where('employee_id' ,'=',$employee->id)->get(); ?>
              @if(count($soci) > 0)
              <!-- timeline item -->
              <li>
                <i class="fa fa-users" style="background: #3c8dbc !important; color: #fff;"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#">{{trans('demo.socialmedia')}}</a></h3>

                  <div class="timeline-body">
                     <ul class="list-group list-group-unbordered ab">
                  
                    @foreach(\App\socialmeadi::where('employee_id' ,'=',$employee->id)->get() as $valu) 
                       
                   <li class="list-group-item">
                      <b style="font-size: 12px;">
                    @if($valu->soicalmedia == 'تويتر')
                   <a class="btn btn-primary btn-twitter btn-sm" target="_blank" href="//{{$valu->soclink}}">
                    <i class="fa fa-twitter"></i>
                    </a>
                    @elseif($valu->soicalmedia == 'google-plus')
                    <a class="btn btn-danger btn-sm"  target="_blank" rel="publisher" href="//{{$valu->soclink}}">
                      <i class="fa fa-google-plus"></i>
                    </a>
                    @elseif($valu->soicalmedia == 'فيس بوك')
                    <a class="btn btn-primary btn-sm" target="_blank" rel="publisher" href="//{{$valu->soclink}}">
                    <i class="fa fa-facebook"></i>
                   </a>
                    @elseif($valu->soicalmedia == 'behance')
                    <a class="btn btn-warning btn-sm" target="_blank" rel="publisher" href="//{{$valu->soclink}}">
                     <i class="fa fa-behance"></i>
                   </a>
                    @elseif($valu->soicalmedia == 'لينكدان')
                     <a class="btn btn-primary btn-sm" target="_blank" rel="publisher" href="//{{$valu->soclink}}">
                    <i class="fa fa-linkedin"></i>
                    </a>
                    @elseif($valu->soicalmedia == 'githup')
                     <a class="btn btn-primary btn-sm" target="_blank" style="background: #000;" rel="publisher" href="//{{$valu->soclink}}">
                    <i class="fa fa-github"></i>
                    </a>
                    @endif
                    </b>
                    </a> <a class="<?php if ( Session('locale') == 'en') echo 'pull-right'; else echo 'pull-left';?>">{{$valu->soclink}}</a>
                    </li>
                  @endforeach
                    
                  </ul>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              @endif
              
            </ul>
          </div>
          <!-- /.tab-pane -->
        </div>
      </div>
    </div>
  </div> 
  <!-- ./Your Page Content Here -->

<center> <button  id="forprint" onClick="window.print();" class="btn btn-info"> {{trans('demo.print')}} <i class="fa fa-print"></i></button></center>
</section>
<!-- /.content -->
@endsection