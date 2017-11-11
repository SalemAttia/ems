<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Anam\PhantomMagick\Converter;

class ReportController extends Controller
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

    public function index() {
        $constraints = [
            'jobtitle' => null,
            'gender' => null,
            'social_status' => null,
            'qualification'  => null,
            'The_owners_of_inspiration' => null
            ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) {
        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('system-management/report');
    }

    public function exportPDF(Request $request) {
        $constraints = [
           'jobtitle' => $request->searchby['jobtitle'],
            'gender' => $request->searchby['gender'],
            'social_status' => $request->searchby['social_status'],
            'qualification'  => $request->searchby['qualification'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration']
            ];
        $employees = $this->getExportingData($constraints);
       
         // $conv = Converter::make('system-mgmt/report/pdf',['employees' => $employees, 'searchingVals' => $constraints])
         // ->toPdf()
         // ->download('abcd.pdf');
         // return $conv;

        $view     = \View::make('system-mgmt/report/pdf',['employees' => $employees, 'searchingVals' => $constraints]);

      return $view->render();
      
        // $view = PDF::loadView('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
        
        // return $view->download('report_from_'. $request['from'].'_to_'.$request['to'].'.pdf');
        // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
    }
    
    private function prepareExportingData($request) {
        $author = Auth::user()->username;
        $constraints = [
            'jobtitle' => $request->searchby['jobtitle'],
            'gender' => $request->searchby['gender'],
            'social_status' => $request->searchby['social_status'],
            'qualification'  => $request->searchby['qualification'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration']
            ];
        $employees = $this->getExportingData($constraints);
        return Excel::create('report_from_', function($excel) use($employees, $request, $author) {

        // Set the title
        $excel->setTitle('List of hired employees from');

        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('ems');

        // Call them separately
        $excel->setDescription('The list of hired employees');

        $excel->sheet('Hired_Employees', function($sheet) use($employees) {

        $sheet->fromArray($employees);
            });
        });
    }

    public function search(Request $request) {
       $constraints = [
            'jobtitle' => $request->searchby['jobtitle'],
            'gender' => $request->searchby['gender'],
            'social_status' => $request->searchby['social_status'],
            'qualification'  => $request->searchby['qualification'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration']
            ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints) {
         $query = DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->select('employees.firstname as employee_name', 'employees.*','department.name as department_name', 'department.id as department_id');

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
            $query = $query->where($item[$i], 'like', '%'.$val[$i].'%');
        }
        return $query->paginate(10); 
      }else{
        return $query->paginate(10);
    }
    }

    private function getExportingData($constraints) {
          $query = DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        ->leftJoin('country', 'employees.country_id', '=', 'country.id')
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.firstname as الاسم الوال','employees.last_name as العائلة', 'employees.middlename as الاوسط', 
        'employees.nationality as الجنسية','employees.birthdate as تاريخ الميلاد','employees.email as الايميل','employees.address as العنوان الاساسى', 'employees.address2 as العنوان المؤقت','employees.phone1 as الهاتف المتحرك','employees.phone2 as الهاتف المتحرك 2','employees.jobtitle as الفئة الوظيفية','employees.shortdesc as نبذه','employees.social_status as الحالة الاجتماعية', 'employees.qualification as المؤهل');

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
            $query = $query->where($item[$i], 'like', '%'.$val[$i].'%');
        }
         return $query->get()->map(function ($item, $key) {
        return (array) $item;
        })->all();
      }else{
        return $query->get()->map(function ($item, $key) {
        return (array) $item;
        })->all();
    }
    
    }
}
