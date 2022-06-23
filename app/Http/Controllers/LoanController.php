<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Employee;
use App\Models\PayItem;
use App\Models\LoanPayment;
use Illuminate\Http\Request;
use DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $employees = DB::select("SELECT e.*,comp_name  from employees e INNER JOIN company c ON c.id = e.company_id");
        //$employees = Employee::all();
        return view ('employees.employee_loan_list')->with('employees', $employees);
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
        'emp_id'=>'required',
        'item_id'=>'required',
        'loan_amt'=>'required',
        'loan_bal'=>'required',
        'loan_dedamt'=>'required',
        'loan_advdate'=>'required',
        'loan_dedstart'=>'required',
        'loan_flag'=>'required',
        ]);

        $input = $request->all();
        Loan::create($input);
        return redirect()->route('emploan.show',[session('tenantcode'),$request->emp_id])->with('success', 'Loan Successfully Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($tenantcode,$id)//show company
    { $loans =  DB::select("SELECT l.*,item_name,item_code  from loans l INNER JOIN pay_items p ON p.id = l.item_id");
        // $loans = Loan::join('pay_items', 'pay_items.id', '=', 'loans.item_id')
        //                 ->where('loans.emp_id',"=",$id)->get();
        //dd($loans);
        $employees = Employee::where('id', $id)->first();
        $payitems = PayItem::all();
        $loanspayment = LoanPayment::where('emp_id',"=",$id)->get();
        return view('employees.employee_loan')->with('employees', $employees)
                                            ->with('loans', $loans)
                                            ->with('payitems', $payitems)
                                            ->with('loanspayment', $loanspayment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$tenantcode,$id)//delete company
    {
        //$res=Branch::where('id',$id)->delete();
           $loan = Loan::find($id);
           $emp_id=  $loan->emp_id;
        if ($loan) {
          $loan->delete();
          return redirect()->route('emploan.show',[session('tenantcode'),$emp_id])->with('success', 'Loan Successfully Deleted');  
        }else{
             return redirect()->route('emploan.show',[session('tenantcode'),$emp_id])->with('success', 'Loan Deletion Failed');  
        }
    }
    public function payloan(Request $request)
    {
    //dd( $request);
       $request ->validate([
        'emp_id'=>'required',
        'item_id'=>'required',
        'amt'=>'required',
        'pmt_date'=>'required',
        ]);

        $input = $request->all();
        LoanPayment::create($input);
        return redirect()->route('emploan.show',[session('tenantcode'),$request->emp_id])->with('success', 'Loan Successfully Added');  
    }
}
