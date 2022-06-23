@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
                    <div class="card-header">Companies 
                        <a href="{{ route('company.create',session('tenantcode')) }}" class="float-end btn btn-success btn-sm " title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <div class="card-body">
                        <br/>
                         @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Company Trading</th>
                                        <th>Email Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($company as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->comp_name }}</td>
                                        <td>{{ $item->comp_trading }}</td>
                                        <td>{{ $item->comp_email }}</td>
                                        <td>
                                        
                                            <a href="{{ route('company.show',[ session('tenantcode') , $item->id ] ) }}" title="View Student"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('company.edit',[session('tenantcode'),$item->id]) }}" title="Edit Student"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                              <form method="POST" action="{{ route('company.destroy',[session('tenantcode'), $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
@endsection