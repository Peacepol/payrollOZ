<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
         $department = Department::all();
      return view ('org.department')->with('department', $department);
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
      $request ->validate([
        'dep_name'=>'required',
        'dep_code'=>'required',
        'company_id'=>'required',
        ]);

        $input = $request->all();
        Department::create($input);
        
        \Session::put('success', 'Department Created Successfully');
        return redirect()->route('department.index',session('tenantcode'))->with('success', 'Department Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $tenantcode, $id)
    {
        $request ->validate([
        'dep_name'=>'required',
        'dep_code'=>'required',
        ]);
          $department = Department::find($id);
        if(!is_null($department)){
            $department->dep_name = $request->input('dep_name');
            $department->dep_code = $request->input('dep_code');
            
            if($department->update()){
            
                \Session::put('success', 'Department Updated Successfully');
                return redirect()->route('department.index', session('tenantcode'))->with('success', 'Department Updated Successfully');
            }
            
            }else{
                return redirect()->route('department.index', session('tenantcode'))->with('failed', 'Department Updated Failed');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$tenantcode,$id)//delete company
    {    $department = Department::find($id);
        if ($department) {
          $department->delete();
          \Session::put('success', 'Department Deleted Succesfully!');
          return redirect()->route('department.index', session('tenantcode'))->with('success', 'Department Deleted Succesfully!'); 
        }else{
            return redirect()->route('department.index',session('tenantcode'))->with('failed', 'Department Deleted Failed'); 
        }
    }
      public function getDepartmentList() {
            $department = Department::all();
            if ($department) {
                return response()->json(['status' => 'success', 'data' => $department], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }
}
