@extends('template')

@section('content')<? // reference in template.blade.php yield ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"> <img src="/img/logo.png" alt="logo" class="logo"></h3></div>
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('login',session('tenantcode') )}}">
                                        {{ csrf_field() }}
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="">
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
                                            <div class="form-group mb-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                                    <label for="password" >Password</label>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>    
                                            </div>
                                        </div> 
                                        <div class="text-center">
                                            <input name="login" id="login" class="btn btn-block btn-success login-btn mb-12 text" type="submit" value="Login">
                                        
                                        </form>
                                        <br>
                                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                                            <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register',session('tenantcode')) }}" class="text-reset">Register here</a></p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center py-3">                        
                                            <a href="#!">Terms of use.</a>
                                            <a href="#!">Privacy policy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
