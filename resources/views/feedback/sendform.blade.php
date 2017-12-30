@extends('feedback.base')
@section('action-content')
<!-- Main content -->
<section class="content">
 
<!-- end header here -->


<!-- here -->
<!-- Your Page Content Here -->
<div class="row">

  <div class="col-xs-12">

    <div class="box">
    	@if(Session::has('message'))
		    <center>
		         
		    <p class="alert {{ Session::get('alert-class') }}">
		    {{ Session::get('message') }}</p>
		   
		    </center>
		     @endif 
      <div class="box-header">
      <div class="row">
      <div class="col-md-12">
        ارسال الاستبيان
      </div>
      </div>

    </div>
      <!-- /.box-header -->
      <div class="box-body">
       <form class="form-horizontal" role="form" method="POST" action="{{ url('admin\makenotification') }}">
            {{ csrf_field() }}
            <input type="hidden" value="{{$form->id}}" name="formid">

            <div class="col-xs-12">
               <!-- /*new edits*/ -->
            <div class="col-sm-6 col-xs-6" style="float: right;">
            <div class="form-group">
              <label for="city_id">مكان الاقامة<sup class="color-red ">*</sup> @if ($errors->has('city_id'))
                <span class="" style="font-size: 9px; color: red;">مطلوب</span>@endif</label>
              <select name="city_id" class="form-control">
                <option value="" selected="">الكل</option>
                @foreach(\App\City::get() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
           <div class="col-sm-6 col-xs-6" style="float: left;">
            <div class="form-group">
              <label class="filter-col" style="margin-right:0;" for="pref-perpage">الجنس </label>
              <select id="pref-perpage" value="{{ old('gender') }}" class="form-control" name="gender">
                <option value="">الكل</option>
                <option value="رجل">ذكر</option>
                <option value="امرأة">انثى</option>
              </select>  
            </div>
          </div>
             
            </div>
              <div class="form-group">
                <div class="col-md-12">
                  <center>
                   <button type="submit" class="btn btn-primary">
                    ارسال
                  </button> 
                </center>

              </div>
            </div>
          </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>

@endsection


