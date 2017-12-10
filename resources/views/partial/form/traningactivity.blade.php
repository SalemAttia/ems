<div class="row" style="margin: 0 !important;">
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">اسم الدورة التدريبية</label>
			<input dir="rtl" type="text" style="width: 98%;" value="" class="form-control"  name="traninigname[]" placeholder="اسم الدورة التدريبية">
		</div>
	</div>
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">جهة التدريب</label>
			<input dir="rtl" type="text" style="width: 98%;" value="" class="form-control"  name="destination[]" placeholder="جهة التدريب">
		</div>
	</div>
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">تاريخ الالتحاق</label>
			<input dir="rtl" type="date" style="width: 98%;" value="" class="form-control"  name="dateoftraninig[]" placeholder="تاريخ الالتحاق">
		</div>
	</div>
	<br>
	<center>
                    <button id="add_rowta" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>إضافة دورة تدريبية </button>
                    <a id="delete_rowta" class="btn btn-danger pull-right">حذف</a>
                  </center>

	<div class="clearfix"></div>
	 <table class="table table-bordered table-hover" id="tab_logicta">

                    <tbody>
                      <tr id='addrta0'>

                      </tr>
                      <tr id='addrta1'></tr>
                    </tbody>
                  </table>
</div>