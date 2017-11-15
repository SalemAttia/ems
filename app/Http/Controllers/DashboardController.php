<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allemployee = \App\Employee::count();
        $women = \App\Employee::where('gender','=','امرأة')->count();
        $men = \App\Employee::where('gender','=','رجل')->count();
        $currant = \App\Employee::where('The_owners_of_inspiration','=','نعم')->count();
        $old = \App\Employee::where('volunteer','=','نعم')->count();
        $cv = \App\Employee::select('cv')->count();
        $degree = \App\degree::count();
        $position = \App\position::count();
        $users = \App\User::count();
        $collage = \App\education::where('degree_name','=','جامعي')->count();
        $hightdegree = \App\education::where('degree_name','=','دراسات عليا')->count();
        $mastr = \App\education::where('degree_name','=','ماجستير')->count();
        $doc = \App\education::where('degree_name','=','دكتوراه')->count();
        $hightschool = \App\education::where('degree_name','=','الثانوية')->count();
        $none = \App\education::where('degree_name','=','ما دون الثانوية')->count();
        $workexprincenone = \App\workexprince::where('working_period','=','لايوجد')->count();

        return view('dashboard_old',compact('degree','allemployee','women','men','currant','old','workexprincenone','position','users','cv','collage','hightschool','mastr','hightdegree','doc','none'));
    }
}
