<div class="row setup-content" id="step-3">
        <div class="col-xs-12">
          <div class="col-md-12 well text-center">
            <div class="col-xs-12 ">
              <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 15px;"> الخطوة الثالثة</h1>
              <h3 style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 14px;" >خبرات العمل</h3><hr class="m-t-0">
              <div class="row">
              
                <center>
                  <button id="add_rowt" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>اضافة خبرات سابقة</button>
                  <a id="delete_rowt" class="btn btn-danger pull-right">حذف صف</a>
                </center>
                <br>
                <div class="clearfix"></div>
                <div>

                  <table class="table table-bordered table-hover" id="tab_logict">
                    <?php $x = 1;?>
                    <tbody>
                    @foreach(\App\workexprince::where('employee_id','=',$employee->id)->get() as $wo)
                    <tr id='addrt0'>
                     <td>{{$x}} <?php $x++;?></td>
                     <td>
                       <select name="work_type[]" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                      <option value="">الحالة العملية</option>
                      @foreach(\App\Department::get() as $dep)
                        <option value="{{$dep->name}}" <?php if($wo->work_type == $dep->name) echo "selected";?>>{{$dep->name}}</option>
                        @endforeach
                      </select>
                     </td>
                     <td>
                       <input name='company_name[]' type='text' placeholder='اسم الشركة' value="{{$wo->company_name}}" class='form-control input-md'  /> 
                     </td>
                     <td>
                     <input  name='duties[]' value="{{$wo->duties}}" type='text' placeholder='المسمى الوظيفى'  class='form-control input-md'>
                     </td>
                     <td>
                       <select name="work_section[]" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                      @foreach(\App\position::get() as $pos)
                        <option value="{{$pos->name}}" <?php if($wo->work_section == $pos->name) echo "selected";?>>{{$pos->name}}</option>
                        @endforeach
                      </select>
                     </td>

                     <td>
                     <select name="working_period[]" style="min-width: 120px;" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                     <option value="لايوجد" <?php if($wo->working_period == 'لايوجد') echo "selected";?>>لايوجد</option>
                     <option value="سنة واحدة" <?php if($wo->working_period == 'سنة واحدة') echo "selected";?>>سنة واحدة</option>
                     <option value="سنتين" <?php if($wo->working_period == 'سنتين') echo "selected";?>>سنتين</option>
                     <option value="3 سنوات" <?php if($wo->working_period == '3 سنوات') echo "selected";?>>3 سنوات</option>
                     <option value="4 سنوات" <?php if($wo->working_period == '4 سنوات') echo "selected";?>>4 سنوات</option>
                     <option value="5 سنوات" <?php if($wo->working_period == '5 سنوات') echo "selected";?>>5 سنوات</option>
                     <option value="اكثر من 5 سنوات" <?php if($wo->working_period == 'اكثر من 5 سنوات') echo "selected";?>>اكثر من 5 سنوات</option>
                      
                      </select>
                    
                     </td>
                     
                     <td>
                       <select name="work_place[]" style="min-width: 120px;" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                      
                      @foreach(\App\City::get() as $city)
                        <option value="{{$city->name}}" <?php if($wo->work_place == $city->name) echo "selected";?>>{{$city->name}}</option>
                        @endforeach
                      </select>
                     </td>
                   </tr>
                      @endforeach
                      <tr id='addrt1'></tr>
                    </tbody>
                  </table>

                </div>
                <center>
                 <button style="background-color: #b39c6a !important; border-color: #a18c5f;" type="button" id="activate-step-back-2" class="btn btn-primary btn-md">الخطوة السابقة << </button>
                 <button id="activate-step-4" type="button" style="background-color: #b39c6a !important; border-color: #a18c5f;" class="btn btn-primary btn-md">الخطوة التالية >></button>
               </center>
             </div>

           </div>
         </div>


       </div>
     </div>