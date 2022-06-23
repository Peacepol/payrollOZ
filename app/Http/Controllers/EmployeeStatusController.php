<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use Illuminate\Support\Facades\Session;

class EmployeeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = EmployeeStatus::all();
        return view ('references.empstatus')->with('status', $status);       
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
		'status_name' =>'required',
		'status_code' =>'required',
		]);

        $input = $request->all();
        EmployeeStatus::create($input);
        return redirect()->route('empstatus.index', session('tenantcode'))->with('success','Data Saved!');
    }
    public function update(Request $request, $tenantcode, $id )
    {        
        
        $this->validate($request,[
		    'status_name' =>'required',
		    'status_code' =>'required',
		]);

        $status = EmployeeStatus::find($id);
        
        if(!is_null($status)){
            $status->status_name = $request->input('status_name');
            $status->status_code = $request->input('status_code');
            
            if($status->update()){
                return redirect()->route('empstatus.index', session('tenantcode'))->with('success','Data Updated!');
                
            }
        }else{
            die($id);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $tenantcode, $id )
    {
        $status = EmployeeStatus::find($id);
        if ($status) {
          $status->delete();
          return redirect()->route('empstatus.index', session('tenantcode'))->with('success', 'status Deleted Succesfully!');
        }else{
            die($id);
        }          
    } 
}
