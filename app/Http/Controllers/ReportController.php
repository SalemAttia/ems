<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Anam\PhantomMagick\Converter;
use App\education;
use App\workexprince;


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
        $this->middleware('admin');
    }

    public function index() {
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

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) {
        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('/admin/system-management/report');
    }

    public function exportPDF(Request $request) {
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
            'qualification' => $request->searchby['qualification'],
            'passing_year'  => $request->searchby['passing_year'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration'],
            'working_period' => $request->searchby['working_period'],
            'work_type' => $request->searchby['work_type'],
            'work_section' => $request->searchby['work_section'],
            'work_place' => $request->searchby['work_place']
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
            'qualification' => $request->searchby['qualification'],
            'passing_year'  => $request->searchby['passing_year'],
            'The_owners_of_inspiration' => $request->searchby['The_owners_of_inspiration'],
            'working_period' => $request->searchby['working_period'],
            'work_type' => $request->searchby['work_type'],
            'work_section' => $request->searchby['work_section'],
            'work_place' => $request->searchby['work_place']
            ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints) {
        $query = DB::table('employees')->select('employees.firstname as employee_name', 'employees.*');


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
            if($item[$i] == 'passing_year' || $item[$i] == 'working_period' || $item[$i] == 'work_type' || $item[$i] == 'work_section' || $item[$i] == 'work_place' || $item[$i] == 'qualification'){
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

    private function getExportingData($constraints) {
          $query = DB::table('employees')->select('employees.id as التسلسل','employees.firstname as الاسم الوال','employees.last_name as العائلة', 'employees.middlename as الاوسط', 
        'employees.nationality as الجنسية','employees.birthdate as تاريخ الميلاد','employees.email as الايميل','employees.address as العنوان الاساسى', 'employees.address2 as العنوان المؤقت','employees.phone1 as الهاتف المتحرك','employees.phone2 as الهاتف2 المتحرك 2','employees.shortdesc as نبذه','employees.social_status as الحالة الاجتماعية');

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
