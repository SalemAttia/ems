<?php

namespace App\Http\Controllers\feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\feedback\question;
use App\feedback\Feedform;
use \Illuminate\Notifications\DatabaseNotification;
use Session;


class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $Feedforms = Feedform::with('questions')->get();
        return view('feedback.index', ['Feedforms' => $Feedforms]);
    }

    public function makenotification(Request $request)
    {

    	$Feedform = \App\feedback\Feedform::findOrFail($request->formid);
    	// city_id
    	// gender
    	$kes = ['city_id' => 'city_id','gender' => 'gender'];
    	
    	$userids = \App\Employee::query();
    	foreach ($kes as $value) {
    		if(!empty($request[$value])){
    		   $userids = $userids->where($value,'=',$request[$value]);
    		}
    	}
    	$userids = $userids->select('user_id')->get();
    	$user_ids = array();
    	foreach ($userids as $value) {
    		$user_ids[] = $value->user_id;
    	}
    	
		//send to multi user
		 $users = \App\User::whereIn('id',$user_ids)->where('role','0')->get();
        
		 if(count($users) > 0){
          
		 \Notification::send($users ,new \App\Notifications\mynotification($Feedform));
		 Session::flash('message' , 'تم ارسال الاستبيان الى المستخدمين ');
         Session::flash('alert-class' , 'alert-success');
		 return redirect()->intended('/admin/feedback');
		 }else{
		 	
		 	Session::flash('message' , 'لا يوجد مستخدمين');
            Session::flash('alert-class' , 'alert-danger');
             return redirect()->back(); 
		 }

    	
    }

    public function markAsRead($id)
    {
    	$not = DatabaseNotification::find($id);
        $not->markAsRead();
    }
}
