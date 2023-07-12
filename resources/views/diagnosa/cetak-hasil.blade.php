
<div>
    <section>
        <div class="container pt-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-5 col-xxl-8">
                    <!-- Project Card 2-->
                    <div class="card overflow-hidden shadow rounded-4 border-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="page-content">
                                    <!-- Main content -->
                                    <div class="content-wrapper">
                                        <!-- Content area -->
                                        <div class="content">
                                            <div class="container" style="margin-top:-40px;">
                                                <br></br>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <fieldset class="content-group">
                                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                                                <center>
                                                                    <strong>HASIL DIAGNOSA </strong>
                                                                </center>
                                                            </div>
                                                            <hr class="field-hr">
                                                            <br>
                                                            <table class="table" width="100%">
                                                                <tbody >
                                                                    <tr>
                                                                        <th style="text-align:left">NO. DIAGNOSA</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->id }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">NAMA LENGKAP</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->nama }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">UMUR</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->umur }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">NO. HP</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->telp }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">ALAMAT</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->alamat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">TANGGAL KONSULTASI</th>
                                                                        <th>:</th>
                                                                        <td>{{ $riwayat->created_at->format('d-m-Y') }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left">HASIL</th>
                                                                        <th>:</th>
                                                                        <td><p>Berdasarkan gejala yang <b>{{ $riwayat->nama }}</b> rasakan, Jenis kulit yang dimiliki <b>Jenis {{ $riwayat->hasil_diagnosa }}</b>.</p></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align:left; width: 250px; ">REKOMENDASI TREATMENT</th>
                                                                        <th >:</th>
                                                                        <td style="width: 380px"><p>{!! $riwayat->rekomendasi_treatment !!}</p></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--    /content area -->
                                    </div>
                                    <!-- /main content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
