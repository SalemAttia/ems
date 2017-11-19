<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Nexmo\Client;
use App\User;

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
        return view('home');
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
}
