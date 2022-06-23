<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
     public function __construct()
    {
        $this->middleware('tenantdb');
          $this->middleware('authclient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
      return view ('org.company_list')->with('company', $company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('org.company_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$tenancode,$id)
    {    $request ->validate([
        'comp_name'=>'required',
        'comp_trading'=>'required',
        'comp_email'=>'required',
        'comp_initpy'=>['required','max:4']
        ]);
        $input = $request->all();
        Company::create($input);
        return redirect()->route('company.index',session('tenantcode'))->with('success', 'Company Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,$tenancode,$id)
    {
     return view('org.company_show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Company $company)
    {
        return view('org.company_edit')->with(compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
       
        $company -> update($request->all());
        return redirect()->route('company.index')->with('success', 'Company Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('success', 'Company Deleted');   
    }
    /**
     * 
     *
     * @param  \App\Models\Company  $branch
     * @return \Illuminate\Http\Response
     */
    public function getCompanies() {
            $company = Company::all();
            if ($company) {
                return response()->with('success', $company);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }
}
