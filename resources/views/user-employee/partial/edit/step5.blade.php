<div class="row setup-content" id="step-5">
      <div class="col-xs-12">
        <div class="col-md-12 well text-center">
          <div class="col-md-8  col-sm-offset-2">
            <h1 class="text-center" style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 15px;"> الخطوة الاخيرة</h1>
            <h3 style="font-family: 'Droid Arabic Kufi', Tahoma, Geneva, sans-serif; font-size: 14px;" >وسائل التواصل</h3><hr class="m-t-0">
            <div class="row">
              
              <center>
                <button id="add_rowtt" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>المزيد</button>
                <a id="delete_rowtt" class="btn btn-danger pull-right">حذف صف</a>
              </center>
              <div>

                <table class="table table-bordered table-hover" id="tab_logictt">

                  <tbody>
                  <?php $m = 1;?>
                  @foreach(\App\socialmeadi::where('employee_id','=',$employee->id)->get() as $so)
                    <tr id='addrtt0'>
                        <td>{{$m}} <?php $m++;?></td>
                        <td>
                        <select id='pref-perpage' class='form-control' name='soicalmedia[]'>
                         @foreach(\App\social::get() as $soc)
                        <option value="{{$soc->name}}" <?php if($so->soicalmedia == $soc->name) echo "selected";?> >{{$soc->name}}</option>
                        @endforeach
                       
                       
                        </select> 
                        </td>
                        <td>
                        <input  name='soclink[]' value="{{$so->soclink}}" type='text' placeholder='لينك'  class='form-control input-md'></td>
                    </tr>
                  @endforeach
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