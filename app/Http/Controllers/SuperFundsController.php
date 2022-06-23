<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperFunds;
use Illuminate\Support\Facades\Session;

class SuperFundsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superfunds = SuperFunds::all();
        return view ('references.SuperFunds')->with('superfunds', $superfunds);       
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
            'product_name' =>'required',
            'registered_name' =>'required',
            ]);
    
            $input = $request->all();
            
            SuperFunds::create($input);
            $request->session()->put('success','Data Saved!');
            return redirect()->route('SuperFunds.index', session('tenantcode')); 
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
		    'product_name' =>'required',
		    'registered_name' =>'required',
		]);

        $superfunds = SuperFunds::find($id);
        
        if(!is_null($superfunds)){
            $superfunds->product_name = $request->input('product_name');
            $superfunds->registered_name = $request->input('registered_name');
            $superfunds->physical_address_line_1 = $request->input('physical_address_line_1');
            $superfunds->physical_address_line_2 = $request->input('physical_address_line_2');
            $superfunds->physical_suburb = $request->input('physical_suburb');
            $superfunds->physical_state = $request->input('physical_state');
            $superfunds->physical_post_code = $request->input('physical_post_code');
            $superfunds->postal_address_line_1 = $request->input('postal_address_line_1');
            $superfunds->postal_address_line_2 = $request->input('postal_address_line_2');
            $superfunds->postal_suburb = $request->input('postal_suburb');
            $superfunds->postal_state = $request->input('postal_state');
            $superfunds->postal_post_code = $request->input('postal_post_code');
            $superfunds->contact_phone = $request->input('contact_phone');
            $superfunds->email = $request->input('email');
            $superfunds->abn = $request->input('abn');
            $superfunds->bsb_account_number = $request->input('bsb_account_number');
            $superfunds->website_url = $request->input('website_url');
            
            
            if($superfunds->update()){
                return redirect()->route('SuperFunds.index', session('tenantcode'))->with('success','Data updated!');;
                
            }else{
                die($id);
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
        $superfunds = SuperFunds::find($id);
        if ($superfunds) {
          $superfunds->delete();
          return redirect()->route('SuperFunds.index', session('tenantcode'))->with('success', 'Super Fund Deleted Succesfully!'); 
        }else{
            die($id);
        }                
    }
}
