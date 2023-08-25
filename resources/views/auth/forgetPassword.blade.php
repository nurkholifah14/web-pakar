@extends('layout.auth.login')

@section('tittleauth') @lang('Forget Password') @endsection

@section('container')

<section class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            <h2> Forgot Your Password ? </h2>
            <p>please enter your mail to password reset request</p>
            <!-- <form action="{{ route('forget.password.post') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="row">
                <div class="col-12">
           
                    <input type="submit" class="btn btn-warning btn-block" value="Request Password Reset">
                </div>
           
                </div>
            </form> -->

            
            <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-3 col-form-label">Email</label>
                              <div class="col-md-9">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-12">
                              <button type="submit" class="btn btn-warning btn-block">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>

            <p class="mt-3 mb-1">
                <a href="/login">Login</a>
            </p>
            <p class="mb-0">
                <a href="/register" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
</section>
@endsection