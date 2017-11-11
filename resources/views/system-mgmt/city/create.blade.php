@extends('system-mgmt.city.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة امارة</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('city.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12" style="float: right;">
                            <label for="name" class="control-label">الاسم</label> 

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-md-12">
                            <label class="control-label">العاصمة</label>
                                <select class="form-control" name="state_id">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <center>
                             <div class="">
                                <button type="submit" class="btn btn-primary">
                                    انشاء
                                </button>
                            </div> 
                        </center>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
