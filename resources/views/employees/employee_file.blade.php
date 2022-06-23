@extends('navigation')
@section('content')
    <div class="container-fluid">
        <div class="card w-100">
        <input type="hidden" value="{{session('tenantcode')}}" id="tenant_code">
            <div class="card-header">Employee File Maintenance
                <!-- <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#addBranch" > Add New </button> -->
                <a href="{{ route('employee.create',session('tenantcode')) }}" class="float-end btn btn-success btn-sm " title="Add New">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
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
            <div class="card-body">
                <!-- RH: this is bootstrap 5 tabbed panel -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Employee Payroll Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="superannuation-tab" data-bs-toggle="tab" href="#superannuation" role="tab" aria-controls="superannuation" aria-selected="false">Supperannuation</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bankcredits-tab" data-bs-toggle="tab" href="#bankcredits" role="tab" aria-controls="bankcredits" aria-selected="false">Bank Credits</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bankdeduction-tab" data-bs-toggle="tab" href="#bankdeduction" role="tab" aria-controls="bankdeduction" aria-selected="false">Bank Deduction</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="standardpay-tab" data-bs-toggle="tab" href="#standardpay" role="tab" aria-controls="standardpay" aria-selected="false">Standard Pay</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ratehistory-tab" data-bs-toggle="tab" href="#ratehistory" role="tab" aria-controls="ratehistory" aria-selected="false">Rate History</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="comments-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">                    
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mb-3">   
                            <h5 class="card-title"><h6 class="col">EMPLOYEE PERSONAL DETAILS</h6></h5>
                            <input type="hidden" class="form-control" id = "tenant_code" name= "tenant_code" value = "{{session('tenantcode')}}">
                        </div>
                        <div class="row mb-3" >
				            <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
				            <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                        </div>
                        <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empupdate">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "personaldetails" required/>
                            <input type="hidden" class="form-control col"  id="id"  name="id"  value = "{{ $employees->id }}" required/>
                                <div class="row">   
                                    <div class="form-group col-sm">
                                        <img src="https://source.unsplash.com/random/200x200?sig=1" alt="" width="150" height="100"> 
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="emp_code">Employee Code</label>
                                        <input type="text" class="form-control col"  id="emp_code"  name="emp_code" value = "{{ $employees->emp_code }}" required/>
                                        @error('emp_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Employee Code is requried.</strong>
                                            </span>
                                        @enderror
                                        <label for="emp_alphacode">Alpha Code</label>
                                        <input type="text" class="form-control col"  id="emp_alphacode" name="emp_alphacode" value = "{{ $employees->emp_alphacode }}" required/>
                                        @error('emp_alphacode')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Alpha Code is requried.</strong>
                                                    </span>
                                            @enderror
                                        <label for="company_id">Company</label>
                                        <select name="company_id" id="company_id" class="form-control col company_id" required>
                                            @foreach($company as $comp)
                                                <?php 
                                                    if($comp->id == $employees->company_id){
                                                        echo '<option selected value="'.$comp->id.'">'.$comp->comp_name.'</option>';
                                                    }else{
                                                        echo '<option  value="'.$comp->id.'">'.$comp->comp_name.'</option>';
                                                    }
                                                ?>                                                     
                                            @endforeach                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_fname">First Name</label>
                                            <input type="text" name="emp_fname" id="emp_fname" class="form-control @error('emp_fname') is-invalid @enderror"value="{{ $employees->emp_fname }}" autocomplete="comp_name" autofocus required placeholder="First Name" />
                                            @error('emp_fname')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>First Name is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_mname">Middle Name</label>
                                            <input type="text" name="emp_mname" id="emp_mname" class="form-control @error('emp_mname') is-invalid @enderror"value="{{ $employees->emp_mname }}" autocomplete="emp_mname" autofocus required placeholder="Middle Name" />
                                            @error('emp_mname')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Middle Name is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_lname">Last Name</label>
                                            <input type="text" name="emp_lname" id="emp_lname" class="form-control @error('emp_lname') is-invalid @enderror"value="{{ $employees->emp_lname }}" autocomplete="emp_lname" autofocus required placeholder="Last Name" />
                                            @error('emp_lname')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Company Name is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                </div>

                                <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_dob">Date of Birth</label>
                                            <input type="date" name="emp_dob" id="emp_dob" class="form-control @error('emp_dob') is-invalid @enderror"value="{{ $employees->emp_dob }}" autocomplete="emp_dob" autofocus required/>
                                            @error('emp_dob')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Date of Birth is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_mstatus">Marital Status</label>
                                            <select name="emp_mstatus" id="emp_mstatus" class="form-control @error('emp_mstatus') is-invalid @enderror emp_mstatus" autofocus required>
                                                <?php 	$mstatus = config('const.MARITAL_STATUS');
                                                        $i=0;
                                                        for($i=0;$i<=count($mstatus)-1;$i++){
                                                            if($mstatus[$i] == $employees->emp_mstatus ){
                                                                echo '<option selected value="'.$employees->emp_mstatus.'" >'.$employees->emp_mstatus.'</option>';
                                                            }else{
                                                                echo '<option value="'.$mstatus[$i].'" >'.$mstatus[$i].'</option>';
                                                            }
                                                            
                                                        }
                                                ?>
                                            </select>
                                            @error('emp_mstatus')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Marital Status is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_gender">Gender</label>
                                            <select name="emp_gender" id="emp_gender" class="form-control @error('emp_gender') is-invalid @enderror emp_gender" autofocus required>
                                                <?php 	$gender = config('const.EMP_GENDER');
                                                        $i=0;
                                                        for($i=0;$i<=count($gender)-1;$i++){
                                                            if($gender[$i] == $employees->emp_gender ){
                                                                echo '<option selected value="'.$gender[$i].'" >'.$gender[$i].'</option>';
                                                            }else{
                                                                echo '<option value="'.$gender[$i].'" >'.$gender[$i].'</option>';
                                                            }
                                                        }
                                                ?>
                                            </select>	
                                            @error('emp_gender')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Gender is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_doe">Date Employed</label>
                                            <input type="date" name="emp_doe" id="emp_doe" class="form-control @error('emp_doe') is-invalid @enderror"value="{{ $employees->emp_doe }}" autocomplete="emp_doe" autofocus required/>
                                            @error('emp_doe')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Date of Employement is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_estatus">Employment Status</label>
                                            <select name="emp_estatus" id="emp_estatus" class="form-control @error('emp_estatus') is-invalid @enderror emp_estatus" autofocus required>
                                                @foreach($status as $stat)
                                                       <?php 
                                                            if($stat->id == $employees->emp_estatus){
                                                                echo '<option selected value="'.$stat->id.'">'.$stat->status_code.' - '.$stat->status_name.'</option>';
                                                            }else{
                                                                echo '<option  value="'.$stat->id.'">'.$stat->status_code.' - '.$stat->status_name.'</option>';
                                                            }
                                                       ?>                                                        
                                                @endforeach 
                                            </select>
                                            @error('emp_estatus')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Employment Status is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_position">Position</label>
                                            <select name="emp_position" id="emp_position" class="form-control @error('emp_position') is-invalid @enderror emp_position" autofocus required>
                                                @foreach($positions as $pos)
                                                    <?php 
                                                        if($pos->id == $employees->emp_position){
                                                            echo '<option selected value="'.$pos->id.'">'.$pos->position_code.' - '.$pos->position_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$pos->id.'">'.$pos->position_code.' - '.$pos->position_name.'</option>';
                                                        }
                                                    ?>                                                     
                                                @endforeach
                                            </select>	
                                            @error('emp_position')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Position is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_branchid">Branch</label>
                                                <select name="emp_branchid" id="emp_branchid" class="form-control branch_id  @error('emp_branchid') is-invalid @enderror emp_branchid" autofocus requried>
                                                    @foreach($branchs as $branch)
                                                        <?php 
                                                            if($branch->id == $employees->emp_branchid){
                                                                echo '<option selected value="'.$branch->id.'">'.$branch->branch_code.' - '.$branch->branch_name.'</option>';
                                                            }else{
                                                                echo '<option  value="'.$branch->id.'">'.$branch->branch_code.' - '.$branch->branch_name.'</option>';
                                                            }
                                                        ?>                                                     
                                                    @endforeach
                                                </select>
                                            @error('emp_branchid')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Branch is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_depid">Department</label>
                                            <select name="emp_depid" id="emp_depid" class="form-control dept_id @error('emp_depid') is-invalid @enderror emp_depid" autofocus requried>
                                                @foreach($departments as $dep)
                                                    <?php 
                                                        if($dep->id == $employees->emp_depid){
                                                            echo '<option selected value="'.$dep->id.'">'.$dep->dep_code.' - '.$dep->dep_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$dep->id.'">'.$dep->dep_code.' - '.$dep->dep_name.'</option>';
                                                        }
                                                    ?>                                                     
                                                @endforeach
                                            </select>
                                            @error('emp_depid')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Department is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_email">Email Address</label>
                                            <input type="email" name="emp_email" id="emp_email" class="form-control @error('emp_email') is-invalid @enderror"value="{{ $employees->emp_email }}" autocomplete="emp_email" autofocus required/>
                                            @error('emp_email')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Employee Email is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_dot">Date Ended</label>
                                            <input type="date" name="emp_dot" id="emp_dot" class="form-control @error('emp_dot') is-invalid @enderror"value="{{ $employees->emp_dot }}" autocomplete="emp_dot" autofocus/>
                                            @error('emp_dot')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>DOT is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_nationality">Nationality</label>
                                            <input type="text" name="emp_nationality" id="emp_nationality" class="form-control @error('emp_nationality') is-invalid @enderror"value="{{ $employees->emp_nationality }}" autocomplete="emp_nationality" autofocus required/>
                                            @error('emp_nationality')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Department is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_religion">Religion</label>
                                            <input type="text" name="emp_religion" id="emp_religion" class="form-control @error('emp_religion') is-invalid @enderror"value="{{ $employees->emp_religion }}" autocomplete="emp_religion" autofocus required/>
                                            @error('emp_religion')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row mb-3 float-end">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Personal Details" form="empupdate" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div>                 
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE PAYROLL DETAILS</h6></h5>
                            </div>
                            <div class="row mb-3" >
				                <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
				                <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                             </div>
                                <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empfileupdate">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}    
                                    <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "payrolldetails" required/>
                                    <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_defid">Period Definition</label>
                                            <select name="emp_defid" id="emp_defid" class="form-control @error('emp_defid') is-invalid @enderror emp_defid" autofocus>
                                            </select>
                                            @error('emp_defid')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>DOT is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_tax">Tax ID No.</label>
                                            <input type="text" name="emp_tax" id="emp_tax" class="form-control @error('emp_tax') is-invalid @enderror"value="{{ $employeesfile->emp_taxid }}" autocomplete="emp_tax" autofocus />
                                            @error('emp_tax')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Department is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_rateyear">Annual Salary</label>
                                            <input type="number" name="emp_rateyear" id="emp_rateyear" class="form-control @error('emp_rateyear') is-invalid @enderror"value="{{ $employeesfile->emp_rateyear }}" autocomplete="emp_rateyear" autofocus />
                                            @error('emp_rateyear')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_paymode">Payment Mode</label>
                                            <select name="emp_paymode" id="emp_paymode" class="form-control @error('emp_paymode') is-invalid @enderror emp_paymode" autofocus  >
                                            <?php 	$p_mode = config('const.PAY_MODE');
                                                    $p_mode_name = config('const.PAY_MODE_NAME');
                                                        $i=0;
                                                        for($i=0;$i<=count($p_mode)-1;$i++){
                                                            if($p_mode[$i] == $employeesfile->emp_paymode){
                                                                echo '<option selected value="'.$p_mode[$i].'" >'.$p_mode_name[$i].'</option>';
                                                            }else{
                                                                echo '<option value="'.$p_mode[$i].'" >'.$p_mode_name[$i].'</option>';
                                                            }
                                                        }
                                                ?>
                                            </select>
                                            @error('emp_paymode')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>Payment Mode is requried.</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_rateunit">Rate Per</label>
                                            <input type="number" name="emp_rateunit" step="0.0001" id="emp_rateunit" class="form-control @error('emp_rateunit') is-invalid @enderror"value="{{ $employeesfile->emp_rateunit }}" autocomplete="emp_rateunit" autofocus />
                                            @error('emp_rateunit')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_dependents">No of Dependents</label>
                                            <input type="number" name="emp_dependents" id="emp_dependents" class="form-control @error('emp_dependents') is-invalid @enderror"value="{{ $employeesfile->emp_dependents }}" autocomplete="emp_dependents" autofocus/>
                                            @error('emp_dependents')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm">
                                            <input type="checkbox" name="emp_res" id="emp_res" class="btn-check" id="btn-check" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="emp_res">PNG Citizen</label>
                                            
                                            <input type="checkbox" class="btn-check" name="emp_taxformlodged" id="emp_taxformlodged" id="btn-check"autocomplete="off" >
                                            <label class="btn btn-outline-primary" for="emp_taxformlodged">Tax Form Lodged</label>
                                        </div>
                                        <div class="form-group col-sm">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm">
                                            <label for="emp_paylocid">Payroll Location</label>
                                            <select name="emp_paylocid" id="emp_paylocid" class="form-control @error('emp_paylocid') is-invalid @enderror emp_paylocid" autofocus>
                                                 @foreach($paylocation as $payloc)
                                                    <?php 
                                                        if($payloc->id == $employeesfile->emp_paylocid){
                                                            echo '<option selected value="'.$payloc->id.'">'.$payloc->paylocation_code.' - '.$payloc->paylocation_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$payloc->id.'">'.$payloc->paylocation_code.' - '.$payloc->paylocation_name.'</option>';
                                                        }
                                                    ?>                                                     
                                                @endforeach                                            
                                            </select>
                                            @error('emp_paylocid')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_paynoid">Pay Batch Number</label>
                                            <select name="emp_paynoid" id="emp_paynoid" class="form-control @error('emp_paynoid') is-invalid @enderror emp_paynoid" autofocus>
                                                @foreach($paybatch as $paybatchs)
                                                    <?php 
                                                        if($paybatchs->id == $employeesfile->emp_paynoid){
                                                            echo '<option selected value="'.$paybatchs->id.'">'.$paybatchs->paybatch_code.' - '.$paybatchs->paybatch_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$paybatchs->id.'">'.$paybatchs->paybatch_code.' - '.$paybatchs->paybatch_name.'</option>';
                                                        }
                                                    ?>                                                     
                                                @endforeach  
                                           </select>
                                            @error('emp_paynoid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Department is requried.</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_costid">Cost Centre</label>
                                            <select name="emp_costid" id="emp_costid" class="form-control @error('emp_costid') is-invalid @enderror emp_costid" autofocus>
                                                @foreach($costcentre as $cost)
                                                    <?php 
                                                        if($cost->id == $employeesfile->emp_costid){
                                                            echo '<option selected value="'.$cost->id.'">'.$cost->cost_code.' - '.$cost->cost_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$cost->id.'">'.$cost->cost_code.' - '.$cost->cost_name.'</option>';
                                                        }
                                                    ?>                                                     
                                                @endforeach
                                            </select>
                                            @error('emp_costid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            @enderror
                                        </div>                                        
                                    </div>
                                    <div class = "row">
                                        <div class="form-group col-sm">
                                            <label for="emp_supervisor">Supervisor</label>
                                            <select name="emp_supervisor" id="emp_supervisor" class="form-control @error('emp_supervisor') is-invalid @enderror emp_defid" autofocus>
                                            </select>
                                            @error('emp_supervisor')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="emp_ncsl">NCSL Number</label>
                                            <input type="number" name="emp_ncsl" id="emp_ncsl" class="form-control @error('emp_ncsl') is-invalid @enderror"value="{{ $employeesfile->emp_ncsl }}" autocomplete="emp_rateyear" autofocus />
                                            @error('emp_ncsl')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row float-end">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Payroll Details" form="empfileupdate" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div>                         
                            </form>
                        </div><!--Payroll Details Tab End-->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mb-3">
                                    <h5 class="card-title"><h6 class="col">EMPLOYEE CONTACT INFORMATION</h6></h5>
                                <div class="row mb-3" >
				                    <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
				                    <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                                </div>
                                <div class="row mb-3" >
                                    <button type="button" class="float-end btn btn-success btn-sm" width = "10%" data-toggle="modal" data-target="#exampleModal">
                                        Add New Contacts
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id= "datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Relationship</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($empcontacts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->emp_cname }}</td>
                                            <td>{{ $item->emp_cadd }}</td>
                                            <td>{{ $item->emp_cphone }}</td>
                                            <td>{{ $item->emp_cmobile }}</td>
                                            <td>{{ $item->emp_cemail }}</td>
                                            <td>{{ $item->emp_crelation }}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit Contact</button>
                                                <form method="POST" action="{{ route('employeefile.destroy',[session('tenantcode'), $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                    <input type="hidden" class="form-control" id = "emp_id" name= "emp_id" value = "{{ $employees->id }}">    
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
                        </div><!--Contact Info Tab End-->
                        <div class="tab-pane fade" id="superannuation" role="tabpanel" aria-labelledby="superannuation-tab">
                                <div class="row mb-3">
                                        <h5 class="card-title"><h6 class="col">EMPLOYEE SUPERANNUATION</h6></h5>
                                </div>
                                <div class="row mb-3" >
                                    <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
                                    <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                                </div>
                            <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empsuperupdate1">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}    
                                <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "superannuation" required/>
                                <input type="hidden" class="form-control col"  id="emp_id"  name="emp_id"  value = "{{ $employees->id }}" required/>
                                <input type="hidden" class="form-control col"  id="sup_num"  name="sup_num"  value = "1" required/>
                                <div class = "row">
                                    <div class="form-group col-sm">
                                        <label for="sup_id1">1 - Superannuation</label>
                                        <select name="sup_id1" id="sup_id1" class="form-control @error('sup_id1') is-invalid @enderror sup_id1" autofocus>
                                        <option  value="0">--Select Superannution--</option>
                                        @foreach($super as $sup)
                                            <?php 
                                                $supno1 = "";
                                                $supcommence1 = "";
                                                $supprodno1 = "";
                                                foreach($empsuper as $empsup){
                                                    if($empsup->sup_num == 1){
                                                        $supno1 = $empsup->sup_no;
                                                        $supcommence1 = $empsup->sup_commence;
                                                        $supprodno1 = $empsup->sup_productno;
                                                        if($sup->id == $empsup->sup_id){
                                                            echo '<option selected value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        @endforeach
                                        </select>
                                        @error('sup_id1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                      
                                <div class = "row mb-3">
                                    <div class="form-group col-sm">
                                        <label for="sup_no1">Superannuation Number</label>
                                        <input type="sup_no1" name="sup_no1" id="sup_no1" class="form-control @error('sup_no1') is-invalid @enderror"value="<?php echo $supno1; ?>" />
                                        @error('sup_no')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_commence1">Commence Date</label>
                                        <input type="date" name="sup_commence1" id="sup_commence1" class="form-control @error('sup_commence1') is-invalid @enderror"value="<?php echo $supcommence1; ?>" />
                                        @error('sup_commence')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>Commence Date is requried.</strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_productno1">Product Number</label>
                                        <input type="number" name="sup_productno1" id="sup_productno1" class="form-control @error('sup_productno1') is-invalid @enderror"value="<?php echo $supprodno1; ?>" />
                                        @error('sup_productno1')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                      
                                    </div>
                                </div>
                                <div class="row mb-3 text-right">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Superannuation" form="empsuperupdate1" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div> 
                            </form>
                                
                            <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empsuperupdate2">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}    
                                <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "superannuation" required/>
                                <input type="hidden" class="form-control col"  id="emp_id"  name="emp_id"  value = "{{ $employees->id }}" required/>
                                <input type="hidden" class="form-control col"  id="sup_num"  name="sup_num"  value = "2" required/>
                                <div class = "row mb-3">
                                    <div class="form-group col-sm">
                                        <label for="sup_id2">2 - Superannuation</label>
                                        <select name="sup_id2" id="sup_id2" class="form-control @error('sup_id2') is-invalid @enderror sup_id2" autofocus>
                                        <option  value="0">--Select Superannution--</option>
                                        @foreach($super as $sup)
                                            <?php 
                                                $sup_no2 = "";
                                                $supcommence2 = "";
                                                $supprodno2 = "";
                                                foreach($empsuper as $empsup){
                                                    if($empsup->sup_num == 2){
                                                        $sup_no2 = $empsup->sup_no;
                                                        $supcommence2 = $empsup->sup_commence;
                                                        $supprodno2 = $empsup->sup_productno;
                                                        if($sup->id == $empsup->sup_id){
                                                            echo '<option selected value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        @endforeach
                                        </select>
                                        @error('sup_id2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                             
                                <div class = "row mb-3">
                                    <div class="form-group col-sm">
                                        <label for="sup_no2">Superannuation Number</label>
                                        <input type="sup_no2" name="sup_no2" id="sup_no2" class="form-control @error('sup_no2') is-invalid @enderror"value="<?php echo $sup_no2; ?>" />
                                        @error('sup_no2')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_commence2">Commence Date</label>
                                        <input type="date" name="sup_commence2" id="sup_commence2" class="form-control @error('sup_commence2') is-invalid @enderror"value="<?php echo $supcommence2; ?>" />
                                        @error('sup_commence2')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>Commence Date is requried.</strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_productno2">Product Number</label>
                                        <input type="number" name="sup_productno2" id="sup_productno2" class="form-control @error('sup_productno2') is-invalid @enderror"value="<?php echo $supprodno2; ?>" />
                                        @error('sup_productno2')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                      
                                    </div>
                                </div>
                                <div class="row mb-3 text-right">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Superannuation" form="empsuperupdate2" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div> 
                            </form>

                            <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empsuperupdate3">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}    
                                <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "superannuation" required/>
                                <input type="hidden" class="form-control col"  id="emp_id"  name="emp_id"  value = "{{ $employees->id }}" required/>
                                <input type="hidden" class="form-control col"  id="sup_num"  name="sup_num"  value = "3" required/>
                                <div class = "row">
                                    <div class="form-group col-sm">
                                        <label for="sup_id3">3 - Superannuation</label>
                                        <select name="sup_id3" id="sup_id3" class="form-control @error('sup_id3') is-invalid @enderror sup_id3">
                                        <option  value="0">--Select Superannution--</option>
                                        @foreach($super as $sup)
                                            <?php 
                                                $sup_no3 = "";
                                                $supcommence3 = "";
                                                $supprodno3 = "";
                                                foreach($empsuper as $empsup){
                                                    if($empsup->sup_num == 3){
                                                        $sup_no3 = $empsup->sup_no;
                                                        $supcommence3 = $empsup->sup_commence;
                                                        $supprodno3 = $empsup->sup_productno;
                                                        if($sup->id == $empsup->sup_id){
                                                            echo '<option selected value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }else{
                                                            echo '<option  value="'.$sup->id.'">'.$sup->product_name.' - '.$sup->registered_name.'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        @endforeach
                                        </select>
                                        @error('sup_id3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                             
                                <div class = "row mb-3">
                                    <div class="form-group col-sm">
                                        <label for="sup_no3">Superannuation Number</label>
                                        <input type="sup_no3" name="sup_no3" id="sup_no3" class="form-control @error('sup_no3') is-invalid @enderror"value="<?php echo $sup_no3; ?>" />
                                        @error('sup_no3')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_commence3">Commence Date</label>
                                        <input type="date" name="sup_commence3" id="sup_commence3" class="form-control @error('sup_commence3') is-invalid @enderror"value="<?php echo $supcommence3; ?>" />
                                        @error('sup_commence3')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>Commence Date is requried.</strong>
                                                </span>
                                        @enderror                                    
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="sup_productno3">Product Number</label>
                                        <input type="number" name="sup_productno3" id="sup_productno3" class="form-control @error('sup_productno3') is-invalid @enderror"value="<?php echo $supprodno3; ?>" />
                                        @error('sup_productno3')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        @enderror                                      
                                    </div>
                                </div>
                                <div class="row mb-3 text-right">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Superannuation" form="empsuperupdate3" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div> 
                            </form>
                        </div><!--Superannuation Tab End-->
                        <div class="tab-pane fade" id="bankcredits" role="tabpanel" aria-labelledby="bankcredits-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE BANK CREDITS</h6></h5>
                            </div>
                            <div class="row mb-3" >
				                <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
				                <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bankdeduction" role="tabpanel" aria-labelledby="bankdeduction-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE BANK DEDUCTIONS</h6></h5>
                            </div>
                            <div class="row mb-3" >
				                <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
				                <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                            </div>  
                        </div>
                        <div class="tab-pane fade" id="standardpay" role="tabpanel" aria-labelledby="standardpay-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE STANDARD PAY</h6></h5>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ratehistory" role="tabpanel" aria-labelledby="ratehistory-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE PAY RATE HISTORY</h6></h5>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                            <div class="row mb-3">
                                <h5 class="card-title"><h6 class="col">EMPLOYEE COMMENTS</h6></h5>
                            </div>
                            <div class="row mb-3" >
                                    <span class="col-xl-8" id="recordid" >Record ID: <strong>{{ $employees->id }}</strong></span>	
                                    <span class="col-xl-8" id="recordid" ><h6>{{ $employees->emp_code }} - {{ $employees->emp_fname }} {{ $employees->emp_mname }} {{ $employees->emp_lname }}</h6></span>			
                                </div>
                            <form action="{{ route('employee.update',[session('tenantcode'), $employees->id]) }}" method="post" id = "empcontact">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" class="form-control col"  id="activetab"  name="activetab"  value = "empcontacts" required/>
                            <input type="hidden" class="form-control col"  id="emp_id"  name="emp_id"  value = "{{ $employees->id }}" required/>
                            <div class="row mb-3">				
                                <textarea class="form-control col" id="emp_comments" name = "emp_comments" rows="10" cols="100" >{{$employees->emp_comments}}</textarea>
                            </div>
                            <div class="row mb-3 text-right">
                                    <div class="form-group col-sm">
                                        <input type="submit" value="Update Comment" form="empcontact" class="btn btn-success btn-sm mx-2">    
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@include('employees.empcontact_modal')
@push('scripts')
@include('scripts.empcontacts')
@endpush
@endsection


