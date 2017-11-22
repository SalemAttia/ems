@extends('layouts.app')

@section('content')
<div class="container">
<style type="text/css">
    input{
        font-size: 12px !important;
        font-weight: 200 !important;
    }
</style>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">تسجيل حساب جديد</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" dir="rtl" placeholder="الاسم" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" dir="rtl" placeholder="البريد الالكترونى" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>
                            <div class="input-group col-md-6" style="padding-left: 2%;">
                            <span class="input-group-addon" style="padding: 0 !important;">
                                <select class="" name="code" style="border: 0; width: 120px;">
                                @include('partial.countriesphonecode')
                                
                            </select>
                            </span>
                             <input id="phone" type="number" class="form-control" name="phone" dir="rtl" placeholder="الهاتف (1555565528)" value="{{ old('phone') }}" style="width: 95%;" required>
                            
                            </div>
                        </div>

<!-- 
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" dir="rtl" placeholder="الهاتف المتنقل" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" dir="rtl" placeholder="كلمة السر" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" dir="rtl" placeholder="تأكيد كلمة السر" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4" style="float: right;">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
