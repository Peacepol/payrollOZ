@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
        <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
                     <div class="card-header">Employees Loan
                       <!-- <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#addBranch" > Add New </button> -->
                        <a href="{{ route('employee.create',session('tenantcode')) }}" class="float-end btn btn-success btn-sm " title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <label>Company</label></br>
                                <select name="company_id" id="company_id" class="form-control col-6 company_id" autofocus>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <br/>
                         @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped" id ="emploan_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>Company</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="emploan_table_body">
                                @foreach($employees as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->emp_code  }}</td>
                                        <td>{{ $item->emp_fname }} {{ $item->emp_lname }}</td>
                                        <td>{{ $item->comp_name }}</td>
                                        <td>
                                            <a href = "{{ route('emploan.show', [session('tenantcode'), $item->id]) }}"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>View</button></a>   
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
@include('org.branch_modal')
 @push('scripts')
@include('scripts.loans_script')
@endpush

@endsection


