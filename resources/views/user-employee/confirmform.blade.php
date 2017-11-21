@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl" style="text-align: center;">ادخل كود التأكيد المرسل عبر الهاتف المتحرك</div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <center>
                         
                    <p class="alert {{ Session::get('m-class') }}">
                    {{ Session::get('message') }}</p>
                   
                    </center>
                     @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/confirm') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                           
                            <div class="col-md-6 col-md-offset-3">
                                <input id="name" type="number" class="form-control" name="code" value="" dir="rtl" placeholder="رمز التأكيد" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="">
                            <center>
                            <a href="{{url('/newCode')}}" class="" style="font-size:10px;">اعادة ارسال رمز تأكدي</a>
                                 <button type="submit" class="btn btn-primary">
                                    تأكيد  
                                 
                            
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
