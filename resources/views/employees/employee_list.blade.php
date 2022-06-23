@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
        <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
                     <div class="card-header">Employees  
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
                            <table class="table table-striped" id ="branch_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>Company</th>
                                        <th>Employment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="branch_table_body">
                                @foreach($employees as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->emp_code  }}</td>
                                        <td>{{ $item->emp_fname }} {{ $item->emp_lname }}</td>
                                        <td>{{ $item->comp_name }}</td>
                                        <td>{{ ($item->emp_isactive==0 ? 'Inactive' : 'Active') }}</td>
                                        <td>
                                            <a href = "{{ route('employeefile.show', [session('tenantcode'), $item->id]) }}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit Employee File</button></a>
                                             <form method="POST" action="{{ route('employee.destroy',[session('tenantcode'), $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                 {{ method_field('DELETE') }}  	
												  {{ csrf_field() }}	
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
@include('org.branch_modal')
 @push('scripts')
@include('scripts.companylist')
@include('scripts.branchCompanyChange')
@endpush

@endsection


