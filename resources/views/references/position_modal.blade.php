		<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Employee Position</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					  <div class="form-group">
						<label for="positioncode">Employee Position Code</label>
						<input type="input" class="form-control" name= "position_code" placeholder="Enter Employee Position Code">
					  </div>
					  <div class="form-group">
						<label for="positionname">Employee Position Name</label>
						<input type="input" class="form-control" name= "position_name" placeholder="Enter Employee Position Name">
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
				<h5 class="modal-title" id="EditModal">Update Employee Position</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editForm"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
					  <div class="form-group">
           				<input type="hidden" class="form-control" id = "id" name= "id">
						<label for="positioncode">Employee Position Code</label>
						<input type="input" class="form-control" id = "position_code" name= "position_code" placeholder="Enter Employee Position Code">
					  </div>
					  <div class="form-group">
						<label for="positionname">Employee Position Name</label>
						<input type="input" class="form-control" id = "position_name" name= "position_name" placeholder="Enter Employee Position Name">
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