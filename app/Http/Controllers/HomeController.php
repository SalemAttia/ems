<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Nexmo\Client;
use App\User;
use Validator;
use Session;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = \Auth::user()->role;
        if($role == 0){
            if(\Auth::user()->confirmed == 0){
              return   redirect('confirm');
            }else{
                return 'mission done';
            }

        }
        
    }

    public function confirm()
    {
        return view('user-employee.confirmform');
    }

    public function confirmPost(Request $request)
    {

       $code = $request->code; 
       if(\Auth::user()->code != $code){
            Session::flash('message','الكود الذى ارسلته غير صحيح');
            Session::flash('m-class','alert-danger');
              return   redirect('confirm');
        }else{
            $user_id = \Auth::user()->id;
            $input['confirmed'] = 1;
            $useremployee = User::where('id', $user_id)
            ->update($input);
           if($useremployee){
              return   redirect('home');
             }else{
               Session::flash('message','برجاء ادخال رمز التأكيد مرة اخرى');
              Session::flash('m-class','alert-danger');
            return   redirect('confirm');
           }
        }
    }



    public function sms($code)
    {
        // send message
            $nexmo = app('Nexmo\Client');
            $message = $nexmo->message()->send([
                  'to' => '201111573195',
                  'from' => '@ems',
                  'text' => 'confirmation code '.$code
                ]);
    }

    public function newsms()
    {
        $code = $this->generatePIN();
        //$phone = $data['phone'];
        $phone = \Auth::user()->phone;
        $user_id = \Auth::user()->id;
        $sms = $this->smsto($code,$phone);
        $input['code'] = $code;
        $useremployee = User::where('id', $user_id)
            ->update($input);
        if($useremployee){
            return   redirect('confirm');
        }else{
            Session::flash('message','برجاء ادخال رمز التأكيد');
            Session::flash('m-class','alert-danger');
            return   redirect('confirm');
        }

       
    }

    protected function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
   }


   /*
   * send sms
   */
    protected function smsto($code,$phone)
    {
        // send message
            $nexmo = app('Nexmo\Client');
            $message = $nexmo->message()->send([
                  'to' => $phone,
                  'from' => '@ems',
                  'text' => 'confirmation code '.$code
                ]);
    }
}
