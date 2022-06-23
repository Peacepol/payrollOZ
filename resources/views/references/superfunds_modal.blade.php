
		<!--Edit Modal -->
		<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document" style = "max-width:50%">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="EditModal">Update Cost Centre</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editSuperFundForm"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
                    
                    <div class="modal-body">
                    <input type="hidden" class="form-control" id = "superfund_id" name= "superfund_id">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Contact Details</p>
                            </div>
                        </div>                         
                    </div>    
                    <div class="row mb-3">
                           <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="USI" name = "USI" type="text" placeholder="" />
                                    <label for="product_name">USI</label>
                                </div>
                            </div>                    				  
					</div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="product_name" name = "product_name" type="text" />
                                <label for="product_name">Product name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="registered_name" name ="registered_name" type="text" />
                                <label for="registered_name">Registered name</label>
                            </div>
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Physical Address</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="physical_address_line_1" name ="physical_address_line_1" type="text" />
                                <label for="physical_address_line_1">Address Line 1</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="physical_address_line_2" name ="physical_address_line_2" type="text" />
                                <label for="physical_address_line_2">Address Line 2</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="physical_suburb" name = "physical_suburb" type="text" />
                                <label for="physical_suburb">Suburb</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="physical_state" name ="physical_state" type="text" />
                                <label for="physical_state">State</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="physical_post_code" name ="physical_post_code" type="text" />
                                <label for="physical_post_code">Post Code</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Postal Address</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="postal_address_line_1" name ="postal_address_line_1" type="text" />
                                <label for="postal_address_line_1">Address Line 1</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="postal_address_line_2" name ="postal_address_line_2" type="text" />
                                <label for="postal_address_line_2">Address Line 2</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="postal_suburb" name = "postal_suburb" type="text" />
                                <label for="postal_suburb">Suburb</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="postal_state" name ="postal_state" type="text" />
                                <label for="postal_state">State</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="postal_post_code" name ="postal_post_code" type="text" />
                                <label for="postal_post_code">Post Code</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Contact Person</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="contact_phone" name ="contact_phone" type="text" />
                                <label for="	contact_phone">Contact Phone</label>
                            </div>
                        </div>                         
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="email" name ="email" type="text" />
                                <label for="email">E-mail Address</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Account Details</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="abn" name ="abn" type="text" />
                                <label for="abn">ABN</label>
                            </div>
                        </div>                         
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="bsb_account_number" name ="bsb_account_number" type="text" />
                                <label for="bsb_account_number">BSB / Account</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Websit URL</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="website_url" name ="website_url" type="text" />
                                <label for="website_url">Super Fund Website URL</label>
                            </div>
                        </div>
                    </div>                                                                                                                                                           
					</div><!--End of Modal Body-->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Update Data</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Update Modal-->     
    		<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document" style = "max-width:50%" >
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Super Fund</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Contact Details</p>
                            </div>
                        </div>                         
                    </div>    
                    <div class="row mb-3">
                           <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="USI" name = "USI" type="text" placeholder="" />
                                    <label for="product_name">USI</label>
                                </div>
                            </div>                    				  
					</div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="product_name" name = "product_name" type="text" />
                                <label for="product_name">Product name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="registered_name" name ="registered_name" type="text" />
                                <label for="registered_name">Registered name</label>
                            </div>
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Physical Address</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="physical_address_line_1" name ="physical_address_line_1" type="text" />
                                <label for="physical_address_line_1">Address Line 1</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="physical_address_line_2" name ="physical_address_line_2" type="text" />
                                <label for="physical_address_line_2">Address Line 2</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="physical_suburb" name = "physical_suburb" type="text" />
                                <label for="physical_suburb">Suburb</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="physical_state" name ="physical_state" type="text" />
                                <label for="physical_state">State</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="physical_post_code" name ="physical_post_code" type="text" />
                                <label for="physical_post_code">Post Code</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Postal Address</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="postal_address_line_1" name ="postal_address_line_1" type="text" />
                                <label for="postal_address_line_1">Address Line 1</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="postal_address_line_2" name ="postal_address_line_2" type="text" />
                                <label for="postal_address_line_2">Address Line 2</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="postal_suburb" name = "postal_suburb" type="text" />
                                <label for="postal_suburb">Suburb</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="postal_state" name ="postal_state" type="text" />
                                <label for="postal_state">State</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" id="postal_post_code" name ="postal_post_code" type="text" />
                                <label for="postal_post_code">Post Code</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Contact Person</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="contact_phone" name ="contact_phone" type="text" />
                                <label for="	contact_phone">Contact Phone</label>
                            </div>
                        </div>                         
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="email" name ="email" type="text" />
                                <label for="email">E-mail Address</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Account Details</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="abn" name ="abn" type="text" />
                                <label for="abn">ABN</label>
                            </div>
                        </div>                         
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="bsb_account_number" name ="bsb_account_number" type="text" />
                                <label for="bsb_account_number">BSB / Account</label>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <p class="lead">Websit URL</p>
                            </div>
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control" id="website_url" name ="website_url" type="text" />
                                <label for="website_url">Super Fund Website URL</label>
                            </div>
                        </div>
                    </div>                                                                                                                                                           
					</div><!--End of Modal Body-->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Add Modal-->