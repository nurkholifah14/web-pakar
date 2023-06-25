@extends('layout.user.main')

@section('tittle') @lang('translation.Contact') @endsection

@section('container')

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-5">
            <h2>Contact</h2>
            <p>Contact Us</p>
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
                    <p>info@example.com<br>contact@example.com</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Jam Buka</h3>
                    <p>
                        Senin     09.00 - 17.00<br>
                        Selasa   09:00 - 17.00<br>
                        Rabu      09:00 - 17.00<br>
                        Kamis    Tutup<br>
                        Jumat    09.00 - 17.00<br>
                        Sabtu     08.00 - 16.00<br>
                        Minggu  08.00 - 17.00<br>
                    </p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="map">
                <iframe
                    src="https://www.bing.com/maps/embed?h=500&w=700&cp=-6.328990585692807~108.31749200820923&lvl=16&typ=d&sty=r&src=SHELL&FORM=MBEDV8"
                    height="500" width="700" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <i class="icon_pin"></i>
                </div>
                </div>
            </div>
            </div>

        </div>

    </div>

</section><!-- End Contact Section -->

@endsection