<div class="row setup-content" id="step-2">
          <div class="col-xs-12">
            <div class="col-md-12 well text-center">
              <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;">الخطوة الثانية</h1>
              <div class="col-sm-8 col-sm-offset-2" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;">
                <h3 class="m-t-0" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;"></h3>
                معلومات التعليم<hr class="m-t-0">
                <div class="row">
                  
                 
                  
                 
                  <center>
                    <button id="add_row" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>اضافة المزيد</button>
                    <a id="delete_row" class="btn btn-danger pull-right">حذف صف</a>
                  </center>

                  <table class="table table-bordered table-hover" id="tab_logic">

                    <tbody>
                    <?php $i = 1;?>
                      @foreach(\App\education::where('employee_id','=',$employee->id)->get() as $edu)
                      <tr id='addr0'>
                      <td>{{$i}} <?php $i++;?></td>
                        <td>
                        <input name='degree_name[]' type='text' placeholder='المؤهل العلمي' class='form-control input-md' value="{{$edu->degree_name}}" /> </td>
                        <td>
                        <input  name='university_name[]' type='text' placeholder='جهة الدراسة' value="{{$edu->university_name}}" class='form-control input-md'>
                        </td>
                        <td><input  name='cgp[]' value="{{$edu->cgp}}" type='text' placeholder='التخصص'  class='form-control input-md'></td>
                        <td><input  name='passing_year[]' value="{{$edu->passing_year}}" type='text' placeholder='سنة التخرج'  class='form-control input-md'></td>
                      </tr>
                      @endforeach
                      <tr id='addr1'></tr>
                    </tbody>
                  </table>

                </div>



              </div>
              <div class="clearfix"></div>
              <center>
               <button style="background-color: #b39c6a !important; border-color: #a18c5f;" type="button" id="activate-step-1" class="btn btn-primary btn-md">الخطوة السابقة << </button>
               
               <button style="background-color: #b39c6a !important; border-color: #a18c5f;" type="button" id="activate-step-3" class="btn btn-primary btn-md">الخطوة التالية >></button>
             </center>

           </div>
         </div>
       </div>