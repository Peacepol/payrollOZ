<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>	
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>	
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href= "https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><img src="/img/logo.png" alt="logo" class="logo"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li> 
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                            </form>                            
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url('/home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!--<div class="sb-sidenav-menu-heading">Interface</div>-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#organization" aria-expanded="false" aria-controls="organization">
                                <div class="sb-nav-link-icon"><i class="fa fa-fw fa-sitemap"></i></div>
                                 Organization
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="organization" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('branch.index', session('tenantcode')) }}">Branch</a>
                                    <a class="nav-link" href="{{ route('department.index', session('tenantcode')) }}">Department</a>
                                    <a class="nav-link" href="{{ route('company.index', session('tenantcode')) }}">Company</a>
                                </nav>
                            </div>                  
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa fa-fw fa-cogs"></i></div>
                                Payroll Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    System Control Files
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">System Control File</a>
                                            <a class="nav-link" href="#">Bank Listing</a>
                                            <a class="nav-link" href="#">GL Interface Control File</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Refernces
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('costcentre.index', session('tenantcode')) }}">Cost Centre</a>
                                            <a class="nav-link" href="{{ route('PayBatch.index', session('tenantcode')) }}">Pay Batch Number</a>
                                            <a class="nav-link" href="{{ route('PayLocation.index', session('tenantcode')) }}">Pay Location</a>
                                            <a class="nav-link" href="{{ route('PayAccumulator.index', session('tenantcode')) }}">Pay Accumulator</a>
                                            <a class="nav-link" href="{{ route('SuperFunds.index', session('tenantcode')) }}">Super Funds</a>
                                            <a class="nav-link" href="{{ route('customref1.index', session('tenantcode')) }}">Custom Reference 1</a>
                                            <a class="nav-link" href="{{ route('customref2.index', session('tenantcode')) }}">Custom Reference 2</a>
                                            <a class="nav-link" href="{{ route('customref3.index', session('tenantcode')) }}">Custom Reference 3</a>
                                            <a class="nav-link" href="{{ route('payitem.index', session('tenantcode')) }}">Pay Item</a>
                                            <a class="nav-link" href="{{ route('empposition.index', session('tenantcode')) }}">Employee Position</a>
                                            <a class="nav-link" href="{{ route('empstatus.index', session('tenantcode')) }}">Employee Status</a>
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>
                             <!-- Employees Section -->
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#employee_section" aria-expanded="false" aria-controls="employee_section">
                                        <div class="sb-nav-link-icon"><i class="fa fa-fw fa-sitemap"></i></div>
                                            Employees
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="employee_section" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <!--<a class="nav-link" href="{{ route('employeefile.index', session('tenantcode')) }}">Employee File Maintenance</a>-->
                                                <a class="nav-link" href="{{ route('employee.index', session('tenantcode')) }}">Employee Files</a>
                                                <a class="nav-link" href="{{ route('employee.index', session('tenantcode')) }}">Approve Employee Changes</a>
                                                <a class="nav-link" href="{{ route('employee.index', session('tenantcode')) }}">Leave Pay Details</a>
                                                <a class="nav-link" href="{{ route('emploan.index', session('tenantcode')) }}">Loans</a>
                                                <a class="nav-link" href="{{ route('employeeflag.index', session('tenantcode')) }}">Flag Employees</a>
                                                <a class="nav-link" href="{{ route('employee.index', session('tenantcode')) }}">Leave Request</a>
                                                <a class="nav-link" href="{{ route('employee.index', session('tenantcode')) }}">Historical Pays</a>
                                            </nav>
                                        </div>  
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                            Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>       
       
  

  
    </div>

    </div>	

</body>
    @stack('scripts')
</html>
