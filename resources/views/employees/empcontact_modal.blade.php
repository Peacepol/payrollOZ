		<!--Edit Modal -->
		<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document" style = "max-width:50%">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="EditModal">Update Contacts</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editForm"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id = "emp_id" name= "emp_id">
                            <label for="costcentrecode">Name</label>
                            <input type="input" class="form-control" id = "emp_cname" name= "emp_cname" >
                        </div>
                        <div class="form-group">
                            <label for="costcentrename">Address</label>
                            <input type="input" class="form-control" id = "emp_cadd" name= "emp_cadd">
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="emp_cphone">Phone</label>
                                <input type="input" class="form-control" id = "emp_cphone" name= "emp_cphone">
                            </div>
                            <div class="form-group col-sm">
                                <label for="emp_cmobile">Mobile</label>
                                <input type="input"class="form-control" id="emp_cmobile" name="emp_cmobile">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="emp_cemail">Email</label>
                                <input type="email" class="form-control" id = "emp_cemail" name= "emp_cemail">
                            </div>
                            <div class="form-group col-sm">
                                <label for="emp_crelation">Relation</label>
                                <input type="input" class="form-control" id="emp_crelation" name="emp_crelation">
                            </div>
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
<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style = "max-width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action = "{{ route('employeefile.store',session('tenantcode')) }}" method = "post" class="form-group"  action="/action_page.php">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id = "emp_id" name= "emp_id" value = "{{ $employees->id }}">
                            <label for="costcentrecode">Name</label>
                            <input type="input" class="form-control" id = "emp_cname" name= "emp_cname" >
                        </div>
                        <div class="form-group">
                            <label for="costcentrename">Address</label>
                            <input type="input" class="form-control" id = "emp_cadd" name= "emp_cadd">
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="emp_cphone">Phone</label>
                                <input type="input" class="form-control" id = "emp_cphone" name= "emp_cphone">
                            </div>
                            <div class="form-group col-sm">
                                <label for="emp_cmobile">Mobile</label>
                                <input type="input"class="form-control" id="emp_cmobile" name="emp_cmobile">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group col-sm">
                                <label for="emp_cemail">Email</label>
                                <input type="email" class="form-control" id = "emp_cemail" name= "emp_cemail">
                            </div>
                            <div class="form-group col-sm">
                                <label for="emp_crelation">Relation</label>
                                <input type="input" class="form-control" id="emp_crelation" name="emp_crelation">
                            </div>
                        </div>                                                				  
					</div>
                    <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add New</button>
					</div>  
                    </form>
                </div>
            </div>
		</div>
    <!--End Add Modal-->
    