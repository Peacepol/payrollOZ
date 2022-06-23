

		<!--Add Modal -->
		<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Pay Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					  <div class="form-group">
						<label for="costcentrecode">Pay Item Code</label>
						<input type="input" class="form-control" name= "item_code" placeholder="Enter Custom Reference 3 Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Pay Item Name</label>
						<input type="input" class="form-control" name= "item_name" placeholder="Enter Custom Reference 3 Name">
					  </div>
                        <div class="form-group">
							<label for="accum_id">Accumulator</label>
                            <select name="accum_id" id="accum_id" class="form-control @error('accum_id') is-invalid @enderror accum_id" autofocus required>
                            </select>	
                         </div>	
					<div class="row">
					  <div class="form-group col-6">
						<label for="tax_rate">Tax Rate</label>
						<input type="number" class="form-control" name= "tax_rate" value="0" placeholder="">
					  </div>
					  <div class="form-group col-6">
						<label for="tax_spread">Spread Code</label>
						<input type="number" class="form-control" name= "tax_spread" value="0" placeholder="">
					  </div>
					</div>	
					  <div class="form-group">
							<label for="tax_flag">Tax Flag</label>
                            <select name="tax_flag" id="tax_flag" class="form-control @error('tax_flag') is-invalid @enderror tax_flag" autofocus required>
						<?php 	$tax_flag_name = config('const.TAX_FLAG_NAME');
								$tax_flag = config('const.TAX_FLAG');
								$i=0;
								for($i=0;$i<=count($tax_flag)-1;$i++){
									echo '<option value="'.$tax_flag[$i].'" selected >'.$tax_flag_name[$i].'</option>';
								}
								?>
                            </select>	
                         </div>	
					<div class="row">
					  <div class="form-group col-6">
						<label for="tax_rate">Bank Credit Number</label>
						<input type="number" class="form-control" name= "bc_number" placeholder="">
					  </div>
					  <div class="form-group col-6">
						<label for="tax_spread">Bank Deduction Number</label>
						<input type="number" class="form-control" name= "bd_number" placeholder="">
					  </div>
					</div>	
					<div class="form-group">
						<label for="super_id">Superannuation Fund</label>
                        <select name="super_id" id="super_id" class="form-control @error('super_id') is-invalid @enderror super_id" autofocus required>
                        </select>	
                    </div>
					<div class="form-group">
						<label for="accum_id">Payment Mode</label>
                        <select name="pay_mode" id="pay_mode" class="form-control @error('pay_mode') is-invalid @enderror pay_mode" autofocus required>
                        <option value="F">Fix Amount or User Defined</option>
						<option value="P">Percentage</option>
						</select>	
                    </div>
					 <div class="form-group">
						<label for="tax_spread">Fixed Amount</label>
						<input type="number" class="form-control" name= "pay_fixamt" placeholder="">
					</div>
					<div class="row">
						<div class="form-group col-6 ">
							<label for="pay_percent">Percentage</label>
							<input type="number" class="form-control" name= "pay_percent" placeholder="">
						</div>
						<div class="form-group col-6 ">
							<div class="position-absolute top-50 start-50 translate-middle">
								<button class="btn btn-success center ">Set Base Pay Items</button>
							</div>
						</div>
					</div>
					<div class="row">
					  <div class="form-group col-6">
						<label for="tax_rate">Sequence</label>
						<select name="sequence" id="sequence" class="form-control @error('sequence') is-invalid @enderror sequence" autofocus required>
						<?php for($i=0;$i<=26;$i++){
								echo '<option value="'.$i.'" >'.$i.'</option>';
						}	?>
					    </select>
					  </div>
					  <div class="form-group col-6">
						<label for="isleaveaccrual">Will Accrue Leave</label>
							<select name="isleaveaccrual" id="isleaveaccrual" class="form-control @error('isleaveaccrual') is-invalid @enderror isleaveaccrual" autofocus required>
								<option value="1" >Yes</option>
								<option value="0" >No</option>
					    	</select>
					  </div>
					</div>	  
					
					</div><!--end Modal body-->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Add Modal-->
		<!--Edit Modal -->
		<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="EditModal">Update Pay Item</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editForm3"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
					  <div class="form-group">
           				<input type="hidden" class="form-control" id = "ref_id" name= "ref1_id">
						<label for="costcentrecode">Pay Item Code</label>
						<input type="input" class="form-control" id = "edit_ref_code" name= "ref3_code" placeholder="Enter Custom Reference 3 Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Pay Item Name</label>
						<input type="input" class="form-control" id = "edit_ref_name" name= "ref3_name" placeholder="Enter Custom Reference 3 Name">
					  </div>				  
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Update Data</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Update Modal-->     