		<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Pay Location</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
                    <div class="form-group">
                                <label for="company">Select Company</label>
                                <select name="company" id="company" class="form-control">
                                    @foreach($company as $category)
                                        <option value="{{ $category->id }}">{{ $category->comp_name }}</option>
                                    @endforeach
                                </select>
                    </div> 
					<div class="form-group">
                        <input type="hidden" class="form-control" id = "company_id" name= "company_id">
						<label for="costcentrecode">Pay Location Code</label>
						<input type="input" class="form-control" name= "paylocation_code" placeholder="Enter Pay Location Code">
					</div>
					<div class="form-group">
						<label for="costcentrename">Pay Location Name</label>
						<input type="input" class="form-control" name= "paylocation_name" placeholder="Enter Pay Location Name">
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
				<h5 class="modal-title" id="EditModal">Update Pay Location</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editpaylocationForm"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
                    <div class="form-group">
                                <label for="company">Select Company</label>
                                <select name="company" id="company" class="form-control" onchange="datafiler('#company')">
                                    @foreach($company as $category)
                                        <option value="{{ $category->id }}">{{ $category->comp_name }}</option>
                                    @endforeach
                                </select>
                    </div>                         
					  <div class="form-group">
           				<input type="hidden" class="form-control" id = "paylocation_id" name= "paylocation_id">
						<label for="costcentrecode">Pay Location Code</label>
						<input type="input" class="form-control" id = "paylocation_code" name= "paylocation_code" placeholder="Enter Pay Location Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Pay Location Name</label>
						<input type="input" class="form-control" id = "paylocation_name" name= "paylocation_name" placeholder="Enter Pay Location Name">
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