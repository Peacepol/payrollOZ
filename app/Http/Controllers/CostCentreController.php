<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costcentre;
use Illuminate\Support\Facades\Session;

class CostCentreController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costcentres = costcentre::all();
        return view ('references.costcentre')->with('costcentres', $costcentres);       
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
		'cost_name' =>'required',
		'cost_code' =>'required',
		]);

        $input = $request->all();
        costcentre::create($input);
        return redirect()->route('costcentre.index', session('tenantcode'))->with('success','Data Saved!');
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
		    'cost_name' =>'required',
		    'cost_code' =>'required',
		]);

        $costcentre = costcentre::find($id);
        
        if(!is_null($costcentre)){
            $costcentre->cost_name = $request->input('cost_name');
            $costcentre->cost_code = $request->input('cost_code');
            
            if($costcentre->update()){
                return redirect()->route('costcentre.index', session('tenantcode'))->with('success','Data Updated!');
                
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
        $costcentre = costcentre::find($id);
        if ($costcentre) {
          $costcentre->delete();
          return redirect()->route('costcentre.index', session('tenantcode'))->with('success', 'Cost Centre Deleted Succesfully!');
        }else{
            die($id);
        }
                
    }
}
