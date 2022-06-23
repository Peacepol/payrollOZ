@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card  w-100">
           <div class="card-header">Companies 
                        <a href="{{ route('company.index',session('tenantcode')) }}" class="float-end btn btn-success btn-sm " title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Back
                        </a>
           </div>
           <div class="card-body">
	        	<div class="row">
	        		<div class="col">
	        			
	        			<div class="row">
	        				<h5 class="col">Company Name</h5>
			        		<input type="hidden" class="form-control col" value="{{$company->comp_name}}" name="id" required readonly />
			        	</div>
			        	<div class="row">
			        		<h6 class="col">{{$company->comp_name}}</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
				        	    <label for="comp_trading">Trading Name</label>
				        		<input type="text" class="form-control" name="comp_trading" id="comp_trading" value="{{$company->comp_trading}}" required readonly/>
			        		</div>		
			        	</div>	
			        	        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Phone Numbers</label>
			        			<input type="text" class="form-control"  placeholder="Phone No 1" name="comp_phone1" value="{{$company->comp_phone1}}" required readonly/>
			        			<input type="text" class="form-control"  placeholder="Phone No 2" name="comp_phone2" value="{{$company->comp_phone2}}" required readonly/>
			        		</div>
			        	</div>

			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Fax Numbers</label>
			        			<input type="text" class="form-control"  placeholder="Fax No 1" name="comp_fax1" value="{{$company->comp_fax1}}" required readonly/>
			        			<input type="text" class="form-control" placeholder="Fax No 2" name="comp_fax2" value="{{$company->comp_fax2}}" required readonly/>
			        		</div>
			        	</div>			        	
			        	<hr/>
			        	
	        			
			        	<div class="row">
			        		<h6 class="col">Business & Tax Information</h6>
			        	</div>
			        	<div class="row">
			        		
			        		<div class="form-group col">
			        			<label>Tax Identification Number</label>
			        			<input type="text" class="form-control"  placeholder="TIN No." name="comp_taxno" value="{{$company->comp_taxno}}" required readonly/>
			        			<label>Business Registration Number</label>
			        			<input type="text" class="form-control"  placeholder="Business Registration Number" name="comp_businessno" value="{{$company->comp_businessno}}" required readonly/>
	        				</div>
			        	</div>	
			        	<hr/>
			        	<div class="row">
			        		<strong class="col">Initial Payroll Year</strong>
			        	</div>	
			        	<div class="row">	        				
			        		<h6 class="col">{{$company->comp_initpy}}</h6>
			        	</div>		
			        	<div class="row">
			        		<strong class="col">Current Payroll Year</strong>
			        	</div>	
			        	<div class="row">	        				
			        		<h6 class="col">{{$company->comp_curpy}}</h6>
			        	</div>	
			        	<div class="row">
			        		<strong class="col">Employee Limit</strong>
			        	</div>	
			        	<div class="row">	        				
			        		<h6 class="col">{{$company->comp_empmax}}</h6>
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
			        			<input type="text" class="form-control"  placeholder="Company Contact Person" name="comp_contact" value="{{$company->comp_contact}}" required readonly/>
			        		</div>
			        	</div>
			        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Company Email</label>
			        			<input type="text" class="form-control" placeholder="Company Email" name="comp_email" value="{{$company->comp_email}}" required readonly/>
			        		</div>
			        		
			        	</div>
			        	<hr/>
	        			
			        	<div class="row">
			        		<h6 class="col">Physical Address</h6>			        		
			        	</div>
			        	
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>Unit No./ Street No.</label>
			        			<input placeholder="Unit No./ Street No." type="text" class="form-control"  name="comp_add1" value="{{$company->comp_add1}}" required readonly />
			        			<label>Street Name</label>
			        			<input placeholder="Street Name" type="text" class="form-control"  name="comp_add2" value="{{$company->comp_add2}}" required readonly />
			        			<label>City or Suburb</label>
			        			<input placeholder="City or Suburb" type="text" class="form-control"  name="comp_city" value="{{$company->comp_city}}" required readonly />
			        			<label>State / Province</label>
			        			<input placeholder="State / Province" type="text" class="form-control"  name="comp_state" value="{{$company->comp_state}}" required readonly />
			        			<label>Post Code</label>
			        			<input placeholder="Post Code" class="form-control"  name="comp_postcode" value="{{$company->comp_postcode}}" required readonly/>
			        			<label>Country</label>
			        			<input placeholder="Country" class="form-control"  name="comp_country" value="{{$company->comp_country}}" required readonly/>
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
			        			<input placeholder="Unit No./ Street No." type="text" class="form-control"  name="comp_madd1" value="{{$company->comp_madd1}}" required readonly />
			        			<label>Street Name</label>
			        			<input placeholder="Street Name" type="text" class="form-control"  name="comp_madd2" value="{{$company->comp_madd2}}" required readonly />
			        			<label>City or Suburb</label>
			        			<input placeholder="City or Suburb" type="text" class="form-control"  name="comp_mcity" value="{{$company->comp_mcity}}" required readonly />
			        			<label>State / Province</label>
			        			<input placeholder="State / Province" type="text" class="form-control"  name="comp_mstate" value="{{$company->comp_mstate}}" required readonly />
			        			<label>Post Code</label>
			        			<input placeholder="Post Code" class="form-control"  name="comp_mpostcode" value="{{$company->comp_mpostcode}}" required readonly/>
			        			<label>Country</label>
			        			<input placeholder="Country" class="form-control"  name="comp_mcountry" value="{{$company->comp_mcountry}}" required readonly/>
			        		</div>
			        	</div>
			        	<div class="row">
			        		<h6 class="col">Superannuation Information</h6>
			        	</div>
			        	<div class="row">			        		
			        		<div class="form-group col">
			        			<label>Superannuation Fund Name</label>
			        			<input type="text" class="form-control"  placeholder="Superannuation Fund Name" name="comp_superfund" value="{{$company->comp_superfund}}" required readonly />
			        			<label>Superannuation Number</label>
			        			<input type="number" class="form-control"  placeholder="Superannuation Number" name="comp_superfundno" value="{{$company->comp_superfundno}}" required readonly />
	        				</div>
			        	</div>
			        	<br/>
			        	<div class="row">
			        		<h6 class="col">NCSL Information</h6>
			        	</div>
			        	<div class="row">
			        		<div class="form-group col">
			        			<label>NCSL Number</label>
			        			<input type="text" placeholder="NCSL Number" class="form-control"  name="comp_ncslno" value="{{$company->comp_ncslno}}" required readonly />
			        		</div>			        		
			        	</div>	        	
	        			
	        		</div>
		        	
	        	</div>
	        </div><!--End Card Body-->
        </div>
    </div>
@endsection