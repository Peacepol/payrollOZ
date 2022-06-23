<?php

namespace App\Http\Controllers;

use App\Models\PayItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayItemController extends Controller
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
        $payitem = PayItem::all();
        return view ('references.pay_item')->with('payitem', $payitem);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayItem  $payItem
     * @return \Illuminate\Http\Response
     */
    public function show(PayItem $payItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayItem  $payItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PayItem $payItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayItem  $payItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayItem $payItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayItem  $payItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayItem $payItem)
    {
        //
    }
}
