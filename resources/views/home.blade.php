@extends('layouts.app')

@section('content')
<style type="text/css">	
	.bs-wizard {margin-top: 10%;}

	/*Form Wizard*/
	.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
	.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
	.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
	.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 12px; margin-bottom: 5px;}
	.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 12px;}
	.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
	.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
	.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
	.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
	.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
	.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
	.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:100%;}
	.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
	.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #fbe8aa;}
	.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 1;}
	.bs-wizard > .bs-wizard-step:first-child  > .progress {right: 50%; width: 100%;}
	.bs-wizard > .bs-wizard-step:last-child  > .progress {left:50%; width: 50%;}
	.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
	/*END Form Wizard*/
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">


				<div class="panel-body" dir="rtl">
					مرحبا بكم فى EMS يمكنكم التسجيل عبر الموقع 
					والاستفادة منه اتبع الخطوات التالية للعمل من خلال الموقع
				</div>
			</div>
		</div>

	


			<div class="row bs-wizard" style="border-bottom:0;">

				<div class="col-xs-3 bs-wizard-step complete active" style="float: right;">
					<div class="text-center bs-wizard-stepnum">الخطوة الاولى</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#" class="bs-wizard-dot"></a>
					<div class="bs-wizard-info text-center">اذا لم يكن لديك حساب موجود اتبع الاتى <a href="{{url('/register')}}">حساب جديد</a></div>
				</div>

				<div class="col-xs-3 bs-wizard-step complete" style="float: right;">
					<div class="text-center bs-wizard-stepnum">الخطوة التالية</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#" class="bs-wizard-dot"></a>
					<div class="bs-wizard-info text-center">قوم بتأكيد العضوية الجديده من خلال الرسالة اللى هتصلك بعد التسجيل</div>
				</div>

				<div class="col-xs-3 bs-wizard-step complete" style="float: right;"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">الخطوة التالتة</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#" class="bs-wizard-dot"></a>
					<div class="bs-wizard-info text-center">اكمل باقى البايانات الخاص بك على الموقع</div>
				</div>

				<div class="col-xs-3 bs-wizard-step active" style="float: right;"><!-- active -->
					<div class="text-center bs-wizard-stepnum">الخطوة الاخيرة</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#" class="bs-wizard-dot"></a>
					<div class="bs-wizard-info text-center">الان انت جاهز لاستخدام الموقع وتكملة بياناتك شكرا لك</div>
				</div>





		</div>
	</div>


</div>
@endsection
