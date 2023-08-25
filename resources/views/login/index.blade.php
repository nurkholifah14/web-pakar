@extends('layout.auth.login')

@section('tittleauth') @lang('Login') @endsection

@section('container')

<section class="hold-transition login-page">
    <div class="login-box">
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}<i class="fas fa-close"></i></p>
        @endif
        @if(session('loginError'))
            <p class="alert alert-danger">{{session('loginError')}}<i class="fas fa-close"></i></p>
        @endif
        <!-- /.login-logo -->
        <div class="card card-outline bg-warning">
            <div class="text-light p-3">
                <b>LOGIN</b>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{old('email', session('registeredEmail'))}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning btn-block">Sign In</button>
                        </div>
                    <!-- /.col -->
                    </div>
                </form>
                <div class="col-12">
                    <small class="d-block text-md-right mt-3">Not registered? <a href="/register">Register Now!</a></small>
                    <small class="d-block"><a href="{{ route('forget.password.get') }}">Lupa Password ?</a></small>
                    <small class="d-block"><a href="/">Back to Dashboard</a></small>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</section>
<!-- /.login-box -->

@endsection