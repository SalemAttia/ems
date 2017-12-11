@extends('layouts.app-template')
@section('title')
{{$title = 'ادارة الموظفين'}}

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/emlist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/newemployee.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/timeline.css')}}">
 <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
  <style type="text/css">
    .select2-container .select2-selection--single {
    height: 34px !important;
    border-radius: unset !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #b39c6a !important;
    }
  </style>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" dir="rtl">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="float: left;">


      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>الصفحة الرئيسية</a></li>
        <li>موظفين</li>
        @if($new)
        <li>{{$new}}</li>
        @endif
      </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      
      @yield('action-content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('js')

<!-- Select2 -->
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script type="text/javascript">

// Activate Next Step

$(document).ready(function() {

  var navListItems = $('ul.setup-panel li a'),
  allWells = $('.setup-content');

  allWells.hide();

  navListItems.click(function(e)
  {
    e.preventDefault();
    var $target = $($(this).attr('href')),
    $item = $(this).closest('li');

    if (!$item.hasClass('disabled')) {
      navListItems.closest('li').removeClass('active');
      $item.addClass('active');
      allWells.hide();
      $target.show();
    }
  });

  $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-1').on('click', function(e) {
      $('ul.setup-panel li:eq(0)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-1"]').trigger('click');
      
    })
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
      $('ul.setup-panel li:eq(1)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-2"]').trigger('click');
     
    })
    // DEMO ONLY //
    $('#activate-step-back-2').on('click', function(e) {
      $('ul.setup-panel li:eq(3)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-2"]').trigger('click');
     
    })

    // DEMO ONLY //
    $('#activate-step-back-3').on('click', function(e) {
      $('ul.setup-panel li:eq(4)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-3"]').trigger('click');
     
    })
    // DEMO ONLY //
    $('#activate-step-back-4').on('click', function(e) {
      $('ul.setup-panel li:eq(5)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-4"]').trigger('click');
     
    })
    
    $('#activate-step-3').on('click', function(e) {
      $('ul.setup-panel li:eq(2)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-3"]').trigger('click');
      
    })
    
    $('#activate-step-4').on('click', function(e) {
      $('ul.setup-panel li:eq(3)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-4"]').trigger('click');
      
    })
    
    $('#activate-step-3').on('click', function(e) {
      $('ul.setup-panel li:eq(2)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-3"]').trigger('click');
      
    })

    $('#activate-step-5').on('click', function(e) {
      $('ul.setup-panel li:eq(4)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-5"]').trigger('click');
     
    })
  });


// Add , Dlelete row dynamically

$(document).ready(function(){
  var i=1;
  $("#add_row").click(function(){
    $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='degree_name[]'' class='form-control' style='width:150px;'>@foreach(\App\degree::get() as $degree)<option value='{{$degree->name}}'>{{$degree->name}}</option>@endforeach</select></td><td><input  name='university_name[]' type='text' placeholder='جهة الدراسة'  class='form-control input-md'></td><td><input  name='cgp[]' type='text' placeholder='التخصص'  class='form-control input-md'></td><td><select id='passing_year' style='width:120px;' name='passing_year[]' class='form-control'><?php for($i= 1950; $i<=2020; $i++){ ?><option value='{{$i}}'>{{$i}}</option><?php } ?></select></td>");

    $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
    i++; 
  });
  $("#delete_row").click(function(){
   if(i>1){
     $("#addr"+(i-1)).html('');
     i--;
   }
 });

});
</script>
<script type="text/javascript">
//next form
$(document).ready(function(){
  var i=1;
  $("#add_rowt").click(function(){
    $('#addrt'+i).html("<td>"+ (i+1) +"</td><td><select style='font-size:10px !important; min-width:110px;' name='work_type[]' class='form-control'> <option value='>الحالة العملية</option> @foreach(\App\Department::get() as $dep)<option value='{{$dep->name}}'>{{$dep->name}}</option>@endforeach</select></td><td><input name='company_name[]' style='font-size:9px !important; min-width:110px;' type='text' placeholder='جهة العمل' class='form-control input-md'  /> </td><td><input  name='duties[]' style='font-size:9px !important; min-width:110px;'  type='text' placeholder='المسمى الوظيفى'  class='form-control input-md'></td><td><select name='work_section[]' style='font-size:10px !important; min-width:115px' class='form-control'><option value='الفئة الوظيفية'>الفئة الوظيفية</option> @foreach(\App\position::get() as $pos)<option value='{{$pos->name}}'>{{$pos->name}}</option>@endforeach</select></td><td><select name='working_period[]' style='font-size:10px !important; min-width:110px;' class='form-control'><option value='لايوجد'>لايوجد</option><option value='سنة واحدة'>سنة واحدة</option><option value='سنتين'>سنتين</option><option value='3 سنوات'>3 سنوات</option><option value='4 سنوات'>4 سنوات</option><option value='5 سنوات'>5 سنوات</option><option value='اكثر من 5 سنوات'>اكثر من 5 سنوات</option></select></td><td><select name='work_place[]' style='font-size:10px !important; min-width:110px;' class='form-control'><option value='مكان العمل'>مكان العمل</option>@foreach(\App\City::get() as $city)<option value='{{$city->name}}'>{{$city->name}}</option>@endforeach</select></td>");
    $('#tab_logict').append('<tr id="addrt'+(i+1)+'"></tr>');
    i++; 
  });
  $("#delete_rowt").click(function(){
   if(i>1){
     $("#addrt"+(i-1)).html('');
     i--;
   }
 });

});
</script>

<script type="text/javascript">
//next form
$(document).ready(function(){
  var i=1;
  $("#add_rowtt").click(function(){
    $('#addrtt'+i).html("<td>"+ (i+1) +"</td><td><select id='pref-perpage' class='form-control' name='soicalmedia[]'><option value='fb'>فيس بوك</option><option value='tw'>تويتر</option><option value='link'>لينكد ان</option><option value='githup'>githup</option><option value='google'>google-plus</option><option value='behance'>behance</option></select>  </td><td><input  name='soclink[]' type='text' placeholder='لينك'  class='form-control input-md'></td>");

    $('#tab_logictt').append('<tr id="addrtt'+(i+1)+'"></tr>');
    i++; 
  });
  $("#delete_rowtt").click(function(){
   if(i>1){
     $("#addrtt"+(i-1)).html('');
     i--;
   }
 });

});
</script>
<!-- talant -->
<script type="text/javascript">

$(document).ready(function(){
  var i=1;
  $("#add_rowta").click(function(){
    $('#addrta'+i).html("<td>"+ (i+1) +"</td><td><input  name='traninigname[]' type='text' placeholder='اسم الدورة التدريبية'  class='form-control input-md'></td><td><input  name='destination[]' type='text' placeholder='جهة التدريب'  class='form-control input-md'></td><td><td><input  name='dateoftraninig[]' type='date' placeholder='تاريخ الالتحاق'  class='form-control input-md'></td>");

    $('#tab_logicta').append('<tr id="addrta'+(i+1)+'"></tr>');
    i++; 
  });
  $("#delete_rowta").click(function(){
   if(i>1){
     $("#addrta"+(i-1)).html('');
     i--;
   }
 });

});
</script>
<!-- endtalant -->

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

@endsection