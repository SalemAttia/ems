<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\degree;

class DegreeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = degree::paginate(10);

        return view('system-mgmt/degree/index', ['degrees' => $degrees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/degree/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         degree::create([
            'name' => $request['name']
        ]);

        return redirect()->intended('/admin/system-management/degree');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $degree = degree::find($id);
        // Redirect to degree list if updating degree wasn't existed
        if ($degree == null || count($degree) == 0) {
            return redirect()->intended('/admin/system-management/degree');
        }

        return view('system-mgmt/degree/edit', ['degree' => $degree]);
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
        $degree = degree::findOrFail($id);
        
        $input = [
            'name' => $request['name']
        ];
        degree::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/admin/system-management/degree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        degree::where('id', $id)->delete();
         return redirect()->intended('/admin/system-management/degree');
    }

    /**
     * Search degree from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $degrees = $this->doSearchingQuery($constraints);
       return view('system-mgmt/degree/index', ['degrees' => $degrees, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = degree::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:60|unique:degrees'
    ]);
    }
}
