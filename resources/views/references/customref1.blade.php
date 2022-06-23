@extends('navigation')
@section('content')

	<input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
		<!--Add Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Custom Reference 1</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST"> 
					{{ csrf_field() }}
					<div class="modal-body">
					  <div class="form-group">
						<label for="costcentrecode">Custom Reference Code</label>
						<input type="input" class="form-control" name= "ref1_code" placeholder="Enter Custom Reference Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Custom Reference Name</label>
						<input type="input" class="form-control" name= "ref1_name" placeholder="Enter Custom Reference Name">
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
				<h5 class="modal-title" id="EditModal">Update Custom Reference 1</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
				<form action = "" method = "POST" id = "editForm1"> 
					{{ csrf_field() }}
         			{{ method_field('PUT') }}
					<div class="modal-body">
					  <div class="form-group">
           				<input type="hidden" class="form-control" id = "ref_id" name= "ref1_id">
						<label for="costcentrecode">Custom Reference Code</label>
						<input type="input" class="form-control" id = "edit_ref_code" name= "ref1_code" placeholder="Enter Custom Reference 1 Code">
					  </div>
					  <div class="form-group">
						<label for="costcentrename">Custom Reference Name</label>
						<input type="input" class="form-control" id = "edit_ref_name" name= "ref1_name" placeholder="Enter Custom Reference 1 Name">
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
    <div class="container">
        <div class="card">
            <div class="card-header">Custom Reference 1</div>
                <div class="card-body">
				    <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#exampleModal">
						 Add New
					</button>
                    <br/>
                    <br/>
					@if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id= "customref_table" class="table table-striped">
                            <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Custom Reference 1 Centre Code</th>
                                        <th>Custom Reference 1 Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ref as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->ref1_code }}</td>
                                        <td>{{ $item->ref1_name }}</td>
                                        <td>
                                              <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                              <form method="POST" action="{{ route( 'customref1.destroy',[session('tenantcode'), $item->id]) }}" style="display:inline">
											 	  {{ method_field('DELETE') }}  	
												  {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
		</div>
	</div>
 @push('scripts')
@include('scripts.customrefChange')
@endpush
@endsection
