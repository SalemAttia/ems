<div class="row" style="margin: 0 !important;">
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">{{trans('demo.name_of_training')}}</label>
			<input dir="rtl" type="text" style="width: 98%;" class="form-control"  name="traninigname[]" placeholder="{{trans('demo.name_of_training')}}" value="">
		</div>
	</div>
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">{{trans('demo.training_center')}}</label>
			<input dir="rtl" type="text" style="width: 98%;" class="form-control"  name="destination[]" placeholder="{{trans('demo.training_center')}}" value="">
		</div>
	</div>
	<div class="col-sm-4 col-xs-12" style="float: right;">
		<div class="form-group">
			<label for="firstname">{{trans('demo.training_date')}}</label>
			<input dir="rtl" type="date" style="width: 98%;" class="form-control"  name="dateoftraninig[]" placeholder="{{trans('demo.training_date')}}" value="">
		</div>
	</div>
	<br>
	<center>
                    <button id="add_rowta" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>add more</button>
                    <a id="delete_rowta" class="btn btn-danger pull-right">delete</a>
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