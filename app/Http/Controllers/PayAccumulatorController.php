<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayAccumulator;


class PayAccumulatorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payaccumulators = PayAccumulator::all();
        return view ('references.payaccumulator')->with('payaccumulators', $payaccumulators);       
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
		'payaccumulator_name' =>'required',
		'payaccumulator_code' =>'required',
		]);

        $input = $request->all();
        payaccumulator::create($input);
        return redirect()->route('PayAccumulator.index', session('tenantcode'))->with('success','Data Saved!');;
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
		    'payaccumulator_name' =>'required',
		    'payaccumulator_code' =>'required',
		]);

        $payaccumulator = PayAccumulator::find($id);
        
        if(!is_null($payaccumulator)){
            $payaccumulator->payaccumulator_name = $request->input('payaccumulator_name');
            $payaccumulator->payaccumulator_code = $request->input('payaccumulator_code');
            
            if($payaccumulator->update()){
                return redirect()->route('PayAccumulator.index', session('tenantcode'))->with('success','Data Updated!');
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
        $payaccumulator = PayAccumulator::find($id);
        if ($payaccumulator) {
          $payaccumulator->delete();
          return redirect()->route('PayAccumulator.index', session('tenantcode'))->with('success','Pay Accumulator Deleted Succesfully!'); 
        }else{
            die($id);
        }
                
    }
     public function getAccumulators() {
            $accum = PayAccumulator::all();
            if ($accum) {
                return response()->json(['status' => 'success', 'data' => $accum], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No companies found'], 404);
    }
}
