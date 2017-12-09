@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" <?php if ( Session('locale') == 'en') echo 'dir="ltr"'; else echo 'dir="rtl"';?> style="text-align: center;">{{trans('demo.msconfirme')}}</div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <center>
                     @if ( Session('locale') == 'en')
                     <p class="alert {{ Session::get('m-class') }}">
                   your code is wrong !!</p>
                     @else
                     <p class="alert {{ Session::get('m-class') }}">
                    {{ Session::get('message') }}</p>
                     @endif
                         
                    
                   
                    </center>
                     @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/confirm') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                           
                            <div class="col-md-6 col-md-offset-3">
                                <input id="name" type="number" class="form-control" name="code" value="" <?php if ( Session('locale') == 'en') echo 'dir="ltr"'; else echo 'dir="rtl"';?> placeholder="{{trans('demo.confirmCode')}}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="">
                            <center>
                            <a href="{{url('/newCode')}}" class="" style="font-size:10px;">{{trans('demo.resend')}}</a>
                                 <button type="submit" class="btn btn-primary">
                                    {{trans('demo.conf')}}  
                                 
                            
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
