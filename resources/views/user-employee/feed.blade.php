@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #fbf2e1;" dir="rtl"> استطلاع رأى</div>
                <div class="panel-body" style="background: #faf4e8; col">

                    <table class="table" dir="rtl">
                        <tr>
                            <td>1- مدى سهولة استخدام الطلب الالكترونى</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio" value="f"> ضعيف</label>
                          </th>


                      </tr>

                        <tr>
                            <td>2- مدى تعاون موظفى تقديم خدمة الطلب الالكترونى</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio2" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio2" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio2" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio2" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio2" value="f"> ضعيف</label>
                          </th>
                          
                          
                      </tr>

                      <tr>
                            <td>3- مدى سرعة انجاز الطلب الالكترونى</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio3" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio3" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio3" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio3" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio3" value="f"> ضعيف</label>
                          </th>


                      </tr>

                      <tr>
                            <td>4- مدى جودة ونوعية الخدمات المقدمة لك</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio4" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio4" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio4" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio4" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio4" value="f"> ضعيف</label>
                          </th>


                      </tr>

                      <tr>
                            <td>5- ما مدى رضاك عن خدمة الطلب الالكترونى</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio5" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio5" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio5" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio5" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio5" value="f"> ضعيف</label>
                          </th>


                      </tr>

                       <tr>
                            <td>6- ما مدى مساهمة الطلب الالكترونى الاختصار وتسهيل الوقت</td>
                            <th>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio7" value="a"> ممتاز</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio7" value="b"> جيد جدا</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio7" value="c"> جيد</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio7" value="d"> مقبول</label>
                              <label class="radio-inline radio-group"><input type="radio" name="opadio7" value="f"> ضعيف</label>
                          </th>


                      </tr>

                      <tr>
                      <td colspan="2">
                         <label>هل لديك اى اقتراحات او ملاحظات اخرى دونها هنا</label>
                            <textarea style="background: #fbf2e1;" class="form-control" rows="4"></textarea> 
                      </td>
                        
                      </tr>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
