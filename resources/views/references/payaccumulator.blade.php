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
  <title>Pay Accumulator</title>


</head>
<body>
	<input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
    <div class="container">
        <div class="card">
            <div class="card-header">Pay Accumulator</div>
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
                                        <th>#</th>
                                        <th>Pay Accumulator Name</th>
                                        <th>Pay Accumulator Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payaccumulators as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->payaccumulator_name }}</td>
                                        <td>{{ $item->payaccumulator_code }}</td>
                                        <td>
                                              <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                              <form method="POST" action="PayAccumulator/<?php echo $item->id; ?>" style="display:inline">
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
@include('references.payaccumulatorcentre_modal')
@push('scripts')
@include('scripts.payaccumulator')
@endpush
@endsection
