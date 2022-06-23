@extends('template')

@section('content')
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">
                                            <img src="/img/logo.png" alt="logo" class="logo">
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                    <p class="login-card-description">Register a new account</p>
                                    <form method="POST" action="{{ route('register',session('tenantcode')) }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="form-group col-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
                                                    <label for="first_name">First Name</label>
                                                </div>
                                            </div>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            <div class="form-group col-6">
                                                <div class="form-floating mb-3 mb-md-0">                                                    
                                                    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus placeholder="Middle Name">
                                                    <label for="middle_name">Middle Name</label>
                                                </div>
                                            </div>
                                            @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
                                                  <label for="last_name">Last Name</label>
                                                </div>
                                            </div>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            <div class="form-group col-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="Phone Number">
                                                    <label for="phone_number">Phone Number</label>
                                                </div>
                                            </div>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group  col-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" placeholder="Company Name">
                                                    <label for="company_name" >Company Name</label>
                                                    @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-6 ">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                    <label for="password" >Password</label>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-6 ">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                                    <label for="password" >Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "text-center">
                                            <input name="register" id="register" class="btn btn-block btn-success login-btn mt-4" type="submit" value="Register">
                                        </div>    
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><p class="login-card-footer-text">Alredy have an account? <a href="{{ route('login',session('tenantcode')) }}" class="text-reset">Login here</a></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
