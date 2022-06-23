<?php

namespace App\Http\Controllers;

use App\Models\CustomReference3;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomReference3Controller extends Controller
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
        $ref3 = CustomReference3::all();
        return view ('references.customref3')->with('ref3', $ref3);
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
        'ref3_code'=>'required',
        'ref3_name'=>'required',
        ]);

        $input = $request->all();
        CustomReference3::create($input);
        
        \Session::put('success', 'Custom Reference 3 Created Successfully');
        return redirect()->route('customref3.index',session('tenantcode'))->with('success', 'Custom Reference 3 Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomReference3  $customReference3
     * @return \Illuminate\Http\Response
     */
    public function show(CustomReference3 $customReference3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomReference3  $customReference3
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomReference3 $customReference3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomReference3  $customReference3
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $tenantcode, $id )
    {
        $request ->validate([
        'ref3_name'=>'required',
        'ref3_code'=>'required',
        ]);
          $ref3 = CustomReference3::find($id);
        if(!is_null($ref3)){
            $ref3->ref3_name = $request->input('ref3_name');
            $ref3->ref3_code = $request->input('ref3_code');
            
            if($ref3->update()){
            
                \Session::put('success', 'Custom Reference 2 Updated Successfully');
                return redirect()->route('customref3.index', session('tenantcode'))->with('success', 'Custom Reference 3 Updated Successfully');
            }
            
            }else{
                return redirect()->route('customref3.index', session('tenantcode'))->with('failed', 'Custom Reference 3 Updated Failed');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomReference3  $customReference3
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomReference3 $customReference2, $tenantcode, $id )
    {
          $ref3 = CustomReference3::find($id);
        if ($ref3) {
          $ref3->delete();
          \Session::put('success', 'Custom Reference 3 Deleted Succesfully!');
          return redirect()->route('customref3.index', session('tenantcode'))->with('success', 'Custom Reference 3 Deleted Succesfully!'); 
        }else{
            return redirect()->route('customref3.index',session('tenantcode'))->with('failed', 'Custom Reference 3 Deleted Failed'); 
        }
    }
}
