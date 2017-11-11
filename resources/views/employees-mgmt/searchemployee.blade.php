 <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="box-title"></h3>
            </div>
            <div class="col-sm-4">
              <a style="background: #b39c6a;border: #a18c5f;" class="btn btn-primary pull-left" href="{{ route('employee-management.create') }}">اضافة موظف</a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box box-default">
          <div class="box-header with-border">
            <button type="button" class="btn btn-box-tool pull-left" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <h3 class="box-title">البحث</h3>

            <div class="box-tools pull-left">

            </div>
          </div>
          <!-- /.box-header -->
           <form method="POST" action="{{ route('employee-management.search') }}">
         {{ csrf_field() }}
          <div class="box-body" style="display: block;">
            <div class="row">
              <div class="col-md-4" style="float: right;">
                <div class="form-group" dir="rtl">
                  <label for="inputfirstname" class="col-sm-12 control-label" style="float: right;">الفئة الوظيفية</label>
                  <div class="col-sm-12" style="float: right;">
                     
                      <select name="searchby[jobtitle]" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                       <option value="" <?php if($searchingVals['jobtitle'] == null) echo "selected"; ?>>الكل</option>
                         @foreach(\App\position::get() as $position)
                        <option value="{{$position->name}}" <?php if($searchingVals['jobtitle'] == $position->name) echo "selected";?> >{{$position->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>
              
            <!--   <div class="col-md-4" style="float: right;">
                <div class="form-group" style="padding: 6px 12px;">
                  <label class="filter-col" style="margin-right:0;" for="pref-perpage">مكان العمل</label>
                  <select id="pref-perpage" name="searchby[place]" class="form-control">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                  </select>                                
                </div> <!-- form group [rows] -->
              <!-- </div>  -->

             <div class="col-md-4" style="float: right;">
              <div class="form-group" style="padding: 6px 12px;">
                <label class="filter-col" style="margin-right:0;" for="pref-perpage">الجنس</label>
                <select id="pref-perpage" class="form-control" name="searchby[gender]">
                <option value="" <?php if($searchingVals['gender'] == null) echo "selected"; ?>>الكل</option>
                  <option value="رجل" <?php if($searchingVals['gender'] == 'رجل') echo "selected"; ?> >رجل</option>
                  <option value="امرأة" <?php if($searchingVals['gender'] == 'امرأة') echo "selected"; ?> >امرأة</option>
                  

                </select>                                
              </div> <!-- form group [rows] -->
            </div>
            <div class="col-md-4" style="float: right;">
              <div class="form-group" style="padding: 6px 12px;">
                <label class="filter-col" style="margin-right:0;" for="pref-perpage">الحالة الاجتماعية</label>
                <select id="pref-perpage" name="searchby[social_status]" class="form-control">
                <option value="" <?php if($searchingVals['social_status'] == null) echo "selected"; ?> >الكل</option>
                  <option value="متزوج" <?php if($searchingVals['social_status'] == 'متزوج') echo "selected"; ?> >متزوج</option>
                  <option value="عزباء/اعزب" <?php if($searchingVals['social_status'] == 'عزباء/اعزب') echo "selected"; ?> >عزباء/اعزب</option>
                  <option value="مطلق/مطلقة" <?php if($searchingVals['social_status'] == 'مطلق/مطلقة') echo "selected"; ?> >مطلق/مطلقة</option>
                  <option value="ارملة/ارمل" if($searchingVals['social_status'] == 'ارملة/ارمل') echo "selected"; ?> >ارملة/ارمل</option>
                  
                </select>                                
              </div> <!-- form group [rows] -->
            </div>
            <div class="col-md-4" style="float: right;">
              <div class="form-group" style="padding: 6px 12px;">
                <label class="filter-col" style="margin-right:0;" for="pref-perpage">المؤهل</label>
                <select id="pref-perpage" name="searchby[qualification]" class="form-control">
                <option value="" <?php if($searchingVals['qualification'] == null) echo "selected"; ?>>الكل</option>
                   @foreach (\App\degree::get() as $deg)
                          <option value="{{$deg->name}}" <?php if($searchingVals['qualification'] == $deg->name) echo "selected"; ?> >{{$deg->name}}</option>
                 @endforeach
                  
                </select>                                
              </div> <!-- form group [rows] -->
            </div>

            <div class="col-md-4" style="float: right;">
              <div class="form-group" style="padding: 6px 12px;">
                <label class="filter-col" style="margin-right:0;" for="pref-perpage">أصحاب الهمم </label>

                <select id="pref-perpage" class="form-control" name="searchby[The_owners_of_inspiration]">
                <option value="" <?php if($searchingVals['The_owners_of_inspiration'] == null) echo "selected"; ?>>الكل</option>
                  <option value="نعم" <?php if($searchingVals['The_owners_of_inspiration'] == 'نعم') echo "selected"; ?> >نعم</option>
                  <option value="لا" <?php if($searchingVals['The_owners_of_inspiration'] == 'لا') echo "selected"; ?> >لا</option>
                  

                </select>   
                                  
              </div> <!-- form group [rows] -->
            </div>
            <!-- row2 end -->
          </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         <center>
           <button style="background: #b39c6a;border: #a18c5f;" type="submit" class="btn btn-primary pull-left">
            بحث
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            
          </button>
        </center>


      </div>
    </div>
    </form>
  </div>