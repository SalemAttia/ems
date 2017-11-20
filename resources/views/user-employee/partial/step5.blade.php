<div class="row setup-content" id="step-5">
      <div class="col-xs-12">
        <div class="col-md-12 well text-center">
          <div class="col-md-8  col-sm-offset-2">
            <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 15px;"> الخطوة الاخيرة</h1>
            <h3 style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 14px;" >وسائل التواصل</h3><hr class="m-t-0">
            <div class="row">
              <div class="col-sm-6 col-xs-6" style="float: right;">
                <div class="form-group">
                  <label style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;" for="supervisor">وسيلة التواصل</label>
                   
                   <select id="pref-perpage" class="form-control" name="soicalmedia[]">
                         @foreach(\App\social::get() as $soc)
                        <option value="{{$soc->name}}">{{$soc->name}}</option>
                        @endforeach
                         
                      </select> 
                </div>
              </div>
              <div class="col-sm-6 col-xs-6" style="float: left;">
                <div class="form-group">
                  <label style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 13px; float: right;" for="supervisor">اسم المستخدم</label>
                  <input type="text" name="soclink[]" class="form-control" id="supervisor" placeholder="اسم المستخدم">
                </div>
              </div>
              <center>
                <button id="add_rowtt" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>المزيد</button>
                <a id="delete_rowtt" class="btn btn-danger pull-right">حذف صف</a>
              </center>
              <div>

                <table class="table table-bordered table-hover" id="tab_logictt">

                  <tbody>
                    <tr id='addrtt0'>

                    </tr>
                    <tr id='addrtt1'></tr>
                  </tbody>
                </table>
              </div>

              <center>
              <button style="background-color: #b39c6a !important; border-color: #a18c5f;" id="activate-step-back-4" type="button" class="btn btn-primary btn-md">الخطوة السابقة << </button>
                <button type="submit" style="background-color: #b39c6a !important; border-color: #a18c5f;" class="btn btn-primary btn-md">تأكيد</button>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>