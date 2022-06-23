<?php

namespace App\Http\Controllers;

use App\Models\CustomReference2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomReference2Controller extends Controller
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
        
        $ref = CustomReference2::all();
        return view ('references.customref2')->with('ref', $ref);
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
        'ref2_code'=>'required',
        'ref2_name'=>'required',
        ]);

        $input = $request->all();
        CustomReference2::create($input);
        
        \Session::put('success', 'Custom Reference 2 Created Successfully');
        return redirect()->route('customref2.index',session('tenantcode'))->with('success', 'Custom Reference 2 Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomReference2  $customReference2
     * @return \Illuminate\Http\Response
     */
    public function show(CustomReference2 $customReference2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomReference2  $customReference2
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomReference2 $customReference2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomReference2  $customReference2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id )
    {
        $request ->validate([
        'ref2_name'=>'required',
        'ref2_code'=>'required',
        ]);
          $ref2 = CustomReference2::find($id);
        if(!is_null($ref2)){
            $ref2->ref1_name = $request->input('ref2_name');
            $ref2->ref1_code = $request->input('ref2_code');
            
            if($ref2->update()){
            
                \Session::put('success', 'Custom Reference 2 Updated Successfully');
                return redirect()->route('customref2.index', session('tenantcode'))->with('success', 'Custom Reference 2 Updated Successfully');
            }
            
            }else{
                return redirect()->route('customref2.index', session('tenantcode'))->with('failed', 'Custom Reference 2 Updated Failed');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomReference2  $customReference2
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomReference2 $customReference2, $tenantcode, $id )
    {
          $ref2 = CustomReference2::find($id);
        if ($ref2) {
          $ref2->delete();
          \Session::put('success', 'Custom Reference 2 Deleted Succesfully!');
          return redirect()->route('customref1.index', session('tenantcode'))->with('success', 'Custom Reference 2 Deleted Succesfully!'); 
        }else{
            return redirect()->route('customref1.index',session('tenantcode'))->with('failed', 'Custom Reference 2 Deleted Failed'); 
        }
    }
}
