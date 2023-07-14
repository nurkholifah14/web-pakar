@extends('layout.user.main')

@section('tittle') @lang('Informasi - Diskon') @endsection

@section('container')

<main id="main">

     <!-- ======= Portfolio Section ======= -->
     <section id="portfolio" class="portfolio mt-5">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Diskon</h2>
    <p>Klinik Diva Glam</p>
  </header>

  <div class="row" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-12 d-flex justify-content-center">
      <ul id="portfolio-flters">
        <li data-filter="*" class="filter-active">All</li>
        @foreach($categories as $category)
            <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
  @foreach($diskon as $diskons)
    <div class="col-lg-4 col-md-6 portfolio-item {{ $diskons->category->slug}}">
      <div class="portfolio-wrap">
        <img src="{{asset('storage/' . $diskons->gambar)}}"  class="img-fluid" alt="">
        <div class="portfolio-info">
          <div class="portfolio-links">
            <a href="{{asset('storage/' . $diskons->gambar)}}" data-gallery="portfolioGallery" class="portfokio-lightbox">
              <i class="bi bi-plus"></i></a> 
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>

</div>

</section><!-- End Portfolio Section -->


  </main><!-- End #main -->
@endsection