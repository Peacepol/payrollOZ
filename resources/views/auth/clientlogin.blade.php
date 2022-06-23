@extends('template')

@section('content')<? // reference in template.blade.php yield ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"> <img src="/img/logo.png" alt="logo" class="logo"></h3></div>
                                    <div class="card-body">
                                    <form method="POST" action="getclientcode">
                                       @csrf
                                        <div class="form-group mb-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="clientcode" name="clientcode" id="clientcode" class="form-control" placeholder="Enter Client Code">
                                                <label for="clientcode" >Client Code</label>
                                                @error('clientcode')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>    
                                        </div>
                                        <div class="text-center">
                                            <input name="login" id="login" class="btn btn-block btn-success login-btn mb-4 text" type="submit" value="Login">
                                        </div>
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <a href="forgot-password" class="forgot-password-link">Forgot password?</a>
                                        <p class="login-card-footer-text">Don't have an account?  
                                            @if(Session::has('tenantcode'))
                                            <a href="{{ route('register', session('tenantcode')) }}" class="text-reset">Register here</a>
                                            @endif
                                            <a href="{{ route('register', 'default') }}" class="text-reset">Register here</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
