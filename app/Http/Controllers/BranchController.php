<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
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
       $branches = Branch::all();
       $company = Company::all();
      return view ('org.branch')->with('branches', $branches)->with('company', $company); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('org.branch_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
        'branch_name'=>'required',
        'branch_code'=>'required',
        'company_id'=>'required',
        ]);

        $input = $request->all();
        Branch::create($input);
        return redirect()->route('branch.index',session('tenantcode'))->with('success', 'Branch Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show($tenantcode,$id)
    { 
        $branch = Branch::where('id','=', $id)->first();
     return view('org.branch')->with(compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('org.branch_edit')->with(compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id)
    {
        $request ->validate([
        'branch_name'=>'required',
        'branch_code'=>'required',
        ]);
          $branch = Branch::find($id);
        if(!is_null($branch)){
            $branch->branch_name = $request->input('branch_name');
            $branch->branch_code = $request->input('branch_code');
            $branch->branch_address = $request->input('branch_address');
            
            if($branch->update()){
                return redirect()->route('branch.index', session('tenantcode'))->with('success', 'Branch Updated Successfully');
            }

            }else{
                return redirect()->route('branch.index', session('tenantcode'))->with('failed', 'Branch Updated Failed');
            }

        // $branch -> update($request->all());
        // return redirect()->route('branch.index')->with('success', 'Branch Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$tenantcode,$id)//delete company
    {
        //$res=Branch::where('id',$id)->delete();
           $branch = Branch::find($id);
        if ($branch) {
          $branch->delete();
          return redirect()->route('branch.index', session('tenantcode'))->with('success', 'Branch Deleted Succesfully!'); 
        }else{
            return redirect()->route('branch.index',session('tenantcode'))->with('failed', 'Branch Deleted Failed'); 
        }
    }
    
    public function getBranchList() {
            $branch = Branch::all();
            if ($branch) {
                return response()->json(['status' => 'success', 'data' => $branch], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }

}
