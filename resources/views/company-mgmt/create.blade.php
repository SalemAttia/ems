@extends('company-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row" dir="rtl">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة شركة جديد</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('company-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12 " style="float: right;">
                            <label style="" for="username" class=" control-label">اسم الشركة</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12 " style="float: right;">
                            <label for="email" class="control-label">البريد الالكترونى</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                            
                                <input id="firstname" type="hidden" class="form-control" name="firstname" value="firstname" required>

                           
                                <input id="lastname" type="hidden" class="form-control" name="lastname" value="firstname" required>

                            

                            <div class="col-md-12 " style="float: right;">
                            <label for="password" class=" control-label">كلمة المرور</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group">
                           

                            <div class="col-md-12 " style="float: right;">
                             <label for="password-confirm" class="control-label">تأكيد كلمة المرور</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

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
