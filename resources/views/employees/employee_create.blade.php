@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card  w-100">
           <div class="card-header">
		   			Create Employee 
					<input type="submit" value="Save" form="empcreate" class="btn btn-success btn-sm mx-2 float-end">
					<a href="{{ route('employee.index',session('tenantcode')) }}" class="float-end btn btn-danger btn-sm " title="back">
						<i class="fa fa-plus" aria-hidden="true"></i> Back
					</a>
           </div><!--End Card header-->
           <div class="card-body">
                <input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
                <form action="{{ route('employee.store',session('tenantcode')) }}" method="post" id="empcreate">
                 {!! csrf_field() !!}
                    <div class="row">   
                    	<div class="form-group col-sm">
                               <img src="https://source.unsplash.com/random/200x200?sig=1" alt="" width="150" height="100"> 
                        </div>
                        <div class="form-group col-sm">
                            <label for="emp_code">Employee Code</label>
                            <input type="text" class="form-control col  @error('emp_code') is-invalid @enderror"  id="emp_code"  name="emp_code" />
                            @error('emp_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="emp_alphacode">Alpha Code</label>
                            <input type="text" class="form-control col  @error('emp_alphacode') is-invalid @enderror"  id="emp_alphacode" name="emp_alphacode" />
                            @error('emp_alphacode')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            <label for="company_id">Company</label>
                            <select name="company_id" id="company_id" class="form-control col company_id @error('company_id') is-invalid @enderror" >
                            </select>
                             @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Company is required</strong>
                                        </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_fname">First Name</label>
								<input type="text" name="emp_fname" id="emp_fname" class="form-control @error('emp_fname') is-invalid @enderror"value="{{ old('emp_fname') }}" autocomplete="comp_name" autofocus  placeholder="First Name" />
								 @error('emp_fname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>First Name is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_mname">Middle Name</label>
								<input type="text" name="emp_mname" id="emp_mname" class="form-control @error('emp_mname') is-invalid @enderror"value="{{ old('emp_mname') }}" autocomplete="emp_mname" autofocus  placeholder="Middle Name" />
								 @error('emp_mname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Middle Name is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_lname">Last Name</label>
								<input type="text" name="emp_lname" id="emp_lname" class="form-control @error('emp_lname') is-invalid @enderror"value="{{ old('emp_lname') }}" autocomplete="emp_lname" autofocus  placeholder="Last Name" />
								 @error('emp_lname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Last Name is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>

                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_dob">Date of Birth</label>
								<input type="date" name="emp_dob" id="emp_dob" class="form-control @error('emp_dob') is-invalid @enderror"value="{{ old('emp_dob') }}" autocomplete="emp_dob" autofocus />
								 @error('emp_dob')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Date of Birth is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_mstatus">Marital Status</label>
								 <select name="emp_mstatus" id="emp_mstatus" class="form-control @error('emp_mstatus') is-invalid @enderror emp_mstatus" autofocus >
                                    <?php 	$mstatus = config('const.MARITAL_STATUS');
                                            $i=0;
                                            for($i=0;$i<=count($mstatus)-1;$i++){
                                                echo '<option value="'.$mstatus[$i].'" >'.$mstatus[$i].'</option>';
                                            }
                                    ?>
                                </select>
								 @error('emp_mstatus')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Marital Status is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_gender">Gender</label>
								 <select name="emp_gender" id="emp_gender" class="form-control @error('emp_gender') is-invalid @enderror emp_gender" autofocus >
                                    <?php 	$gender = config('const.EMP_GENDER');
                                            $i=0;
                                            for($i=0;$i<=count($gender)-1;$i++){
                                                echo '<option value="'.$gender[$i].'" >'.$gender[$i].'</option>';
                                            }
                                    ?>
                                </select>	
								 @error('emp_gender')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Gender is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>

                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_doe">Date Employed</label>
								<input type="date" name="emp_doe" id="emp_doe" class="form-control @error('emp_doe') is-invalid @enderror"value="{{ old('emp_doe') }}" autocomplete="emp_doe" autofocus />
								 @error('emp_doe')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Date of Employement is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_estatus">Employment Status</label>
								 <select name="emp_estatus" id="emp_estatus" class="form-control @error('emp_estatus') is-invalid @enderror emp_estatus" autofocus >
                                    @foreach($status as $stat)
                                        <option value="{{ $stat->id }}">{{ $stat->status_code }} - {{ $stat->status_name }}</option>
                                    @endforeach  
                                </select>
								 @error('emp_estatus')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Employment Status is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_position">Position</label>
								 <select name="emp_position" id="emp_position" class="form-control @error('emp_position') is-invalid @enderror emp_position" autofocus >
                                    @foreach($positions as $pos)
                                        <option value="{{ $pos->id }}">{{ $pos->position_code }} - {{ $pos->position_name }}</option>
                                    @endforeach                                        
                                </select>	
								 @error('emp_position')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Position is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>
                    
                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_branchid">Branch</label>
						             <select name="emp_branchid" id="emp_branchid" class="form-control branch_id  @error('emp_branchid') is-invalid @enderror emp_branchid" autofocus requried>
                                     </select>
                                @error('emp_branchid')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Branch is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_depid">Department</label>
								 <select name="emp_depid" id="emp_depid" class="form-control dept_id @error('emp_depid') is-invalid @enderror emp_depid" autofocus requried>
                                 </select>
								 @error('emp_depid')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Department is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_email">Email Address</label>
								 <input type="email" name="emp_email" id="emp_email" class="form-control @error('emp_email') is-invalid @enderror"value="{{ old('emp_email') }}" autocomplete="emp_email" autofocus />
								 @error('emp_email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Employee Email is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>

                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_dot">Date Ended</label>
								<input type="date" name="emp_dot" id="emp_dot" class="form-control @error('emp_dot') is-invalid @enderror"value="{{ old('emp_dot') }}" autocomplete="emp_dot" autofocus />
								 @error('emp_dot')
                                <span class="invalid-feedback" role="alert">
                                            <strong>DOT is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_nationality">Nationality</label>
                                <input type="text" name="emp_nationality" id="emp_nationality" class="form-control @error('emp_nationality') is-invalid @enderror"value="{{ old('emp_nationality') }}" autocomplete="emp_nationality" autofocus />
								 @error('emp_nationality')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Department is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_religion">Religion</label>
								 <input type="text" name="emp_religion" id="emp_religion" class="form-control @error('emp_religion') is-invalid @enderror"value="{{ old('emp_religion') }}" autocomplete="emp_religion" autofocus />
								 @error('emp_religion')
                                <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>

                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_defid">Period Definition</label>
								<select name="emp_defid" id="emp_defid" class="form-control @error('emp_defid') is-invalid @enderror emp_defid" autofocus>
                                </select>
                                 @error('emp_defid')
                                <span class="invalid-feedback" role="alert">
                                            <strong>DOT is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_tax">Tax ID No.</label>
                                <input type="text" name="emp_tax" id="emp_tax" class="form-control @error('emp_tax') is-invalid @enderror"value="{{ old('emp_tax') }}" autocomplete="emp_tax" autofocus />
								 @error('emp_tax')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Department is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_rateyear">Annual Salary</label>
								 <input type="number" name="emp_rateyear" id="emp_rateyear" class="form-control @error('emp_rateyear') is-invalid @enderror"value="{{ old('emp_rateyear') }}" autocomplete="emp_rateyear" autofocus />
								 @error('emp_rateyear')
                                <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>

                    <div class="row">
							<div class="form-group col-sm">
								<label for="emp_paymode">Payment Mode</label>
								<select name="emp_paymode" id="emp_paymode" class="form-control @error('emp_paymode') is-invalid @enderror emp_paymode" autofocus  >
                                <?php 	$p_mode = config('const.PAY_MODE');
                                        $p_mode_name = config('const.PAY_MODE_NAME');
                                            $i=0;

                                            for($i=0;$i<=count($p_mode)-1;$i++){
                                                echo '<option value="'.$p_mode[$i].'" >'.$p_mode_name[$i].'</option>';
                                            }
                                    ?>
                                </select>
                                 @error('emp_paymode')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Payment Mode is requried.</strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_rateunit">Rate Per</label>
                                <input type="number" name="emp_rateunit" step="0.0001" id="emp_rateunit" class="form-control @error('emp_rateunit') is-invalid @enderror"value="{{ old('emp_rateunit') }}" autocomplete="emp_rateunit" autofocus />
								 @error('emp_rateunit')
                                <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                @enderror
			        	    </div>
                            <div class="form-group col-sm">
								<label for="emp_dependents">No of Dependents</label>
								 <input type="number" name="emp_dependents" id="emp_dependents" class="form-control @error('emp_dependents') is-invalid @enderror"value="{{ old('emp_dependents') }}" autocomplete="emp_dependents" autofocus/>
								 @error('emp_dependents')
                                <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                @enderror
			        	    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <input type="checkbox" name="emp_res" id="emp_res" class="btn-check" id="btn-check" autocomplete="off">
                            <label class="btn btn-outline-primary" for="emp_res">PNG Citizen</label>
                            
                             <input type="checkbox" class="btn-check" name="emp_taxformlodged" id="emp_taxformlodged" id="btn-check"autocomplete="off" >
                            <label class="btn btn-outline-primary" for="emp_taxformlodged">Tax Form Lodged</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="emp_paylocid">Payroll Location</label>
                            <select name="emp_paylocid" id="emp_paylocid" class="form-control @error('emp_paylocid') is-invalid @enderror emp_paylocid" autofocus>
                                    @foreach($paylocation as $payloc)
                                    <?php 
                                        echo '<option  value="'.$payloc->id.'">'.$payloc->paylocation_code.' - '.$payloc->paylocation_name.'</option>';
                                    ?>                                                     
                                @endforeach                                            
                            </select>
                            @error('emp_paylocid')
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm">
                            <label for="emp_paynoid">Pay Batch Number</label>
                            <select name="emp_paynoid" id="emp_paynoid" class="form-control @error('emp_paynoid') is-invalid @enderror emp_paynoid" autofocus>
                                @foreach($paybatch as $paybatchs)
                                    <?php 
                                        echo '<option  value="'.$paybatchs->id.'">'.$paybatchs->paybatch_code.' - '.$paybatchs->paybatch_name.'</option>';
                                    ?>                                                     
                                @endforeach  
                            </select>
                            @error('emp_paynoid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Department is requried.</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm">
                            <label for="emp_costid">Cost Centre</label>
                            <select name="emp_costid" id="emp_costid" class="form-control @error('emp_costid') is-invalid @enderror emp_costid" autofocus>
                                @foreach($costcentre as $cost)
                                    <?php 
                                        echo '<option  value="'.$cost->id.'">'.$cost->cost_code.' - '.$cost->cost_name.'</option>';
                                    ?>                                                     
                                @endforeach
                            </select>
                            @error('emp_costid')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            @enderror
                        </div>                                        
                    </div>
                    <div class = "row">
                        <div class="form-group col-sm">
                            <label for="emp_supervisor">Supervisor</label>
                            <select name="emp_supervisor" id="emp_supervisor" class="form-control @error('emp_supervisor') is-invalid @enderror emp_defid" autofocus>
                            </select>
                            @error('emp_supervisor')
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm">
                            <label for="emp_ncsl">NCSL Number</label>
                            <input type="number" name="emp_ncsl" id="emp_ncsl" class="form-control @error('emp_ncsl') is-invalid @enderror"value="{{ old('emp_ncsl') }}" autocomplete="emp_rateyear" autofocus />
                            @error('emp_ncsl')
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            @enderror
                        </div>
                    </div>                    
                </form >
	        </div><!--End Card Body-->
        </div><!--End Card-->
    </div>
@push('scripts')
@include('scripts.companylist')
@include('scripts.branch_list')
@include('scripts.department_list')
@endpush
@endsection