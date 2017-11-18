@extends('company-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل شركة</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('company-management.update', ['id' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            

                             <div class="col-md-12 " style="float: right;">
                             <label for="username" class="control-label">اسم الشركة</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 " style="float: right;">
                             <label for="email" class="control-label">اسم الشركة</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                <input id="firstname" type="hidden" class="form-control" name="firstname" value="{{ $user->firstname }}" required>

                                <input id="lastname" type="hidden" class="form-control" name="lastname" value="{{ $user->lastname }}" required>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                             <div class="col-md-12 " style="float: right;">
                              <label for="password" class="control-label">كلمة السر الجديدة</label>
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                           

                             <div class="col-md-12 " style="float: right;">
                              <label for="password-confirm" class="control-label">تأكيد كلمة السر</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                    تعديل
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
