@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
        <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
                     <div class="card-header">Department  
                       <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#addDep" > Add New </button>
                     
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
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped" id ="department_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Code</th>
                                        <th>Department Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="dept_table_body">
                                @foreach($department as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->dep_code }}</td>
                                        <td>{{ $item->dep_name }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>
                                             <form method="POST" action="department/{{$item->id}}" accept-charset="UTF-8" style="display:inline">
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
@include('org.department_modal')
 @push('scripts')
@include('scripts.companylist')
@include('scripts.departmentCompanyChange')
@endpush

@endsection


