<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('tenantdb');
    }

    public function index()// show all companies
    {
    $company = Company::all();
    return view ('org.company_list')->with('company', $company);
    }
    public function create()// show create company form
    {
        return view('org.company_create');
    }

    public function show($tenantcode,$id)//show company
    { 
    $company = Company::where('id','=', $id)->first();
       //dd($company);
     return view('org.company_show')->with(compact('company'));
    }

     public function edit($tenantcode,$id)//edit company page 
    {
     $company = Company::where('id','=', $id)->first();
     return view('org.company_edit')->with(compact('company'));
    }
    public function store(Request $request)
    { 
       $request ->validate([
        'comp_name'=>'required',
        'comp_trading'=>'required',
        'comp_email'=>'required',
        'comp_initpy'=>['required','max:4']
        ]);
        $input = $request->all();
        Company::create($input);
        return redirect()->route('company.index',session('tenantcode'))->with('success', 'Company Successfully Added');  
    }

    public function update(Request $request)//update company  
    {
  
     $company = Company::find($request->comp_id);
     $company -> update($request->all());
    return redirect()->route('company.index',session('tenantcode'))->with('success', 'Company Updated Successfully'); 
    }

    public function destroy(Request $request,$tenantcode,$id)//delete company
    {
        $res=Company::where('id',$id)->delete();
         if ($res){
        return redirect()->route('company.index',session('tenantcode'))->with('success', 'Company Deleted'); 
         }
         else{
         return redirect()->route('company.index',session('tenantcode'))->with('failed', 'Company Deleted Failed'); 
         }  
    }
    public function getCompanyList() {
           // dd('getCompanies');
            $company = Company::all();
            if ($company) {
                return response()->json(['status' => 'success', 'data' => $company], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }
}
