<?php

namespace App\Http\Controllers\feedback;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\feedback\question;
use App\feedback\Feedform;
use App\feedback\response;
use Session;
use \Illuminate\Notifications\DatabaseNotification;



class Usersform extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form($id) {
        $Feedforms = Feedform::where('link',$id)->with('questions')->first();
       // return $Feedforms;
        return view('feedback.form', ['Feedforms' => $Feedforms, 'title' => 'form']);
    }

    public function formsave(Request $request)
    {
        $myid = \Auth::user()->id;
    	  $data = new response();
        $data->feedform_id = $request->formid; 
        $data->questionresponse = $request->q; 
        $data->user_id = \Auth::user()->id; 
        $form = $data->save();
        if($form){
           $not = DatabaseNotification::where('notifiable_id',$myid)->where('data','like','%{"id":'.$request->formid.'%')->get();
            $not->markAsRead();
        }
          
          Session::flash('message' , 'تم ارسال الاستبيان شكرا لك');
          Session::flash('alert-class' , 'alert-success');
          return redirect('/profile'); 
    }


    public function store(Request $request)
    {
      $data = new response();
          $data->feedform_id = $request->formid; 
          $data->questionresponse = $request->q; 
          $data->user_id = \Auth::user()->id; 
          $form = $data->save();
          return $form;
    }

    public function all()
    {
      return response::all();
    }


}
