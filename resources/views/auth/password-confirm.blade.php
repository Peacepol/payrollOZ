@extends('template')

@section('content')<? // reference in template.blade.php yield ?>
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
               
                <div class="col-md-7">
                    <div class="card-body">
                    
                    <p class="login-card-description">Confirm your Password</p>
                        <form method="POST" action="{{ url('user/confirm-password') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control " name="password" required placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="confirm" id="confirm" class="btn btn-block btn-primary login-btn mb-4" type="submit" value="Confirm">
                        </form>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
