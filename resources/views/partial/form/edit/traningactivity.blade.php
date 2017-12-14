<div class="row" style="margin: 0 !important;">
	
	<br>
	<center>
		<button id="add_rowta" type="button" class="btn btn-info pull-left"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>add more</button>
		<a id="delete_rowta" class="btn btn-danger pull-right">delete</a>
	</center>

	<div class="clearfix"></div>
	<table class="table table-bordered table-hover" id="tab_logicta">

		<tbody>
			<?php $i = 1;?>
			@foreach(\App\training_activity::where('employee_id','=',$employee->id)->get() as $tra)
			<tr id='addr0'>
				<td>{{$i}} <?php $i++;?></td>
				<td>
					<input  name='traninigname[]' value="{{$tra->traninigname}}" type='text' placeholder='اسم الدورة التدريبية'  class='form-control input-md'>
				</td>
				<td>
					<input  name='destination[]' value="{{$tra->destination}}" type='text' placeholder='جهة التدريب'  class='form-control input-md'>
				</td>
				<td>
					<input  name='dateoftraninig[]' value="{{$tra->dateoftraninig}}" type='date' placeholder='تاريخ الالتحاق'  class='form-control input-md'></td>
				</tr>
				@endforeach
				<tr id='addr1'></tr>
				<tr id='addrta1'></tr>
			</tbody>
		</table>
	</div>
