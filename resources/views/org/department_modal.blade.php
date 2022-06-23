<!--Add Modal -->
		<div class="modal fade" id="addDep" tabindex="-1" role="dialog" aria-labelledby="addDepLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="addDepLabel">Add New Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "{{ route('department.store',session('tenantcode')) }}" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					   <label>Company</label></br>
                            <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror company_id" autofocus required>
                            </select>
                             @error('company_id')
									<span class="invalid-feedback" role="alert">
											<strong>Company is required</strong>
									</span>
                            @enderror
                            <label>Department Name</label></br>
                            <input type="text" name="dep_name" id="dep_name" class="form-control  @error('dep_name') is-invalid @enderror" placeholder="Department Name" value="" autocomplete="dep_name" autofocus ></br>
                            @error('dep_name')
									<span class="invalid-feedback" role="alert">
											<strong>Department name is required</strong>
									</span>
                            @enderror
                            <label>Department Code</label></br>
                            <input type="text" name="dep_code" id="dep_code" class="form-control  @error('dep_code') is-invalid @enderror" placeholder="Department Name" value="" autocomplete="dep_code" autofocus ></br>
                            @error('dep_code')
									<span class="invalid-feedback" role="alert">
											<strong>Department code is required</strong>
									</span>
                            @enderror
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
		<div class="modal fade" id="depEdit" tabindex="-1" role="dialog" aria-labelledby="depEditLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="depEditLabel">Update Department</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
		   	<form action="" method="post" id="edit_depform">
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
                        <input type="hidden" name="dep_id" id="dep_id" class="form-control" value=""></br>
					    <label>Department Name</label></br>
                            <input type="text" name="dep_name" id="edit_dep_name" class="form-control" value=""></br>
                        <label>Department Code</label></br>
                            <input type="text" name="dep_code" id="edit_dep_code" class="form-control" value=""></br>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Update Data</button>
					</div>
				</form>
			</div>
		  </div>
		</div>
    <!--End Update Modal-->     