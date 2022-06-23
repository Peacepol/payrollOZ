<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
      public function __construct()
    {
        $this->middleware('tenantdb');
    }

    public function loadPage(Request $request){
        
        $companies = DB::select("select * from company");
        foreach($companies as $company){
            var_dump($company);
        }

    }
}
