@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card  w-100">
           <div class="card-header">
		   			Create Company 
					<input type="submit" value="Save" form="compedit" class="btn btn-success btn-sm mx-2 float-end">
					<a href="{{ route('company.index',session('tenantcode')) }}" class="float-end btn btn-danger btn-sm " title="back">
						<i class="fa fa-plus" aria-hidden="true"></i> Back
					</a>

           </div>
           <div class="card-body">
		   	<form action="{{ route('company.store',session('tenantcode')) }}" method="post" id="compedit">
			   {!! csrf_field() !!}
	        	<div class="row">
	        		<div class="col">
	        			<div class="row">
							<div class="form-group col">
								<label for="comp_name">Company Name</label>
								<input type="text" name="comp_name" id="comp_name" class="form-control @error('comp_name') is-invalid @enderror"value="{{ old('comp_name') }}" autocomplete="comp_name" autofocus placeholder="Company Name" />
								 @error('comp_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>Company Name is requried.</strong>
                                        </span>
                                @enderror
			        	</div>
						</div>
			        	<div class="row">
			        		<div class="form-group col">
				        	    <label for="comp_trading">Trading Name</label>
				        		<input type="text" class="form-control  @error('comp_trading') is-invalid @enderror" name="comp_trading" id="comp_trading" value="{{ old('comp_trading') }}" autocomplete="comp_trading" autofocus placeholder="Trading Name" required />
			        			@error('comp_trading')
									<span class="invalid-feedback" role="alert">
											<strong>Trading Name is required</strong>
									</span>
                                @enderror
							</div>	
							
			        	</div>	
			        	        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Phone Numbers</label>
			        			<input type="text" class="form-control"  placeholder="Phone No 1" name="comp_phone1" value=""  />
			        			<input type="text" class="form-control"  placeholder="Phone No 2" name="comp_phone2" value=""  />
			        		</div>
			        	</div>

			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Fax Numbers</label>
			        			<input type="text" class="form-control"  placeholder="Fax No 1" name="comp_fax1" value=""  />
			        			<input type="text" class="form-control" placeholder="Fax No 2" name="comp_fax2" value=""  />
			        		</div>
			        	</div>			        	
			        	<hr/>
			        	
	        			
			        	<div class="row">
			        		<h6 class="col">Business & Tax Information</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Tax Identification Number</label>
			        			<input type="text" class="form-control  @error('comp_taxno') is-invalid @enderror"  placeholder="TIN No." name="comp_taxno" value="{{ old('comp_taxno') }}" autocomplete="comp_taxno" autofocus required />
			        			@error('comp_taxno')
									<span class="invalid-feedback" role="alert">
											<strong>Tax identification number is required.</strong>
									</span>
                                @enderror
								<label>Business Registration Number</label>
			        			<input type="text" class="form-control  @error('comp_businessno') is-invalid @enderror"  placeholder="Business Registration Number" name="comp_businessno" value="{{ old('comp_businessno') }}" autocomplete="comp_businessno" autofocus required  />
	        					@error('comp_businessno')
									<span class="invalid-feedback" role="alert">
											<strong>Business registration number is required</strong>
									</span>
                                @enderror
								
							</div>
			        	</div>	
			        	<hr/>
			        	<div class="row">
			        		<div class="form-group col">
								<strong class="col form-group ">Initial Payroll Year</strong>
								<input type="text" class="form-control @error('comp_initpy') is-invalid @enderror" placeholder="Initial Payroll Year" name="comp_initpy" value="{{ old('comp_initpy') }}" autocomplete="comp_initpy" autofocus required  />
								@error('comp_initpy')
									<span class="invalid-feedback" role="alert">
											<strong>required</strong>
									</span>
                                @enderror
							</div>
						</div>	
			        	<div class="row">	        				
			        		<h6 class="col"></h6>
			        	</div>		
			        	<div class="row">
							<div class="form-group col">
								<strong class="col">Current Payroll Year</strong>
								<input type="text" class="form-control @error('comp_curpy') is-invalid @enderror" placeholder="Current Payroll Year" name="comp_curpy" value="{{ old('comp_curpy') }}" autocomplete="comp_curpy" autofocus required  />
							</div>	
			        	</div>	
			        	<div class="row">	        				
			        		<h6 class="col"></h6>
			        	</div>	
			        	<div class="row">
							<div class="form-group col">
								<strong class="col">Employee Limit</strong>
								<input type="text" class="form-control @error('comp_empmax') is-invalid @enderror" placeholder="Employee Limit" name="comp_empmax" value="{{ old('comp_empmax') }}" autocomplete="comp_empmax" autofocus required  />
							</div>
						</div>	
			        	<div class="row">	        				
			        		<h6 class="col"></h6>
			        	</div>		

	        			
	        		</div>

	        		<div class="col-xl-1"></div>
	        		<div class="col">
	        			<div class="row">
			        		<h6 class="col">Contact Information</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Contact Person</label>
			        			<input type="text" class="form-control @error('comp_contact') is-invalid @enderror"  placeholder="Company Contact Person" name="comp_contact" value="{{ old('comp_contact') }}" autocomplete="comp_businessno" autofocus required  />
			        		</div>
			        	</div>
			        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Company Email</label>
			        			<input type="email" class="form-control @error('comp_email') is-invalid @enderror" placeholder="Company Email" name="comp_email" value="{{ old('comp_email') }}" autocomplete="comp_email" autofocus required  />
			        		</div>
							 @error('comp_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			        		
			        	</div>
			        	<hr/>
	        			
			        	<div class="row">
			        		<h6 class="col">Physical Address</h6>			        		
			        	</div>
			        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Unit No./ Street No.</label>
			        			<input placeholder="Unit No./ Street No." type="text" class="form-control"  name="comp_add1" value=""   />
			        			<label>Street Name</label>
			        			<input placeholder="Street Name" type="text" class="form-control"  name="comp_add2" value=""   />
			        			<label>City or Suburb</label>
			        			<input placeholder="City or Suburb" type="text" class="form-control"  name="comp_city" value=""   />
			        			<label>State / Province</label>
			        			<input placeholder="State / Province" type="text" class="form-control"  name="comp_state" value=""   />
			        			<label>Post Code</label>
			        			<input placeholder="Post Code" class="form-control"  name="comp_postcode" value=""  />
			        			<label>Country</label>
			        			<input placeholder="Country" class="form-control"  name="comp_country" value=""  />
			        		</div>
			        	</div>
			        	
			        	
			        	
	        		</div>
	        		<div class="col-xl-1"></div>
	        		<div class="col">
	        			<div class="row">
			        		<h6 class="col">Mailing Address</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Unit No./ Street No.</label>
			        			<input placeholder="Unit No./ Street No." type="text" class="form-control"  name="comp_madd1" value=""   />
			        			<label>Street Name</label>
			        			<input placeholder="Street Name" type="text" class="form-control"  name="comp_madd2" value=""   />
			        			<label>City or Suburb</label>
			        			<input placeholder="City or Suburb" type="text" class="form-control"  name="comp_mcity" value=""   />
			        			<label>State / Province</label>
			        			<input placeholder="State / Province" type="text" class="form-control"  name="comp_mstate" value=""   />
			        			<label>Post Code</label>
			        			<input placeholder="Post Code" class="form-control"  name="comp_mpostcode" value=""  />
			        			<label>Country</label>
			        			<input placeholder="Country" class="form-control"  name="comp_mcountry" value=""  />
			        		</div>
			        	</div>
			        	<div class="row">
			        		<h6 class="col">Superannuation Information</h6>
			        	</div>
			        	<div class="row">			        		
			        		<div class="form-group col">
			        			<label>Superannuation Fund Name</label>
			        			<input type="text" class="form-control"  placeholder="Superannuation Fund Name" name="comp_superfund" value=""   />
			        			<label>Superannuation Number</label>
			        			<input type="number" class="form-control"  placeholder="Superannuation Number" name="comp_superfundno" value=""   />
	        				</div>
			        	</div>
			        	<br/>
			        	<div class="row">
			        		<h6 class="col">NCSL Information</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>NCSL Number</label>
			        			<input type="text" placeholder="NCSL Number" class="form-control"  name="comp_ncslno" value=""   />
			        		</div>			        		
			        	</div>	        	
	        			
	        		</div>
		        	
	        	</div>
	        </div><!--End Card Body-->
        </div>
    </div>
@endsection