@extends('layout.user.main')


@section('container')
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
                                                            <div class="alert alert-info alert-dismissible" role="alert">
                                                                <center>
                                                                    <strong>HASIL DIAGNOSA </strong>
                                                                </center>
                                                            </div>
                                                            <br>
                                                            <style>
                                                            #jarak{
                                                                padding-left:0px;padding-right:0px;vertical-align:top;
                                                            }
                                                            #v_top{
                                                                vertical-align:top;
                                                            }
                                                            </style>

                                                            <table class="table" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="30%" id="v_top">NO. DIAGNOSA</th>
                                                                        <th width="2%" id="jarak">:</th>
                                                                        <td width="87%" id="jarak">{{ $riwayat->id }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">TANGGAL KONSULTASI</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">{{ $riwayat->created_at->format('d-m-Y') }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">NAMA LENGKAP</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">{{ $riwayat->nama }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">UMUR</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">{{ $riwayat->umur }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">NO. HP</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">{{ $riwayat->telp }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">ALAMAT</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">{{ $riwayat->alamat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">HASIL</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">
                                                                        <p style="white-space: pre-wrap;">Berdasarkan gejala yang <b>{{ $riwayat->nama }}</b> rasakan, Jenis kulit yang dimiliki <b>{{ $riwayat->hasil_diagnosa }}</b>.</p>    </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th id="v_top">REKOMENDASI TREATMENT</th>
                                                                        <th id="jarak">:</th>
                                                                        <td id="jarak">
                                                                        <p style="white-space: pre-wrap;">{!! $riwayat->rekomendasi_treatment !!}</p>    </td>
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

@endsection