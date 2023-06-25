@extends('layout.user.main')

@section('tittle') @lang('Informasi - Treatment') @endsection

@section('container')

<main id="main">

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header mt-5">
          <h2>Informasi</h2>
          <p>Treatment wajah di Diva Klinik Beauty Care</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">

          @foreach($treatment as $treatments)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="alert alert-info alert-dismissible" role="alert">
                  <center>
                      <strong><h4><b>{{$treatments->nama_treatment}}</b></h4></strong>
                  </center>
                </div>
                <div class="profile mt-auto">
                  <img  src="{{asset('storage/' . $treatments->gambar)}}"  width="50" class="card-img-top" alt="...">
                  <h3>Fungsi</h3>
                  <p>{!! $treatments->fungsi!!}</p>
                  <h3>Harga</h3>
                  <h4>{{$treatments->harga}}</h4>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->


  </main><!-- End #main -->
@endsection