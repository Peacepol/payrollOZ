<?php

namespace App\Http\Controllers;
use DB;
use App\Models\EmployeePFile;
use Illuminate\Http\Request;

class EmployeePFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('tenantdb');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select("SELECT e.*,c.comp_name,p.emp_flag  from employees e 
                                INNER JOIN company c ON c.id = e.company_id
                                INNER JOIN employee_p_files p ON p.emp_id = e.id
                                ");
        return view ('employees.employee_flag')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeePFile  $employeePFile
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePFile $employeePFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeePFile  $employeePFile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePFile $employeePFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePFile  $employeePFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id)
    {
    //dd($request);
        
          $empfile = EmployeePFile::where('emp_id',$id)->first();
       //dd( $empfile);
        if(!is_null($empfile))
        {

            $empfile->emp_flag = $request->input("emp_flag$id");
            $empfile->emp_dot = $request->input("emp_dot$id");
            
            if($empfile->update())
            {
                return redirect()->route('employeeflag.index', session('tenantcode'))->with('success', 'Branch Updated Successfully');
            }

        }else
        {
            return redirect()->route('employeeflag.index', session('tenantcode'))->with('failed', 'Branch Updated Failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePFile  $employeePFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePFile $employeePFile)
    {
        //
    }
    public function FlagFilter($tenantcode,$filter)
    {
           
          if($filter != '0'){
             $employees = DB::select("SELECT e.*,c.comp_name,p.emp_flag  from employees e 
                                INNER JOIN company c ON c.id = e.company_id
                                INNER JOIN employee_p_files p ON p.emp_id = e.id
                                WHERE p.emp_flag = '".$filter."'");
        }else{
             $employees = DB::select("SELECT e.*,c.comp_name,p.emp_flag  from employees e 
                                INNER JOIN company c ON c.id = e.company_id
                                INNER JOIN employee_p_files p ON p.emp_id = e.id
                               ");
        }
      
        if ($filter) {
            return response()->json($employees);
        }
        return response()->json($employees);
    }
    //FlagFilter
}
