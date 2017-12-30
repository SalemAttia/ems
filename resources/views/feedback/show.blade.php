@extends('feedback.base')
@section('action-content')
    <!-- Your Page Content Here -->
      <div class="row">
       <div id="manprcontent" class="col-md-12 col-sm-12 col-xs-12" style="float: right;">
       <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">نتائج الاستبيان  {{$responsecount}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" dir="rtl">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>السؤال</th>
                  <th>ممتاز</th>
                  <th>جيد جدا</th>
                  <th>جيد</th>
                  <th>مقبول</th>
                  <th>ضعيف</th>
                </tr>
                @if($questionradio)
                <?php $i=1; ?>
                  @foreach ($questionradio as $question)

                  <?php $form = \App\feedback\question::select('body')->find($question['id']);
                  ?>
                <tr>
                  <td><?php echo $i; $i++;?></td>
                  <td>{{$form[0]->body}}</td>
                  
                  <td>
                    <span class="badge bg-green"><?php echo array_sum($question['a']); ?></span>
                  </td>
                  <td>
                    <span class="badge bg-blue"><?php echo array_sum($question['b']); ?></span>
                  </td>
                  <td>
                    <span class="badge bg-yellow"><?php echo array_sum($question['c']); ?></span>
                  </td>
                  <td>
                    <span class="badge bg-red"><?php echo array_sum($question['d']); ?></span>
                  </td>
                  <td>
                    <span class="badge bg-red"><?php echo array_sum($question['f']); ?></span>
                  </td>
                </tr>
                @endforeach
                @else
                <tr><td colspan="7">لا يوجد نتائج بعد</td></tr>
                @endif
               
              </tbody></table>
            </div>
            <!-- /.box-body -->
           
          </div>
       @if(count($questiontext) > 0)
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
             <table class="table table-bordered" dir="rtl">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>السؤال</th>
                  <th>الاجبات</th>
                  
                </tr>
                <?php $i=1; ?>
                  @foreach ($textids as $id)
                   <?php $form = \App\feedback\question::select('body')->find($question['id']);
                  ?>
                <tr>
                  <td><?php echo $i; $i++;?></td>
                  <td>{{$form[0]->body}}</td>
                  <td><ul>
                     @foreach($questiontext[$id] as $questiontext)
                       @if($questiontext)
                       <li>{{$questiontext}}</li>
                       @endif
                     @endforeach
                  </ul>
                  </td>
                 
                </tr>
                @endforeach
               
              </tbody></table>

                
          </div>
          <!-- /.box-body -->
        </div>
        @endif
        <!-- /.box -->

      </div>
     
  </div> 
  
@endsection