@extends('feedback.baseuser')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" style="background: #fbf2e1;" dir="rtl"> استطلاع رأى</div>
        <div class="panel-body" style="background: #faf4e8; col">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('feedback/save') }}">
            {{ csrf_field() }}
          <table class="table" dir="rtl">
          <input type="hidden" value="{{$Feedforms->id}}" name="formid">
            @foreach($Feedforms->questions as $key => $question)

            @if($question->type == 1)
            <tr>
              <td>{{$question->body}}
              <input type="hidden" name="q[{{$question->id}}][body]" value="{{$question->body}}">
              </td>
              <th>
                <label class="radio-inline radio-group"><input type="radio" name="q[{{$question->id}}][answer]" value="a" required=""> ممتاز</label>
                <label class="radio-inline radio-group"><input type="radio" name="q[{{$question->id}}][answer]" value="b"> جيد جدا</label>
                <label class="radio-inline radio-group"><input type="radio" name="q[{{$question->id}}][answer]" value="c"> جيد</label>
                <label class="radio-inline radio-group"><input type="radio" name="q[{{$question->id}}][answer]" value="d"> مقبول</label>
                <label class="radio-inline radio-group"><input type="radio" name="q[{{$question->id}}][answer]" value="f"> ضعيف</label>
              </th>


            </tr>

            @endif
            @if($question->type == 0)
            <tr>
              <td colspan="2">
               <label>{{$question->body}}</label>
               <textarea style="background: #fbf2e1;" class="form-control" name="q[{{$question->id}}][answer]" rows="4"></textarea> 
             </td>

           </tr>
           @endif
           @endforeach
         
         </table>
         <center><button type="submit" class="btn btn-info">ارسال</button></center>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
