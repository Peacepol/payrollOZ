@extends('navigation')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Pay Item</div>
					 
				<input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
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
                                        <th>Pay Item Code</th>
                                        <th>Pay Item Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payitem as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item_code }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>
                                              <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                              <form method="POST" action="{{ route( 'customref3.destroy',[session('tenantcode'), $item->id]) }}" style="display:inline">
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
	
@include('references.pay_item_modal')
@push('scripts')
@include('scripts.accumulator')
@endpush
@endsection
