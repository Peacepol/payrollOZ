<?php

namespace App\Http\Controllers;

use App\Models\CustomReference1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomReference1Controller extends Controller
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
         $ref = CustomReference1::all();
      return view ('references.customref1')->with('ref', $ref);
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
        'ref1_code'=>'required',
        'ref1_name'=>'required',
        ]);

        $input = $request->all();
        CustomReference1::create($input);
        
        \Session::put('success', 'Custom Reference Created Successfully');
        return redirect()->route('customref1.index',session('tenantcode'))->with('success', 'Custom Reference Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomReference1  $customReference1
     * @return \Illuminate\Http\Response
     */
    public function show(CustomReference1 $customReference1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomReference1  $customReference1
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomReference1 $customReference1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomReference1  $customReference1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantcode, $id )
    {
        $request ->validate([
        'ref1_name'=>'required',
        'ref1_code'=>'required',
        ]);
          $customReference1 = CustomReference1::find($id);
        if(!is_null($customReference1)){
            $customReference1->ref1_name = $request->input('ref1_name');
            $customReference1->ref1_code = $request->input('ref1_code');
            
            if($customReference1->update()){
            
                \Session::put('success', 'Custom Reference 1 Updated Successfully');
                return redirect()->route('customref1.index', session('tenantcode'))->with('success', 'Custom Reference 1 Updated Successfully');
            }
            
            }else{
                return redirect()->route('customref1.index', session('tenantcode'))->with('failed', 'Custom Reference 1 Updated Failed');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomReference1  $customReference1
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomReference1 $customReference1, $tenantcode, $id )
    {
          $ref1 = CustomReference1::find($id);
        if ($ref1) {
          $ref1->delete();
          \Session::put('success', 'Custom Reference 1 Deleted Succesfully!');
          return redirect()->route('customref1.index', session('tenantcode'))->with('success', 'Custom Reference 1 Deleted Succesfully!'); 
        }else{
            return redirect()->route('customref1.index',session('tenantcode'))->with('failed', 'Custom Reference 1 Deleted Failed'); 
        }
    }
}
