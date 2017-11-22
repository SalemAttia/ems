<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Nexmo\Laravel\Facade\Nexmo;
use Nexmo\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $code = $this->generatePIN();
        //$phone = $data['phone'];
        $phone = $data['code'].$data['phone'];
        $sms = $this->sms($code,$phone);
       
           return User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'phone' => $phone,
            'code' => $code,
            'password' => bcrypt($data['password']),
        ]); 
       
    }
     /*
     * generate bin code
     */
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
    protected function sms($code,$phone)
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
