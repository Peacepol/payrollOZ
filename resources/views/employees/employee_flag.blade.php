@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card">
        <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
                     <div class="card-header"><i class="fa fa-flag" aria-hidden="true"></i>Employee Flag 
                    </div>
                      
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <select name="company_id" id="company_id" class="form-control custom-select company_id" autofocus>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                 <div class="input-group">
                                    <select class="custom-select" id="tbfilter" aria-label="Example select with button addon">
                                      <?php 	$e_flag = config('const.EMP_FLAG');
                                     $id=  array_keys($e_flag);
                                    
                                    echo '<option value="'.  $id[0].'" selected>Show All</option>
                                        <option value="'.$id[1].'">Show Active Only</option>
                                        <option value="'.$id[2].'">Show On Leave Only</option>
                                        <option value="'.$id[3].'">Show Resigned Only</option>
                                        <option value="'.$id[4].'">Show Terminated ony</option>';
                                         ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" >Submit</button>
                                    </div>
                                </div>
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
                            <table class="table table-striped" id ="empflag_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>Company</th>
                                        <th>Flag</th>
                                        <th>Return/End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="empflag_table_body">
                                @foreach($employees as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->emp_code  }}</td>
                                        <td>{{ $item->emp_fname }} {{ $item->emp_lname }}</td>
                                        <td>{{ $item->comp_name }}</td>
                                        <td>
                                        <form action = "{{session('tenantcode')}}/employeeflag/{{ $item->id  }}" method = "POST" id = "saveflagform{{ $item->id  }}"> 
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                            <select name="emp_flag" id="emp_flag" class="form-control @error('emp_flag') is-invalid @enderror emp_flag" value="{{ $item->emp_flag }}" autofocus >
                                              
                                                    @foreach(config('const.EMP_FLAG') as $key => $name)
                                                           <option value="{{$key}}" {{ $key === $item->emp_flag ? "selected" : "" }} >{{$name}}</option>
                                                    @endforeach
                                               
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="emp_dot" id="emp_dot" class="form-control @error('emp_dot') is-invalid @enderror"value="{{ $item->emp_dot }}" autocomplete="emp_dob" autofocus />
                                        </td>
                                        <td>
                                        </form>
                                            <button class="btn btn-success btn-sm saveflag" data-empid="{{ $item->id  }}" id="saveflag" type="submit" value="Save" form="saveflagform{{ $item->id  }}"><i class="fa-solid fa-floppy-disk"></i> Save Flag</button>  
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
@include('scripts.companylist')
@include('scripts.flagCompanyChange')
@endpush

@endsection


