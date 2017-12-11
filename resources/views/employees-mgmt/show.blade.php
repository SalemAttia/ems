@extends('employees-mgmt.base')
@section('action-content')
    <!-- Your Page Content Here -->
      <div class="row">
       <div id="manprcontent" class="col-md-4 col-sm-12 col-xs-12" style="float: right;">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
           @if($employee->picture)
                 <img class="profile-user-img img-responsive img-circle" src="{{asset('/admin/'.$employee->picture)}}" alt="User profile picture">
            @else
            @if($employee->gender == 'امرأة')
            <img class="profile-user-img img-responsive img-circle" src="{{asset('/avatars/fmale.png')}}" alt="User profile picture">
            @else
            <img class="profile-user-img img-responsive img-circle" src="{{asset('/avatars/avatar.png')}}" alt="User profile picture">
            @endif
           @endif
            

            <h3 class="profile-username text-center">{{$employee->firstname}} {{$employee->middlename}} {{$employee->last_name}}</h3>

            <p class="text-muted text-center"><?php $duties = \App\workexprince::where('employee_id','=',$employee->id)->select('duties')->first(); ?>@if($duties){{$duties->duties}}@endif</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-flag"></i> الجنسية </b> <a class="pull-left" style="font-weight: 300;font-size: 11px;">{{$employee->nationality}}</a>
              </li>
              @if($employee->Summary_of_enrollment)
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-user"></i> خلاصة القيد </b> <a class="pull-left" style="font-weight: 300;font-size: 11px;">{{$employee->Summary_of_enrollment}}</a>
              </li>
              @endif
              <li class="list-group-item">
                <b style="font-weight: 300;font-size: 11px;"><i class="fa fa-users"></i> الحالة الاجتماعية </b> <a class="pull-left" style="font-weight: 300;font-size: 11px;">{{$employee->social_status}}</a>
              </li>
              

              <li class="list-group-item">
                <b style="font-weight: 500;font-size: 11px;"><i class="fa fa-phone"></i> رقم الجوال </b> <a class="pull-left" style="font-weight: 300;font-size: 11px;">{{$employee->phone1}}</a>
              </li>
              <li class="list-group-item">
                <b style="font-weight: 500;font-size: 11px;"><i class="fa fa-inbox"></i>الايميل</b> <a class="pull-left" style="font-weight: 300;font-size: 11px;">{{$employee->email}}</a>
              </li>
               @if(\App\socialmeadi::where('employee_id' ,'=',$employee->id)->get())
              <li class="list-group-item">
              <style type="text/css">
                .abcd{
                  margin-left: 10px;
                }
              </style>
              <center>
               
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
                  

              </center>
                  
                 
                
              </li>
              @endif

            </ul>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">عن الموظف</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            
          
           <?php $mylanga = (new \App\helpers\langaugaes)->mylang();?>

            <strong><i class="fa fa-map-marker margin-r-5"></i> العنوان</strong>

            <p class="text-muted">{{$employee->address}}</p>
            @if($employee->langauges)
            @if ($employee->langauges != 'N;') 
            <?php $lang = unserialize($employee->langauges); ?>
            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> الغات</strong>

            <p>
            @foreach($lang as $la)
              <?php $la = strtolower($la)?>
              <span class="label label-info">{{$mylanga[$la]}}</span>
             @endforeach
            </p>
            
            @endif
            @endif
           @if($employee->shortdesc)
            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i>ملاحظات</strong>

            <p>{!!$employee->shortdesc!!}</p>
            @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-8 col-sm-12 col-xs-12" style="float: left;">
        <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
          <li style="float: right;"><a href="#timeline"  data-toggle="tab">عن الموظف</a></li>
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
                  
                  <h3 class="timeline-header"><a href="#">معلومات شخصية</a></h3>

                  <div class="timeline-body">
                  <style type="text/css">
                    .ab li{
                      background: rgb(240, 240, 240);
                    }
                  </style>
                  <ul class="list-group list-group-unbordered ab">
                  <li class="list-group-item">
                      <b><i class="fa fa-user"></i> الاسم كامل </b> <a class="pull-left">{{$employee->firstname}} {{$employee->middlename}} {{$employee->last_name}}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fa fa-globe"></i> الجنسية </b> <a class="pull-left">{{$employee->nationality}}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fa fa-phone"></i> الهاتف المتحرك 1 </b> <a class="pull-left">{{$employee->phone1}}</a>
                    </li>
                    @if($employee->phone2)
                    <li class="list-group-item">
                      <b><i class="fa fa-phone"></i> الهاتف المتحرك 2 </b> <a class="pull-left">{{$employee->phone2}}</a>
                    </li>
                    @endif
                    
                    <li class="list-group-item">
                      <b><i class="fa fa-inbox"></i>العنوان الرئيسى</b> <a class="pull-left">{{$employee->address}}</a>
                    </li>
                    @if($employee->address2)
                    <li class="list-group-item">
                      <b><i class="fa fa-inbox"></i>العنوان المؤقت</b> <a class="pull-left">{{$employee->address2}}</a>
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
                 

                  <h3 class="timeline-header"><a href="#"></a>التعليم</h3>

                  <div class="timeline-body" dir="rtl">
                    <table class="table table-condensed" dir="rtl">
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">المؤهل العلمي</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">جهة الدراسة</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">التخصص</th>
                        <th style="font-size: 12px; text-align: center; font-weight: 200;">سنة التخرج</th>
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
              @if(count(\App\workexprince::where('employee_id' ,'=',$employee->id)->get()) > 0)
              <li>
                <i class="fa fa-briefcase bg-purple"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#"></a>خبرات العمل السابقة</h3>

                  <div class="timeline-body">
                         <table class="table table-condensed">
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">الحالة العملية</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">جهة العمل الحالية</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">الفئة الوظيفية</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">المسمى الوظيفى</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">مكان العمل</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">سنوات الخبرة</th>
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
                </div>
              </li>
              <!-- END timeline item -->
              @endif
              <!-- training activity -->
              <!-- timeline item -->
              @if(count(\App\training_activity::where('employee_id' ,'=',$employee->id)->get()) > 0)
              <li>
                <i class="fa fa-briefcase bg-purple"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#"></a>الدورات التدريبية</h3>

                  <div class="timeline-body">
                         <table class="table table-condensed">
                      <tbody>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">اسم الدورة</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">جهة التدريب</th>
                        <th style="font-size: 10px; text-align: center; font-weight: 150;">تاريخ الالتحاق</th>
                        
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
                  

                  <h3 class="timeline-header"><a href="#"></a>نبذة مختصرة</h3>

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
                  

                  <h3 class="timeline-header"><a href="#"></a>التواصل</h3>

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
                    </a> <a class="pull-left">{{$valu->soclink}}</a>
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

<center> <button  id="forprint" onClick="window.print();" class="btn btn-info"> طباعة <i class="fa fa-print"></i></button></center>
</section>
<!-- /.content -->
@endsection