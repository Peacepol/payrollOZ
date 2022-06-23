<!--Add Modal -->
		<div class="modal" id="AddLoan" tabindex="-1" role="dialog" aria-labelledby="AddLoanLabel">
             <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddLoanLabel">Add New Pay Item</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span>&times;</span>
                    </button>
                </div>
                    <form action = "{{ route('emploan.store',session('tenantcode')) }}" method = "post" class="form-group" >
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="col align-middle">Item Code:</span>
                            <span class="col"><strong class="item_code"></strong></span>
                        </div>
                         <div class="form-group"> 
                            <span class="col align-middle">Item Name:</span>
                            <span class="col"><strong class="item_name"></strong></span>
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <input type="hidden" class="form-control" id = "item_id" name= "item_id" value = "">
                                <input type="hidden" class="form-control" id = "emp_id" name= "emp_id" value = "{{$employees->id}}">
                                <label for="loan_advdate">Loan Date:</label>
                                <input type="date" class="form-control" id = "loan_advdate" name= "loan_advdate" >
                            </div>
                            <div class="form-group col-sm">
                                <label for="loan_dedstart">Deduction Start Date:</label>
                                <input type="date" class="form-control" id = "loan_dedstart" name= "loan_dedstart">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="loan_amt">Loan Amount:</label>
                                <input type="number" class="form-control" step="0.0" id = "loan_amt" name= "loan_amt">
                            </div>
                            <div class="form-group col-sm">
                                <label for="loan_bal">Deduction Amount:</label>
                                <input type="number"class="form-control" step="0.01" id="loan_dedamt" name="loan_dedamt">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="loan_bal">Outstanding:</label>
                                <input type="input"class="form-control" step='0.01' id="loan_bal" name="loan_bal">
                            </div>
                            <div class="form-group col-sm">
                                <label for="loan_flag">Loan Status:</label>
                                <select name="loan_flag" id="loan_flag" class="form-control @error('loan_flag') is-invalid @enderror loan_flag" value="" autofocus >
                                    @foreach(config('const.LOAN_FLAG') as $key => $name)
                                            <option value="{{$key}}">{{$name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>                                                				  
					</div>
          </form>
                    <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" form="compedit"  class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add New</button>
					</div>  
                </div>
            </div>
		</div>
    <!--End Add Modal-->

       <!--MODAL DIALOG FOR PAY ITEMS LIST-->
    <!-- Modal Dialog-->
    <div class="modal fade" id="AddItemModal" tabindex="-1" role="dialog" aria-labelledby="LoanItems">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="AddItemContent">
          <div class="modal-header">
            <h5 class="modal-title" id="LoanItems">Add Loan Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span >&times;</span>
                </button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
                    <table class="table table-striped" id="pay_items" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Code</th>
                          <th>Name</th> 
                          <th>Action</th>                                            
                        </tr>
                      </thead>
                      <tbody>     
                      @foreach($payitems as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->item_code  }}</td>
                                        <td>{{ $item->item_name }} </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm add_loan" > Select</button>
                                        </td>
                                    </tr>
                                @endforeach           
                      </tbody>
                    </table>
            </div>
          </div>
        </div>            
      </div>
    </div>

    <!--Add Modal -->
		<div class="modal fade" id="PayLoan" tabindex="-1" role="dialog" aria-labelledby="PayLoanLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PayLoanLabel">Manual Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                    <div class="modal-body">
                      
                      <div class = "row">
                        <div class="form-group col-sm">
                            <span class="col-sm">Item Code:</span>
                            <span class="col-sm"><strong class="item_code"></strong></span>
                        </div>
                         <div class="form-group col-sm"> 
                            <span class="col-sm">Item Name:</span>
                            <span class="col-sm"><strong class="item_name"></strong></span>
                        </div>
                      </div>
                      <div class = "row">
                         <div class="form-group col-sm">
                            <span class="col-sm">Loan ID:</span>
                            <span class="col-sm"><strong class="loan_id"></strong></span>
                        </div>
                        <div class="form-group col-sm">
                            <span class="col-sm">Initial Amount:</span>
                            <span class="col-sm"><strong class="loan_amount"></strong></span>
                        </div>
                      </div>
                      <div class = "row">
                         <div class="form-group col-sm"> 
                            <span class="col-sm">Balance:</span>
                            <span class="col-sm"><strong class="loan_balance"></strong></span>
                        </div>
                      </div>
                      <form action="{{ route('emploan.payloan',session('tenantcode')) }}" method="POST" id="payloan">
                        {{ csrf_field() }}
                      <input type="hidden" class="form-control loan_id" id = "loan_id" name= "loan_id" value = "">
                      <input type="hidden" class="form-control item_id" id = "item_id" name= "item_id" value = "">
                      <input type="hidden" class="form-control" id = "emp_id" name="emp_id" value = "{{$employees->id}}">
                      <div class = "row">
                          <div class="form-group col-sm">
                                <label for="pmt_date">Payment Date:</label>
                                <input type="date" class="form-control" id = "pmt_date" name= "pmt_date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group col-sm">
                                <label for="loan_advdate">Amount to Pay:</label>
                                <input type="number" step="0.01" class="form-control" id ="amt" name="amt" >
                            </div>
                      </div>     
                         
                        <div class="form-group col-sm">
                                <label for="pmt_date">Reference:</label>
                                <input type="text" class="form-control" id ="ref" name= "payref">
                        </div> 
                         <div class="form-group col-sm">
                                <label for="pmt_date">Comment:</label>
                                <input type="text" class="form-control" id = "comments" name= "comments">
                        </div>   
                      </form>                          				  
					          </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					              <input type="submit" value="Save" form="payloan" class="btn btn-success btn-sm mx-2 float-end">
                    </div>  
                </div>
            </div>
		</div>
    <!--End Add Modal-->
    