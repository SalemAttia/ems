<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Employee;
use App\City;
use App\State;
use App\Country;
use App\Department;
use App\Division;
use App\socialmeadi;
use App\education;
use App\workexprince;
use Session;

class companyController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        ->leftJoin('country', 'employees.country_id', '=', 'country.id')
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.*', 'department.name as department_name', 'department.id as department_id', 'division.name as division_name', 'division.id as division_id')
        ->paginate(10);
       $new = null;
       $constraints = [
            'jobtitle' => null,
            'gender' => null,
            'social_status' => null,
            'qualification'  => null,
            'passing_year'  => null,
            'The_owners_of_inspiration' => null,
            'working_period' => null,
            'work_type' => null,
            'work_section' => null,
            'work_place' => null

            ];
        if(\Auth::user()->confirmed == 1){
        return view('company/index', ['employees' => $employees,'new' => $new,'searchingVals' => $constraints]);
      }else{
         return view('company/notActive', ['new' => $new]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employee = Employee::with('education','socialmeadi','workexprince')->find($id);
        $new = null;
        if(\Auth::user()->confirmed == 1){
         return view('company.show',compact('employee','new'));
      }else{
         return view('company/notActive', ['new' => $new]);
      }
       
    }

     public function load($name) {
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }


  
    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'jobtitle' => $request->searchby['jobtitle'],
            'gender' => $request->searchby['gender'],
            'social_status' => $request->searchby['social_status'],
            'qualification' => $request->searchby['qualification'],
            'passing_year'  => $request->searchby['passing_year'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration'],
            'working_period' => $request->searchby['working_period'],
            'work_type' => $request->searchby['work_type'],
            'work_section' => $request->searchby['work_section'],
            'work_place' => $request->searchby['work_place']
            ];
        $employees = $this->doSearchingQuery($constraints);
      
        $new = 'بحث';
        if(\Auth::user()->confirmed == 1){
         return view('company/index', ['employees' => $employees, 'searchingVals' => $constraints,'new' => $new]);
      }else{
         return view('company/notActive', ['new' => $new]);
      }
       
    }

    private function doSearchingQuery($constraints) {
        $query = Employee::select('employees.firstname as employee_name', 'employees.*');

        $fields = array_keys($constraints);

        $index = 0;
        $item = array();
        $val = array();
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                
                $item[] = $fields[$index];
                $val[]  = $constraint;

            }
                 $index++;
               
          
        }
        if(count($item) > 0){
            for ($i=0; $i < count($item); $i++) {

                if($item[$i] == 'passing_year' || $item[$i] == 'working_period' || $item[$i] == 'work_type' || $item[$i] == 'work_section' || $item[$i] == 'work_place'|| $item[$i] == 'qualification'){
                     $ids = null;
                  if($item[$i] == 'passing_year'){
                    $ids = education::where('passing_year','=',$val[$i])->select('employee_id')->get();
                  }elseif($item[$i] == 'qualification'){
                    $ids = education::where('degree_name','=',$val[$i])->select('employee_id')->get();
                  }
                  elseif($item[$i] == 'working_period'){
                    $ids = workexprince::where('working_period','=',$val[$i])->select('employee_id')->get();
                  }
                  elseif($item[$i] == 'work_type'){
                    $ids = workexprince::where('work_type','=',$val[$i])->select('employee_id')->get();
                  }
                  elseif($item[$i] == 'work_section'){
                    $ids = workexprince::where('work_section','=',$val[$i])->select('employee_id')->get();
                  }
                  elseif($item[$i] == 'work_place'){
                    $ids = workexprince::where('work_place','=',$val[$i])->select('employee_id')->get();
                  }

                  $query = $query->whereIn('id',$ids);
                  
                }else{
                    $query = $query->where($item[$i], 'like', '%'.$val[$i].'%');
                }
            
        }
        return $query->paginate(10); 
      }else{
        return $query->paginate(10);
    }
       
       
    }

  

    private function validateInput($request) {
        $this->validate($request, [
            'firstname' => 'required|max:60',
            'middlename' => 'required|max:60',
            'address' => 'required|max:120',
            'department_id' => 'required',
        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}