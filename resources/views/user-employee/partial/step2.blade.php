<div class="row setup-content" id="step-2">
          <div class="col-xs-12">
            <div class="col-md-12 well text-center">
              <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;">الخطوة الثانية</h1>
              <div class="col-sm-8 col-sm-offset-2" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;">
                <h3 class="m-t-0" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px;"></h3>
                معلومات التعليم<hr class="m-t-0">
                <div class="row">
                  <div class="col-sm-6 col-xs-12" style="float: right;">
                    <div class="form-group">
                      <label style="float: right;" for="deg_name">المؤهل العلمي</label>
                      <select name="degree_name[]" class="form-control select2-hidden-accessible" selected="selected" tabindex="-1" aria-hidden="true">
                      @foreach(\App\degree::get() as $degree)
                        <option value="{{$degree->name}}">{{$degree->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12" style="float: left;">
                    <div class="form-group">
                      <label for="al_phone" style="float: right;">جهة الدراسة</label>
                      <input type="text" class="form-control" name="university_name[]" id="university" placeholder="جهة الدراسة">
                    </div>
                  </div>
                  
                  <div class="col-sm-6 col-xs-12" style="float: right;">
                    <div class="form-group">
                      <label for="cgp" style="float: right;">التخصص</label>
                      <input type="text" class="form-control" name="cgp[]" id="cgp" placeholder="التخصص">
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12" style="float: left;">
                    <div class="form-group">
                      <label style="float: right;" for="al_phone">سنة التخرج</label>
                      @include('partial.year')
                    </div>

                  </div>
                  <center>
                    <button id="add_row" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>اضافة مؤهل أخر</button>
                    <a id="delete_row" class="btn btn-danger pull-right">حذف صف</a>
                  </center>

                  <table class="table table-bordered table-hover" id="tab_logic">

                    <tbody>
                      <tr id='addr0'>

                      </tr>
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