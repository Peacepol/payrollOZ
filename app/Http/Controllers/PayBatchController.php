<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayBatch;
use App\Models\Company;

class PayBatchController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PayBatchs = PayBatch::all();
        $company = Company::all();
        return view ('references.PayBatch')->with('PayBatchs', $PayBatchs)->with('company', $company);       
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
		'paybatch_name' =>'required',
		'paybatch_code' =>'required',
        'company'=>'required',
		]);

        $paybatch = new PayBatch;
        $paybatch->company_id = $request->input('company');
        $paybatch->paybatch_name = $request->input('paybatch_name');
        $paybatch->paybatch_code = $request->input('paybatch_code');
        $paybatch->save();
        return redirect()->route('PayBatch.index', session('tenantcode'))->with('success', 'Data Saved!');
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
		    'paybatch_name' =>'required',
		    'paybatch_code' =>'required',
            'company'=>'required',
		]);

        $PayBatch = PayBatch::find($id);
        
        if(!is_null($PayBatch)){
            $PayBatch->company_id = $request->input('company');
            $PayBatch->paybatch_name = $request->input('paybatch_name');
            $PayBatch->paybatch_code = $request->input('paybatch_code');            
            if($PayBatch->update()){
                return redirect()->route('PayBatch.index', session('tenantcode'))->with('success', 'Data updated!');
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
        $PayBatch = PayBatch::find($id);
        if ($PayBatch) {
          $PayBatch->delete();
          return redirect()->route('PayBatch.index', session('tenantcode'))->with('success', 'Cost Centre Deleted Succesfully!'); 
        }else{
            die($id);
        }
                
    }
}
