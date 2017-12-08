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
use App\User;
 
class CreateUserEmployee extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $employee = Employee::where('user_id','=',$user_id)->with('education','socialmeadi','workexprince')->first();
        if(!$employee){
            $new = null;
          return view('user-employee.employees-mgmt.create',compact('new'));

        }else{
           $new = null;
           return view('user-employee.employees-mgmt.show',compact('employee','new'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();
        $new = 'موظف جديد';
        return view('user-employee.employees-mgmt/create', ['cities' => $cities, 'states' => $states, 'countries' => $countries,
        'departments' => $departments, 'divisions' => $divisions,'new' => $new]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


     
        $this->validateInput($request);
        // Upload image
        // $emp = Employee::find(11);
        // $this->workexprince($request,$emp);
        // return 'ok';

        $path = $request->file('picture')->store('avatars');
        $cv = $request->file('cv')->store('cvs');
        $keys = ['firstname', 'middlename', 'address', 'state_id', 'address2','country_id','last_name','nationality','Summary_of_enrollment','volunteer','The_owners_of_inspiration','qualification','birthdate','shortdesc','phone1','phone2','email','jobtitle','gender','social_status'];
        $input = $this->createQueryInput($keys, $request);
        $input['picture'] = $path;
        $input['cv'] = $cv;
        $input['user_id'] = \Auth::user()->id;
        // Not implement yet
        $input['company_id'] = 0;
        $emp = Employee::create($input);

        if($emp){
           
            // education
            $this->education($request,$emp);
            // work experances
            $this->workexprince($request,$emp);

            //socialmedia
            $this->soicalmedia($request,$emp);

            $this->updateFirstTime();

        }//end
        Session::flash('messagea' , 'تم تعديل البيانات بنجاح');
        Session::flash('m-classa' , 'alert-success');

        return redirect()->intended('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = \Auth::user()->id;
        $employee = Employee::where('user_id','=',$id)->with('education','socialmeadi','workexprince')->first();
        $new = null;
        return view('user-employee.employees-mgmt.show',compact('employee','new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = \Auth::user()->id;
        $employee = Employee::where('user_id','=',$user_id)->first();
        // Redirect to state list if updating state wasn't existed
        if ($employee == null || count($employee) == 0) {
            return redirect()->intended('/profile');
        }
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();
        $new = 'تعديل';
        return view('user-employee.employees-mgmt/edit', ['employee' => $employee, 'cities' => $cities, 'states' => $states, 'countries' => $countries,
        'departments' => $departments, 'divisions' => $divisions,'new' => $new]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editmyaccount()
    {
        $user_id = \Auth::user()->id;
        $employee = Employee::where('user_id','=',$user_id)->first();
        // Redirect to state list if updating state wasn't existed
        if ($employee == null || count($employee) == 0) {
            return redirect()->intended('/profile');
        }
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();
        $new = 'تعديل';
        return view('user-employee.employees-mgmt/edit', ['employee' => $employee, 'cities' => $cities, 'states' => $states, 'countries' => $countries,
        'departments' => $departments, 'divisions' => $divisions,'new' => $new]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        // $this->validateInput($request);
        // Upload image
         
        $keys = ['firstname', 'middlename', 'address', 'state_id', 'address2','country_id','last_name','nationality','Summary_of_enrollment','volunteer','The_owners_of_inspiration','qualification','birthdate','shortdesc','phone1','phone2','email','jobtitle','gender','social_status'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('avatars');
            $input['picture'] = $path;
        }

        if($request->file('cv')){
            $path = $request->file('cv')->store('cvs');
            $input['cv'] = $path;
        }

        $emp = Employee::where('id', $id)
            ->update($input);
        //edits for
        if($emp){
            
            education::where('employee_id','=',$id)->delete();
            workexprince::where('employee_id','=',$id)->delete(); 
            socialmeadi::where('employee_id','=',$id)->delete();
            $emp = Employee::find($id);
             // education
            $this->education($request,$emp);
            // work experances
            $this->workexprince($request,$emp);

            //socialmedia
            $this->soicalmedia($request,$emp);
          

        }//end

        return redirect()->intended('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Employee::where('id', $id)->delete();
         return redirect()->intended('/profile');
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
        return view('user-employee.employees-mgmt/index', ['employees' => $employees, 'searchingVals' => $constraints,'new' => $new]);
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

     /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function download($name)
    {

        $patha = 'app\cvs/'.$name;
      $path = storage_path($patha);
      return response()->download($path);
    }

    private function validateInput($request) {
        $this->validate($request, [
            'firstname' => 'required|max:60',
            'middlename' => 'required|max:60',
            'last_name'  => 'required|max:60',
            'nationality'  => 'required',
            'address'  => 'required',
            'birthdate'  => 'required',
            'phone1'  => 'required',
            'gender'  => 'required',

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

    private function education($request,$emp)
    {
        $to = count($request->university_name);
           
            $degree_name = array();
            $university_name = array();
            $cgp = array();
            $error = array();
            $passing_year = array();
            $degree_name = $request->degree_name;
            $university_name = $request->university_name;
            $cgp = $request->cgp;
            $passing_year = $request->passing_year;
            for ($i=0; $i < $to; $i++) { 
               $education = new education();
               $education->university_name = $university_name[$i];
               $education->degree_name = $degree_name[$i];
               $education->cgp = $cgp[$i];
               $education->passing_year = $passing_year[$i];
               $education->employee_id = $emp->id;
               $save = $education->save();
               if(!$save){
                 return false;
               }
              
            }
            return true;
    }

    private function workexprince($request,$emp){

           $to = count($request->company_name);
            
            $company_name = array();
            $working_period = array();
            $duties = array();
            $work_type = array();
            $work_place = array();
            $work_section = array();
            
            $company_name = $request->company_name;
            $working_period = $request->working_period;
            $duties = $request->duties;
            $work_type = $request->work_type;
            $work_place = $request->work_place;
            $work_section = $request->work_section;
            for ($i=0; $i < $to; $i++) { 
                $workexprince = new workexprince();
               $workexprince->company_name = $company_name[$i];
               $workexprince->working_period = $working_period[$i];
               $workexprince->duties = $duties[$i];
               $workexprince->work_type = $work_type[$i];
               $workexprince->work_place = $work_place[$i];
               $workexprince->work_section = $work_section[$i];
               $workexprince->employee_id = $emp->id;
               $save = $workexprince->save();
                if(!$save){
                 return 'error';
               }
            }
            return true;
    }

    private function soicalmedia($request,$emp){
           $to = count($request->soicalmedia);
           
            $socila = array();
            $working_period = array();
            $soclink = array();
            
            $socila = $request->soicalmedia;
            $soclink = $request->soclink;
            
            for ($i=0; $i < $to; $i++) { 
                 $socialmeadi = new socialmeadi();
               $socialmeadi->soicalmedia = $socila[$i];
               $socialmeadi->soclink = $soclink[$i];
               $socialmeadi->employee_id = $emp->id;
               $save = $socialmeadi->save();
               if(!$save){
                 return 'error';
               }
               
            }
            return true;
    }

    private function updateFirstTime()
    {
       $user_id = \Auth::user()->id;
        $input['first_time'] = 0;
        $useremployee = User::where('id', $user_id)
        ->update($input);
    }
}
