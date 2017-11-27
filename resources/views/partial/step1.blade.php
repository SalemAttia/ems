
        <div class="row setup-content" id="step-1" >
          <div class="col-xs-12">
            <div class="col-md-12 well" style="background: #fff;">
              <div class="col-sm-8 col-sm-offset-2">
                <h3 class="m-t-0" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;">المعلومات الاساسية</h3><hr class="m-t-0">

                <div class="row">
                  <div class="col-sm-4 col-xs-12" style="float: right;">
                    <div class="form-group">
                      <label for="first_name">الاسم الاول<sup class="color-red ">*</sup></label>
                      <input dir="rtl" type="text" style="width: 98%;" class="form-control" id="first_name" name="firstname" placeholder="الاسم الاول">
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-12" style="float: right;">
                    <div class="form-group">
                      <label for="m_name">الاسم الاوسط <sup class="color-red ">*</sup></label>
                      <input type="text" style="width: 98%;" class="form-control" id="m_name" dir="rtl" name="middlename" placeholder="الاسم الاوسط">
                    </div>
                  </div>

                  <div class="col-sm-4 col-xs-12" style="float: right;">
                    <div class="form-group">
                      <label for="l_name">الاسم العائلة <sup class="color-red ">*</sup></label>
                      <input type="text" class="form-control"  id="last_name" dir="rtl" name="last_name" placeholder="الاسم العائلة">
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group">
                      <label class="filter-col" style="margin-right:0;" for="pref-perpage">الجنس</label>
                      <select id="pref-perpage" class="form-control" name="gender">
                        <option value="رجل">ذكر</option>
                        <option value="امرأة">انثى</option>
                      </select>  
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label for="l_name">تاريخ الميلاد <sup class="color-red ">*</sup></label>
                       <div class="input-group date">
                                <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                            </div>
                         
                            <input required="" type="text" class="form-control" placeholder="شهر/يوم/سنة" onfocus="(this.type='date')"  class="form-control pull-right" name="birthdate" placeholder="" id="birthDate" required />
                                </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label for="nationality">الجنسية<sup class="color-red ">*</sup></label>
                      
                      
                      <select name="nationality" class="form-control" v-model="nationality" v-on:change="nationalitychange()">
                      <option value="">الجنسية</option>
                      @include('partial.countries')
                      </select>
  
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group">
                      <label for="city_id">خلاصة القيد <button type="button" style="background: #fff;border: 0;" id="pop2" title="" data-content="<b>لمواطني دولة الامارات فقط</b>" data-placement="left" data-toggle="popover" class="fa fa-info-circle" data-original-title="" data-html="true"></button><sup class="color-red ">*</sup></label>
                      <select name="Summary_of_enrollment" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true" v-bind:disabled="nationality">
                      <option value="">خلاصة القيد</option>
                      @foreach(\App\City::get() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group">
                      <label class="filter-col" style="margin-right:0;" for="pref-perpage">الحالة الاجتماعية</label>
                      <select id="pref-perpage" name="social_status" class="form-control">

                        <option value="متزوج">منزوجة/متزوج</option>
                        <option value="عزباء/اعزب">عزباء/اعزب</option>
                        <option value="مطلق/مطلقة" >مطلق/مطلقة</option>
                        <option value="ارملة/ارمل" >ارملة/ارمل</option>
                      </select>  
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label for="phone">الهاتف المتحرك<sup class="color-red ">*</sup></label>
                      <input type="number" class="form-control" id="phone" name="phone1" placeholder="الهاتف المتحرك" dir="rtl">
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group">
                      <label for="phone2">الهاتف المتحرك 2<sup class="color-red "></sup></label>
                      <input type="text" class="form-control" name="phone2" id="phone2" value="" placeholder="الهاتف المتحرك 2" dir="rtl">
                    </div>
                  </div>
                   <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label for="email">الايميل <sup class="color-red "></sup></label>
                      <input type="email" dir="rtl" class="form-control" name="email" id="email" placeholder="الايميل">
                    </div>
                  </div>

                   
                  <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group">
                      <label class="filter-col" style="margin-right:0;" for="volunteer">هل تريد العمل ضمن برامج المتطوعين</label>
                       <!-- radio -->
                      <div class="">
                        <label>
                          <input type="radio" name="volunteer" value="نعم" class="flat-red" checked> نعم
                        </label>
                        <label>
                          <input type="radio" name="volunteer" value="لا" class="flat-red"> لا
                        </label>
                        
                      </div>
                       
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label class="filter-col" style="margin-right:0;" for="hamam">أصحاب الهمم <button type="button" style="background: #fff;border: 0;" id="pop" title="" data-content="<b>المعروفين سابقاً بذوي الإعاقة/الاحتياجات الخاصة
وفقاً للسياسة الوطنية لتمكين ذوي الإعاقة، قررت حكومة دولة الإمارات إعادة تسمية هذه الفئة بأصحاب الهمم، وذلك اعترافاً بجهودها الملحوظة في تحقيق الإنجازات، والتغلب على جميع التحديات في مختلف الميادين الحيوية في الدولة.
</b>" data-placement="left" data-toggle="popover" class="fa fa-info-circle" data-original-title="" data-html="true"></button> </label>
                       
                      <div class="">
                        <label>
                          <input type="radio" name="The_owners_of_inspiration" value="نعم" class="flat-red"> نعم
                        </label>
                        <label>
                          <input type="radio" name="The_owners_of_inspiration" value="لا" class="flat-red" checked=""> لا
                        </label>
                        
                      </div> 
                    </div>
                  </div>
                  
                  <input type="hidden" name="jobtitle" value="null">
                 <!--  <div class="col-sm-6 col-xs-6" style="float: right;">
                    <div class="form-group">
                      <label for="phone">الفئة الوظيفية<sup class="color-red ">*</sup></label>
                      <select name="jobtitle" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                         @foreach(\App\position::get() as $position)
                        <option value="{{$position->name}}">{{$position->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> -->
                 
                  
                   <input type="hidden" name="qualification" value="null">
                   <!-- <div class="col-sm-6 col-xs-6" style="float: left;">
                    <div class="form-group" >
                      <label for="dept_id">المؤهل<sup class="color-red "></sup></label>

                      <select name="qualification" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                      @foreach(\App\degree::get() as $degreea)
                        <option value="{{$degreea->name}}">{{$degreea->name}}</option>
                        @endforeach
                      </select>

                    </div>
                  </div> -->
                
                </div>

                <div class="form-group">
                  <label for="pre_address">العنوان الحالى</label>
                  <textarea class="form-control" id="present_address" name="address" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="par_address">عنوان مؤقت</label>
                  <textarea class="form-control" id="parmanent_address" name="address2" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="picture">الصورة الشخصية</label>
                  <input type="file" accept="image/*" name="picture" onchange="loadFile(event)">
                  <small id="fileHelp" class="text-muted"><img src="http://hrm.bdtask.com/hrm_v_2/Demo/assets/img/user/employee.png" id="output" style="height: 150px;width: 200px" class="img-thumbnail">
                  </small>
                </div>
              </div>
              <div class="clearfix"></div>
              <center>
                <button style="background-color: #b39c6a;border-color: #a18c5f;" id="activate-step-2" type="button" class="btn btn-primary btn-md">الخطوة التالية >> </button>
              </center>
              
            </div>
          </div>
        </div>