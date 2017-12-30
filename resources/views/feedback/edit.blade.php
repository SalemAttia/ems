@extends('feedback.base')

@section('action-content')
<div class="container">
  <div class="row" dir="rtl">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">اضافة فورم جديد</div>
        <div class="panel-body">
           <form class="form-horizontal" role="form" method="POST" action="{{ route('feedback.update', ['id' => $Feedforms->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">


              <div class="col-md-12 " style="float: right;">
                <label style="" for="name" class=" control-label">اسم الفورمة</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $Feedforms->name }}" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">

              <div class="col-md-12 " style="float: right;">
                <label for="desc" class="control-label">الوصف</label>
                <textarea id="desc"  class="form-control" name="desc" value="{{ $Feedforms->desc }}" required>{{ $Feedforms->desc }}</textarea>

                @if ($errors->has('desc'))
                <span class="help-block">
                  <strong>{{ $errors->first('desc') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group col-sm-12 {{ $errors->has('question.body.0') ? ' has-error' : '' }}" style="float: right;">
              <label for="question" style="float: right;">مجموعة الاسألة</label>
              <center>
                <button id="add_row" type="button" class="btn add-more pull-left" style="margin-right: 1%;"><i class="fa fa-plus m-r-5" aria-hidden="true"></i></button>
                <a id="delete_row" class="btn btn-danger pull-left"><i class="fa fa-trash m-r-5" aria-hidden="true"></i></a>
              </center>
              <br>
              <table class="table" id="tab_logic" dir="ltr">

                <tbody>
                @foreach($Feedforms->questions as $question)
                  <tr id='addr0'>
                    <td>
                      <select name="question[type][]" class='form-control'>
                        <option value="0" <?php if($question->type == 0) echo "selected";?>>textarea</option>
                        <option value="1" <?php if($question->type == 1) echo "selected";?>>radio</option>
                      </select>
                    </td>
                    <td><input dir="rtl" name="question[body][]" type='text' value="{{$question->body}}" placeholder='السؤال'  class='form-control {{ $errors->has('question.body.0') ? ' has-error' : '' }}'>
                    
                    </td> 
                  </tr>
                  @endforeach
                  <tr id='addr1'></tr>
                </tbody>
              </table>

              <div class="form-group">
                <div class="col-md-12">
                  <center>
                   <button type="submit" class="btn btn-primary">
                    انشاء
                  </button> 
                </center>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
