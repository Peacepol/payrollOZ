<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePosition;
use Illuminate\Support\Facades\Session;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = EmployeePosition::all();
        return view ('references.empposition')->with('positions', $positions);       
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
		'position_name' =>'required',
		'position_code' =>'required',
		]);

        $input = $request->all();
        EmployeePosition::create($input);
        return redirect()->route('empposition.index', session('tenantcode'))->with('success','Data Saved!');
    }
    public function update(Request $request, $tenantcode, $id )
    {        
        $this->validate($request,[
		    'position_name' =>'required',
		    'position_code' =>'required',
		]);

        $position = EmployeePosition::find($id);
        
        if(!is_null($position)){
            $position->position_name = $request->input('position_name');
            $position->position_code = $request->input('position_code');
            
            if($position->update()){
                return redirect()->route('empposition.index', session('tenantcode'))->with('success','Data Updated!');
                
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
        $position = EmployeePosition::find($id);
        if ($position) {
          $position->delete();
          return redirect()->route('empposition.index', session('tenantcode'))->with('success', 'Position Deleted Succesfully!');
        }else{
            die($id);
        }          
    }     
}
