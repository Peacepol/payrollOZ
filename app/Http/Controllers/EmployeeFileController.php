<?php

namespace App\Http\Controllers;


use App\Models\Empsuper;
use App\Models\SuperFunds;
use App\Models\EmployeePFile;
use App\Models\costcentre;
use App\Models\PayBatch;
use App\Models\PayLocation;
use App\Models\Company;
use App\Models\Department;
use App\Models\Branch;
use App\Models\EmployeeStatus;
use App\Models\EmployeePosition;
use App\Models\Employee;
use App\Models\EmpContacts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class EmployeeFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index($id)
    {
        //die($id);
        
        $employees = Employee::all();
        $empcontacts = EmpContacts::all();
        return view ('employees.employee_file')->with('employees', $employees)->with('empcontacts', $empcontacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request,[
            'emp_cname' =>'required',
            'emp_cmobile' =>'required',
            ]);
            $empid = $request->input('emp_id');
            //die($empid);
            $input = $request->all();
            EmpContacts::create($input);
            return redirect()->route('employeefile.show', [session('tenantcode'), $empid])->with('success','Employee Info Contact Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($tenantcode,$id)
    {
        //die($id);
        $super = SuperFunds::all();
        $paybatch = PayBatch::all();
        $paylocation = PayLocation::all();
        $costcentre = costcentre::all();
        $company = Company::all();
        $branchs = Branch::all();
        $departments = Department::all();
        $status = EmployeeStatus::all();
        $positions = EmployeePosition::all();
        $employees = Employee::find($id);        
        $employeesfile = EmployeePFile::find($id);
        $empsuper = Empsuper::where('emp_id', $id)->get(); //DB::select("SELECT * FROM empsuper WHERE emp_id = '$id' AND sup_num = '1'");
        $empcontacts = DB::select("SELECT * FROM empcontact WHERE emp_id = $id");
        //die($empsuper);
        return view ('employees.employee_file')->with('employees', $employees)->with('employeesfile', $employeesfile)->with('empsuper', $empsuper)->with('empcontacts', $empcontacts)->with('positions', $positions)->with('status', $status)->with('branchs', $branchs)->with('departments', $departments)->with('company', $company)->with('paybatch', $paybatch)->with('paylocation', $paylocation)->with('costcentre', $costcentre)->with('super', $super);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, $tenantcode, $id)
    {
        
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
        $this->validate($request,[
            'emp_cname' =>'required',
            'emp_cmobile' =>'required',
		]);

        $empcontacts = EmpContacts::find($id);
        if(!is_null($empcontacts)){
            $input = $request->all();
            if($empcontacts->update($input)){
                $empid = $request->input('emp_id');
                return redirect()->route('employeefile.show', [session('tenantcode'), $empid])->with('success','Employee Info Contact Data Updated!');
            }
        }else{
            die($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $tenantcode, $id)
    {
        $empid = $request->input('emp_id');
        //die($empid);
        $empcontacts = EmpContacts::find($id);
        if ($empcontacts) {
          $empcontacts->delete();
          return redirect()->route('employeefile.show', [session('tenantcode'), $empid])->with('success','Employee Info Contact Deleted Succesfully!');
        }else{
            die($id);
        }
    }
}
