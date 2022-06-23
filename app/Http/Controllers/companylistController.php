<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Branch;
use App\Models\PayBatch;
use App\Models\PayLocation;
use App\Models\Department;
use DB;

use Illuminate\Http\Request;

class companylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('tenantdb');
    }
    /** GEt companys
     * 
     *
     * @param  \App\Models\Company 
     * @return \Illuminate\Http\Response
     */
     public function getCompanies() {
           // dd('getCompanies');
            $company = Company::all();
            if ($company) {
                return response()->json(['status' => 'success', 'data' => $company], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }

    public function getCompany($tenantcode,$company_id) {
     //dd($company_id);
            $branch = Branch::where('company_id',$company_id)->get();
            
            if ($branch) {
                return response()->json($branch);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }

    public function getComp($tenantcode,$company_id) {
        if($company_id != 0){
            $PayBatch = PayBatch::where('company_id',$company_id)->get();
        }else{
            $PayBatch = PayBatch::all();
        }
        
        
        if ($PayBatch) {
            return response()->json($PayBatch);
        }
        return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);

    }

    public function getCompanyPayLocation($tenantcode,$company_id) {
        if($company_id != 0){
            $PayLocation = PayLocation::where('company_id',$company_id)->get();
        }else{
            $PayLocation = PayLocation::all();
        }
        
        if ($PayLocation) {
            return response()->json($PayLocation);
        }
        return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }          
    
    public function getCompanyDeps($tenantcode,$company_id) {
        if($company_id != 0){
            $department = Department::where('company_id',$company_id)->get();
        }else{
            $department = Department::all();
        }
        
        if ($department) {
            return response()->json($department);
        }
        return response()->json(['status' => 'failed', 'message' => 'No department found'], 404);
    }  

    public function getFlagCompany($tenantcode,$company_id) {
        if($company_id != 0){
             $employees = DB::select("SELECT e.*,c.comp_name,p.emp_flag  from employees e 
                                INNER JOIN company c ON c.id = e.company_id
                                INNER JOIN employee_p_files p ON p.emp_id = e.id
                                WHERE c.id = ".$company_id);
        }else{
             $employees = DB::select("SELECT e.*,c.comp_name,p.emp_flag  from employees e 
                                INNER JOIN company c ON c.id = e.company_id
                                INNER JOIN employee_p_files p ON p.emp_id = e.id
                               ");
        }
      
        if ($employees) {
            return response()->json($employees);
        }
        return response()->json($employees);
    } 
}
