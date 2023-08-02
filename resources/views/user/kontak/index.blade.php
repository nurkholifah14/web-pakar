@extends('layout.user.main')

@section('tittle') @lang('translation.Kontak') @endsection

@section('container')

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact mt-5">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-5">
            <h2>Kontak</h2>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

            <div class="row gy-4">
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <p>Jl. Veteran No.10, Lemahabang, Kec. Indramayu,  Kabupaten Indramayu, Jawa Barat 45212</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Telp</h3>
                    <p>Telp.089661175255</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>dermashbeau@gmail.com</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Jam Buka</h3>
                    <p>
                        Senin    09.00 - 17.00<br>
                        Selasa   09:00 - 17.00<br>
                        Rabu     09:00 - 17.00<br>
                        Kamis    09:00 - 17.00<br>
                        Jumat    09.00 - 17.00<br>
                        Sabtu    08.00 - 16.00<br>
                        Minggu   Tutup<br>
                    </p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.496771625925!2d108.32022987485564!3d-6.329618693659925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9fb60153b5f%3A0x6abe1e46759f1806!2sDiva%20beautycare!5e0!3m2!1sid!2sid!4v1689524494766!5m2!1sid!2sid" width="610" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <i class="icon_pin"></i>
                                <div class="map-inside">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>

    </div>

</section><!-- End Contact Section -->

@endsection