<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LangaugeController extends Controller
{
     public function langauge(Request $request)
   {
       $lan = $request->locale;

       if ($request->locale) {
           $request->session()->put('locale',$lan);
       }else{
         \Session::set('locale',$lan);
       }
       
   }
}
