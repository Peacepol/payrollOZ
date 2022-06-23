		<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Cost Centre</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					  <div class="form-group">
						<label for="costcentrecode">Cost Centre Code</label>
						<input type="input" class="form-control" name= "cost_code" placeholder="Enter Cost Centre Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Cost Centre Name</label>
						<input type="input" class="form-control" name= "cost_name" placeholder="Enter Cost Centre Name">
					  </div>				  
					</div>
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
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="EditModal">Update Cost Centre</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editForm"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
					  <div class="form-group">
           				<input type="hidden" class="form-control" id = "cost_id" name= "cost_id">
						<label for="costcentrecode">Cost Centre Code</label>
						<input type="input" class="form-control" id = "cost_code" name= "cost_code" placeholder="Enter Cost Centre Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Cost Centre Name</label>
						<input type="input" class="form-control" id = "cost_name" name= "cost_name" placeholder="Enter Cost Centre Name">
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