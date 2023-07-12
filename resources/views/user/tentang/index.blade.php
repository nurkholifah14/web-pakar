@extends('layout.user.main')

@section('tittle') @lang('translation.Tentang') @endsection

@section('container')

    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <div class="field-box">
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <strong>Ketentuan Diagnosa</strong>
                </div>
                <div class="field-box-content">
                    <ul class="rules">
                        <li><i class="far fa-check-circle"></i>Sistem rekomendasi akan melakukan identifikasi jenis kulit terlebih dahulu.</li>
                        <li><i class="far fa-check-circle"></i>Sistem rekomendasi ini terdiri dari beberapa pertanyaan.</li>
                        <li><i class="far fa-check-circle"></i>Tidak ada batasan waktu untuk menjawab pertanyaan.</li>
                        <li><i class="far fa-check-circle"></i>Jawab pertanyaan sesuai dengan gejala yang anda rasakan.</li>
                        <li><i class="far fa-check-circle"></i>Sistem akan mengetahui jenis kulit yang teridentifikasi dan memberikan rekomendasi treatment yang cocok dengan jenis kulit tersebut.</li>
                    </ul>
                    <div class="text-center text-lg-start">
                      <a href="/login" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Mulai</span>
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="user/assets/img/profil-dokter.jpg"  class="img-fluid" alt="">
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

@endsection