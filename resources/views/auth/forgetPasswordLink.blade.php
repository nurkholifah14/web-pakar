@extends('layout.auth.login')

@section('tittleauth') @lang('Reset Password') @endsection

@section('container')

<section class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
        <div class="card">
            <div class="card-header bg-warning"><b>Reset Password<b></div>
                <div class="card-body">
                    <!-- <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
        
                        <div class="form-group row">
                            <label for="email_address" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" id="password" class="form-control" name="password" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-block">Reset Password</button>
                            </div>
                        </div>
                    </form> -->

                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email_address" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" id="password" class="form-control" name="password" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning btn-block">
                                Reset Password
                            </button>
                        </div>
                      </form>
                        
                </div>
            </div>
        </div>
    </div>
</section>
@endsection