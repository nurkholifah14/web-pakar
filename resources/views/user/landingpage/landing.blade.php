@extends('layout.user.main')

@section('tittle')@lang('translation.Home')@endsection

@section('container')
<section id="hero" class="hero d-flex align-items-center">
<div class="bg-overlay bg-primary"></div>
@auth
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Selamat Datang Di Klinik Diva Glam</h1>
      <h3 data-aos="fade-up" data-aos-delay="400">Identifikasi Jenis Kulit</h3>
      <p data-aos="fade-up" data-aos-delay="500">Untuk rekomendasi perawatan wajah di Klinik Diva Glam</p>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="user/assets/img/klinik.jpg" class="img-fluid" alt="">
    </div>
  </div>
</div>
@else
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Selamat Datang Di Klinik Diva Glam</h1>
      <h3 data-aos="fade-up" data-aos-delay="400">Identifikasi Jenis Kulit</h3>
      <p data-aos="fade-up" data-aos-delay="500">Untuk rekomendasi perawatan wajah di Klinik Diva Glam</p>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="/tentang" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Konsultasi</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="user/assets/img/klinik.jpg" class="img-fluid" alt="">
    </div>
  </div>
</div>
@endauth
</section><!-- End Hero -->
@endsection