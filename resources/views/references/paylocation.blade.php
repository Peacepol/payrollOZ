@extends('navigation')
@section('content')
	<input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">  
    <div class="container">
        <div class="card">
            <div class="card-header">Pay Location</div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group" >
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="status">Filter List Company</label>
                        </div>
                        <select class="custom-select" id = "company" name = "company" aria-label="Example select with button addon">
                          <option value ="0"><--Select Company--></option>
                            @foreach($company as $category)
                              <option value="{{ $category->id }}">{{ $category->comp_name }}</option>
                            @endforeach	
                        </select>
                        <div class="input-group-append">
                        </div>
                        </div>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-2">
                          <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#exampleModal">
                                          Add New
                          </button>
                        </div>
                    </div>        
                    <br/>
                    <br/>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                      <ul>
                      @foreach($errors->all() as $error)  
                      <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                    </div>
                    @endif
                    @if(\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                      <p>{{\Session::get('success')}}</p>
                    </div>  
                    @endif

                    <div class="table-responsive">
                        <table id= "datatable" class="table table-striped">
                            <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Pay Location Name</th>
                                        <th>Pay Location Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="paylocation_table_body">
                                @foreach($PayLocation as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->paylocation_name	 }}</td>
                                        <td>{{ $item->paylocation_code	 }}</td>
                                        <td>
                                              <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                              <form method="POST" action="PayLocation/$item->id" style="display:inline">
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
@include('references.paylocation_modal')
@push('scripts')
@include('scripts.paylocation')
@endpush
@endsection
