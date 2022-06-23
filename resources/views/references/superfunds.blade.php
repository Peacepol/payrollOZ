@extends('navigation')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Super Funds</title>
</head>
<body>
	<input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
    <div class="container">
        <div class="card">
            <div class="card-header">Super Funds</div>
                <div class="card-body">
				    <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#exampleModal">
						 Add New
					</button>
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
                                    <th>Product Name</th>
                                    <th>Registered Name</th>
                                    <th>Contact Phone</th>
                                    <th>Email</th>
                                    <th hidden>physical_address_line_1</th>
                                    <th hidden>physical_address_line_2</th>
                                    <th hidden>physical_suburb</th>
                                    <th hidden>physical_state</th>
                                    <th hidden>physical_post_code</th>
                                    <th hidden>postal_address_line_1</th>
                                    <th hidden>postal_address_line_2</th>
                                    <th hidden>postal_suburb</th>
                                    <th hidden>postal_state</th>
                                    <th hidden>postal_post_code</th>
                                    <th hidden>abn</th>
                                    <th hidden>bsb_account_number</th>
                                    <th hidden>website_url</th>                                    
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($superfunds as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->registered_name }}</td>
                                        <td>{{ $item->contact_phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td hidden>{{ $item->physical_address_line_1 }}</td> 
                                        <td hidden>{{ $item->physical_address_line_2 }}</td> 
                                        <td hidden>{{ $item->physical_suburb }}</td> 
                                        <td hidden>{{ $item->physical_state }}</td> 
                                        <td hidden>{{ $item->physical_post_code }}</td> 
                                        <td hidden>{{ $item->postal_address_line_1 }}</td> 
                                        <td hidden>{{ $item->postal_address_line_2 }}</td> 
                                        <td hidden>{{ $item->postal_suburb }}</td> 
                                        <td hidden>{{ $item->postal_state }}</td> 
                                        <td hidden>{{ $item->postal_post_code }}</td> 
                                        <td hidden>{{ $item->abn }}</td> 
                                        <td hidden>{{ $item->bsb_account_number }}</td> 
                                        <td hidden>{{ $item->website_url }}</td> 
                                        <td>
                                            <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                                <form method="POST" action="{{ route( 'SuperFunds.destroy',[session('tenantcode'), $item->id]) }}" style="display:inline">
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
  </body>

</html>
@include('references.superfunds_modal')
@push('scripts')
@include('scripts.superfunds')
@endpush
@endsection
