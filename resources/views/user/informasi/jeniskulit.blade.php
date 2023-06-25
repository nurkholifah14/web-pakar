@extends('layout.user.main')

@section('tittle') @lang('Informasi - jenis Kulit') @endsection

@section('container')

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header mt-5">
          <h2>Informasi</h2>
          <p>Jenis Kulit Wajah </p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <h3>Kulit Normal</h3>
              <img src="user/assets/img/kulit normal.jpg" class="img-fluid" alt="">
              <p>Kulit normal merupakan jenis kulit yang biasanya mudah dirawat.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
            <h3>Kulit Kering</h3>
              <img src="user/assets/img/kulit wajahkering.jpg" class="img-fluid" alt="">
              <p>Kulit kering merupakan jenis kulit yang kekurangan sebum. </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
            <h3>Kulit Berminyak</h3>
              <img src="user/assets/img/kulit wajah berminyak.jpg" class="img-fluid" alt="">
              <p>Kulit berminyak merupakan jenis kulit yang disebabkan oleh kelenjar sebaceous yang sangat aktif pada masa pubertas, ketika distimulasi oleh hormon pria yaitu androgen.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 pt-5" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
            <h3>Kulit Sensitif</h3>
              <img src="user/assets/img/kulit sensitif.jpg" class="img-fluid" alt="">
              <p>Kulit sensitif, adalah kulit wajah yang mudah kering, kemerahan dan menyebabkan iritasi. Pada kulit sensitif, pembuluh darah kapiler dan ujung saraf berada sangat dekat dengan permukaan kulit sehingga sering membuat kulit tamapak kemerahan</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 pt-5" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
            <h3>Kulit Kombinasi</h3>
              <img src="user/assets/img/kulit kombinasi.jpeg" class="img-fluid" alt="">
              <p>Kulit Kombinasi merupakan kombinasi lebih dari satu jenis kulit, seperti kulit kering dan kulit berminyak. Area berminyak biasanya terdapat pada dagu, hidung, dan dahi, yang dikenal dengan T-Zone atau daerah T.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->
@endsection