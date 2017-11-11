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
        $degree = \App\degree::count();
        $position = \App\position::count();
        $users = \App\User::count();

        return view('dashboard_old',compact('degree','allemployee','women','men','currant','old','position','users'));
    }
}
