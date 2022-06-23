@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
                <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
                     <div class="card-header"><strong>Employees Loan</strong>
                       <!-- <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#addBranch" > Add New </button> -->
                          <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#AddItemModal">
						         Add Loan
					        </button>
                    </div>
                    <div class="card-body">
                        
                         @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-3">
                                <span>Employee Code:</span>
                                <span><strong>{{$employees->emp_code}}</strong></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span>Employee Name:</span>
                                <span><strong>{{$employees->emp_fname}} {{$employees->emp_lname}}</strong></span>
                            </div>
                        </div>
                        </br>
                        </br>
                        <div class="table-responsive">
                            <table class="table table-striped" id ="loans_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th hidden>Item ID</th>
                                        <th>Loan Code</th>
                                        <th>Loan Name</th>
                                        <th>Status</th>
                                        <th>Loan Date</th>
                                        <th>Start of Deduction</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Deduction</th>
                                        <th>Outstanding</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="loans_table_body">
                                    @php ($total_loan = 0)
                                    @php ($total_ded = 0)
                                    @php ($total_out = 0)
                                    @foreach($loans as $item)
                                            @php ($total_loan = $total_loan+$item->loan_amt)
                                            @php ($total_ded = $total_ded+$item->loan_dedamt)
                                            @php ($total_out = $total_out+$item->loan_bal)
                                        <tr>
                                            <td>{{ $item->id  }}</td>
                                            <td hidden>{{ $item->item_id  }}</td>
                                            <td >{{ $item->item_code  }}</td>
                                            <td >{{ $item->item_name  }}</td>
                                            <td>
                                                <select name="loan_flag" id="loan_flag" class="form-control @error('loan_flag') is-invalid @enderror loan_flag" value="{{ $item->loan_flag }}" autofocus >
                                                    @foreach(config('const.LOAN_FLAG') as $key => $name)
                                                        <option value="{{$key}}" {{ $key === $item->loan_flag ? "selected" : "" }}>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                             <td>{{ $item->loan_advdate }}</td>
                                            <td>{{ $item->loan_dedstart }}</td>
                                            <td>{{ $item->loan_amt }}</td>
                                            <td>{{ $item->loan_dedamt }}</td>
                                            <td>{{ $item->loan_bal }}</td>
                                            <td>
                                             <button type="button" class="btn btn-warning btn-sm payloan">
                                                <i class="fa-solid fa-money-bill-wave"></i>
                                                    Manual Payment
                                            </button>
                                            <form method="POST" action="{{ route('emploan.destroy', [session('tenantcode'), $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                 {{ method_field('DELETE') }}  	
												  {{ csrf_field() }}	
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <span>Total Loan Amount:</span>
                                <span><strong>{{$total_loan}}</strong></span>
                            </div>
                             <div class="col-sm-4">
                                <span>Total Deduction:</span>
                                <span><strong>{{$total_ded}}</strong></span>
                            </div>
                             <div class="col-sm-4">
                                <span>Total Outstanding:</span>
                                <span><strong>{{$total_out}}</strong></span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="card-body">
                     <span><strong>Loan Repayments History</strong></span>
                    </br>
                    </br>
                    <div class="table-responsive">
                            <table class="table table-striped" id ="loans_payment_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Loan Id</th>
                                        <th>Reference</th>
                                        <th>Date Paid</th>
                                        <th>Amount Paid</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody id="branch_table_body">
                                    @foreach($loanspayment as $item)
                                        <tr>
                                            <td>{{ $item->id  }}</td>
                                           <td>{{ $item->loan_id  }}</td>
                                           <td>{{ $item->payref  }}</td> 
                                           <td>{{ $item->pmt_date  }}</td>
                                           <td>{{ $item->amt  }}</td>
                                           <td>{{ $item->comments  }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
@include('employees.emploan_modal')
@push('scripts')
@include('scripts.loans_script')
@endpush

@endsection


