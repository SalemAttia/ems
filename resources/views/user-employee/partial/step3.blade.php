<div class="row setup-content" id="step-3">
        <div class="col-xs-12">
          <div class="col-md-12 well text-center">
            <div class="col-md-8  col-sm-offset-2">
              <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 15px;"> الخطوة الثالثة</h1>
              <h3 style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 14px;" >خبرات العمل</h3><hr class="m-t-0">
              <div class="row">

               <div class="col-sm-6 col-xs-6"  style="float: right;">
                  <div class="form-group">
                    <label for="c_name" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;">الحالة العملية</label>
                       <select name="work_type[]" class="form-control">
                      <option value="">الحالة العملية</option>
                      @foreach(\App\Department::get() as $dep)
                        <option value="{{$dep->name}}">{{$dep->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-sm-6 col-xs-6" style="float: left;">
                  <div class="form-group">
                    <label for="c_name" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;">جهة العمل الحالية</label>
                    <input type="text"  dir="rtl" class="form-control" id="c_name" name="company_name[]" placeholder="جهة العمل">
                  </div>
                </div>
                 <div class="col-sm-6 col-xs-6" style="float: left;">
                  <div class="form-group">
                    <label style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;" for="duty">المسمى الوظيفى</label>
                    <input type="text" name="duties[]" class="form-control" id="duty" placeholder="المسمى الوظيفى">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6" style="float: right;">
                  <div class="form-group">
                    <label style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;" for="duty">الفئة الوظيفية</label>
                      <select name="work_section[]" class="form-control">
                      @foreach(\App\position::get() as $pos)
                        <option value="{{$pos->name}}">{{$pos->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                

                <div class="col-sm-6 col-xs-6" style="float: left;">
                  <div class="form-group">
                    <label for="work_hour" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;">سنوات الخبرة</label>
                    <select name="working_period[]" class="form-control">
                     <option value="لايوجد">لايوجد</option>
                     <option value="سنة واحدة">سنة واحدة</option>
                     <option value="سنتين">سنتين</option>
                     <option value="3 سنوات">3 سنوات</option>
                     <option value="4 سنوات">4 سنوات</option>
                     <option value="5 سنوات">5 سنوات</option>
                     <option value="اكثر من 5 سنوات">اكثر من 5 سنوات</option>
                      
                      </select>
                    
                  </div>
                </div>
               
                <div class="col-sm-6 col-xs-6" style="float: right;">
                  <div class="form-group">
                    <label style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;" for="supervisor">مكان العمل</label>
                    <select name="work_place[]" class="form-control">
                      
                      @foreach(\App\City::get() as $city)
                        <option value="{{$city->name}}">{{$city->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="clearfix"></div>
                <center>
                  <button id="add_rowt" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>اضافة خبرات سابقة</button>
                  <a id="delete_rowt" class="btn btn-danger pull-right">حذف صف</a>
                </center>
                <div>
                <div class="cearfix"></div>
                
                 
                  

                </div>
               
             </div>


           </div>
           <!-- here -->
            <div class="col-xs-12">
                 <div class="table-responsive">
                   <table class="table table-bordered table-hover" id="tab_logict">

                    <tbody>
                      <tr id='addrt0'>

                      </tr>
                      <tr id='addrt1'></tr>
                    </tbody>
                  </table>

                 </div> 
                </div>
                 <div class="clearfix"></div>
                <center>
                <button style="background-color: #b39c6a !important; border-color: #a18c5f;" type="button" id="activate-step-back-2" class="btn btn-primary btn-md">الخطوة السابقة << </button>
                 <button id="activate-step-4" type="button" style="background-color: #b39c6a !important; border-color: #a18c5f;" class="btn btn-primary btn-md">الخطوة التالية >></button>
               </center>
           <!-- endhere -->
         </div>


       </div>
     </div>