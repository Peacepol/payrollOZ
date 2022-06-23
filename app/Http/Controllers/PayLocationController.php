<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayLocation;
use App\Models\Company;

class PayLocationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paylocations = PayLocation::all();
        $company = Company::all();
        return view ('references.PayLocation')->with('PayLocation', $paylocations)->with('company', $company);       
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

        $this->validate($request,[
		'paylocation_name' =>'required',
		'paylocation_code' =>'required',
        'company'=>'required',
		]);

        $paylocation = new PayLocation;
        $paylocation->company_id = $request->input('company');
        $paylocation->paylocation_name = $request->input('paylocation_name');
        $paylocation->paylocation_code = $request->input('paylocation_code');
        $paylocation->save();
        return redirect()->route('PayLocation.index', session('tenantcode'))->with('success', 'Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function show($id)
   // {
        //
   // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function edit($id)
   // {
        //
    //}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id )
    {        
        
        $this->validate($request,[
		    'paylocation_name' =>'required',
		    'paylocation_code' =>'required',
            'company'=>'required',
		]);

        $PayLocation = PayLocation::find($id);
        
        if(!is_null($PayLocation)){
            $PayLocation->company_id = $request->input('company');
            $PayLocation->paylocation_name = $request->input('paylocation_name');
            $PayLocation->paylocation_code = $request->input('paylocation_code');            
            if($PayLocation->update()){
                return redirect()->route('PayLocation.index', session('tenantcode'))->with('success', 'Data updated!');
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
        $PayLocation = PayLocation::find($id);
        if ($PayLocation) {
          $PayLocation->delete();
          return redirect()->route('PayLocation.index', session('tenantcode'))->with('success', 'Cost Centre Deleted Succesfully!'); 
        }else{
            die($id);
        }
                
    }
}
