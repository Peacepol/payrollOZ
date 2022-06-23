<?php

namespace App\Http\Controllers;

use App\Models\Empsuper;
use App\Models\costcentre;
use App\Models\PayBatch;
use App\Models\PayLocation;
use App\Models\Company;
use App\Models\Department;
use App\Models\Branch;
use App\Models\EmployeeStatus;
use App\Models\EmployeePosition;
use App\Models\Employee;
use App\Models\EmployeePFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees = DB::select("SELECT e.*,comp_name  from employees e INNER JOIN company c ON c.id = e.company_id");
      //$employees = Employee::all();
        return view ('employees.employee_list')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $paybatch = PayBatch::all();
        $paylocation = PayLocation::all();
        $costcentre = costcentre::all();
        $status = EmployeeStatus::all();
        $positions = EmployeePosition::all();
        return view('employees.employee_create')->with('positions', $positions)->with('status', $status)->with('paybatch', $paybatch)->with('paylocation', $paylocation)->with('costcentre', $costcentre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tenantcode)
    { 
   // dd($request);
        $input = $request->all();
        Validator::make($input,["emp_code" => 'required|unique:employees',
                    "emp_alphacode" => 'required|unique:employees',
                    "company_id" => 'required|not_in:0',
                    "emp_branchid" => 'required|not_in:0',
                    "emp_depid" => 'required|not_in:0',
                    "emp_fname" => 'required',
                    "emp_mname" => 'required',
                    "emp_lname" => 'required',
                    "emp_dob" => 'required',
                    "emp_mstatus" => 'required',
                    "emp_gender" => 'required',
                    "emp_doe" => 'required',
                    "emp_estatus" => 'required',
                    "emp_position" =>'required',
                    "emp_email" =>'required',
                    "emp_nationality" => 'required',
                    "emp_religion" => 'required',
                    ],[
        'emp_code.unique' => 'Employee code is already taken.',
        'emp_alphacode.unique' => 'Employee Alphe code is already taken.',
        'emp_alphacode.required' => 'Employee Alphe code is required.',
        'emp_code.required' => 'Employee code is required.',
        ])->validate();
     
        $employee = Employee::create($input)->id;
   
        $emppfile = ['emp_id'=>$employee,
                    'emp_dependents'=>$request->input('emp_dependents'),
                    'emp_rateyear'=>$request->input('emp_rateyear'),
                    'emp_paymode'=>$request->input('emp_paymode'),
                    'emp_rateunit'=>$request->input('emp_rateunit'),
                    'emp_taxformlodged'=>$request->input('emp_taxformlodged'),
                    'emp_res'=>$request->input('emp_res'),
                    'emp_paylocid'=>$request->input('emp_paylocid'),
                    'emp_paynoid'=>$request->input('emp_paynoid'),
                    'emp_costid'=>$request->input('emp_costid'),
                    'emp_supervisor'=>$request->input('emp_supervisor'),
                    'emp_ncsl'=>$request->input('emp_ncsl'), ];
        EmployeePFile::create($emppfile);

        $myItems = [

            ['emp_id'=>$employee,'sup_num'=>'1'],

            ['emp_id'=>$employee,'sup_num'=>'2'],

            ['emp_id'=>$employee,'sup_num'=>'3']
        ];

        DB::table("empsuper")->insert($myItems);        

        return redirect()->route('employee.index',session('tenantcode'))->with('success', 'Employee Successfully Added');
     
                 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id)
    {
        $activetab = $request->input('activetab');
        //die($activetab);
        if($activetab == 'personaldetails'){
            $input = $request->all();
            Validator::make($input,["emp_code" => 'required',
                        "emp_alphacode" => 'required',
                        "company_id" => 'required|not_in:0',
                        "emp_branchid" => 'required|not_in:0',
                        "emp_depid" => 'required|not_in:0',
                        "emp_fname" => 'required',
                        "emp_mname" => 'required',
                        "emp_lname" => 'required',
                        "emp_dob" => 'required',
                        "emp_mstatus" => 'required',
                        "emp_gender" => 'required',
                        "emp_doe" => 'required',
                        "emp_estatus" => 'required',
                        "emp_position" =>'required',
                        "emp_email" =>'required',
                        "emp_nationality" => 'required',
                        "emp_religion" => 'required',
                        ])->validate();
            $employees = Employee::find($id);
            if($employees->update($input)){
                return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Personal Details Successfully Updated');
            }
        }else if($activetab == 'payrolldetails'){
            $input = $request->all();
            Validator::make($input,["emp_paylocid" => 'required',
                    "emp_paynoid" => 'required',
                    "emp_costid" => 'required',
                    "emp_ncsl" => 'required',
                    ])->validate();
            $employeesfile = EmployeePFile::find($id);
            if($employeesfile->update($input)){
                return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Payroll Details Successfully Updated');
            }
        }else if($activetab == 'superannuation'){

            $input = request()->except(['_token', '_method', 'activetab', 'sup_num']);
            Validator::make($input,["emp_id" => 'required',
            ])->validate();            

            $empsuper = Empsuper::where('emp_id', $id)->where('sup_num', $request->input('sup_num')); 
            if(!is_null($empsuper)){
                if($request->input('sup_num') == 1){
                    if($empsuper->update(['sup_id' => $request->input('sup_id1'),
                                            'sup_no' => $request->input('sup_no1'),
                                            'sup_commence' => $request->input('sup_commence1'),
                                            'sup_productno' => $request->input('sup_productno1')])){                
                        return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Superannuation Successfully Updated');
                    }
                }else if($request->input('sup_num') == 2){
                    if($empsuper->update(['sup_id' => $request->input('sup_id2'),
                                            'sup_no' => $request->input('sup_no2'),
                                            'sup_commence' => $request->input('sup_commence2'),
                                            'sup_productno' => $request->input('sup_productno2')])){                
                        return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Superannuation Successfully Updated');
                    }
                }else{
                    if($empsuper->update(['sup_id' => $request->input('sup_id3'),
                                            'sup_no' => $request->input('sup_no3'),
                                            'sup_commence' => $request->input('sup_commence3'),
                                            'sup_productno' => $request->input('sup_productno3')])){                
                        return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Superannuation Successfully Updated');
                    }
                }
            }
        }else if($activetab == 'empcontacts'){
            $input = $request->all();
            Validator::make($input,["emp_id" => 'required',
                                    "emp_comments" => 'required'
                                    ])->validate();
            $employees = Employee::find($id);
            if($employees->update(['emp_comments' => $request->input('emp_comments')])){
                return redirect()->route('employeefile.show', [session('tenantcode'), $id])->with('success','Employee Comment Successfully Updated');
            }        
        }




    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
