@extends('system-mgmt.department.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">تعدي الحالة العملية</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('department.update', ['id' => $department->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12" >
                             <label for="name" class="control-label">الحالة العملية</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $department->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
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
