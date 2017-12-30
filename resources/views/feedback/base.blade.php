@extends('layouts.app-template')
@section('title')
{{$title = 'استبيان'}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/report.css')}}">
  
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <style type="text/css">
  td img{
    width: 60px;
    height: 60px;
    border-radius: 50%;
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
        <li><a href="{{url('/admin/feedback')}}">استبيان</a></li>
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
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
// Add , Dlelete row dynamically
$(document).ready(function(){
  var i=1;
  $("#add_row").click(function(){
    $('#addr'+i).html("<td><select "+ ' name="question[type][]"'+ "class='form-control'><option value='0'>textarea</option><option value='1'>radio</option></select></td><td><input "+ 'name="question[body][]"' + "type='text' dir='rtl' placeholder='السؤال'  class='form-control'></td>");

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


<!-- any blugins here -->
@endsection