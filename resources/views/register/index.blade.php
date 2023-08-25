@extends('layout.auth.login')

@section('tittleauth') @lang('Register') @endsection

@section('container')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline bg-warning">
        <div class="text-light p-3">
            <b>Registration Form</b>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="/register" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap" id="name" name="name" value="{{old('name')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
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
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning btn-block">Register</button>
                    </div>
                <!-- /.col nn -->
                </div>
            </form>
            <small class="d-block text-center mt-3 color: white">Already resgisted? <a href="/login">Login</a></small>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection