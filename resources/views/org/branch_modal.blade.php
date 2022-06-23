<!--Add Modal -->
		<div class="modal fade" id="addBranch" tabindex="-1" role="dialog" aria-labelledby="addBranchLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="addBranchLabel">Add New Branch</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "{{ route('branch.store',session('tenantcode')) }}" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					   <label>Company</label></br>
                            <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror company_id" autofocus>
                            </select>
                             @error('company_id')
									<span class="invalid-feedback" role="alert">
											<strong>Company is required</strong>
									</span>
                            @enderror
                            <label>Branch Name</label></br>
                            <input type="text" name="branch_name" id="branch_name" class="form-control  @error('branch_name') is-invalid @enderror" placeholder="Branch Name" value="" autocomplete="branch_name" autofocus ></br>
                            @error('branch_name')
									<span class="invalid-feedback" role="alert">
											<strong>Branch name is required</strong>
									</span>
                            @enderror
                            <label>Branch Code</label></br>
                            <input type="text" name="branch_code" id="branch_code" class="form-control  @error('branch_code') is-invalid @enderror" placeholder="Branch Name" value="" autocomplete="branch_code" autofocus ></br>
                            @error('branch_code')
									<span class="invalid-feedback" role="alert">
											<strong>Branch code is required</strong>
									</span>
                            @enderror
                            <label>Address</label></br>
                            <input type="text" name="branch_address" id="branch_address" class="form-control"></br>
                     </div> <!--end body -->
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
		<div class="modal fade" id="branchEdit" tabindex="-1" role="dialog" aria-labelledby="branchEditLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="branchEditLabel">Update Branch</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
		   	<form action="" method="post" id="edit_branchform">
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
                        <input type="hidden" name="branch_id" id="branch_id" class="form-control" value=""></br>
                      
					    <label>Branch Name</label></br>
                            <input type="text" name="branch_name" id="edit_branch_name" class="form-control" value=""></br>
                        <label>Branch Code</label></br>
                            <input type="text" name="branch_code" id="edit_branch_code" class="form-control" value=""></br>
                        <label>Address</label></br>
                            <input type="text" name="branch_address" id="edit_branch_address" class="form-control" value=""></br>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Update Data</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Update Modal-->     