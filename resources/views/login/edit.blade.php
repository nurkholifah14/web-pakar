@extends('layout.user.main')

@section('tittle') @lang('translation.Ubah Profile') @endsection

@section('container')

    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
        <div class="col-lg-6 mt-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="user/assets/img/features.png"  class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <div class="field-box">
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <strong>Ubah Profile</strong>
                </div>
                <div class="field-box-content">
                  <div class="modal-body">
                    <form method="POST" action="/update">
                    @csrf
                        <div class="mb-3">
                            <label for="old_password">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap" id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="old_password">Old Password</label>
                            <input id="old_password" type="password" 
                            class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">New Password</label>
                            <input id="new_password" type="password" 
                            class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">New Password Confirmation</label>
                            <input id="password_confirmation" type="password" 
                            class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-warning col-12">Update Profile</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

@endsection