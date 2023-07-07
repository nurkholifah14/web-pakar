@extends('layout.user.main')

<!-- @section('tittle') @lang('Informasi - jenis Kulit') @endsection -->

@section('container')

<section>
    <div class="container pt-5 mb-5">
        <div class="row gx-5 justify-content-center">
            @if ($riwayat == null)
                <div class="analisa-null">
                    <h5>HASIL REKOMENDASI TIDAK DITEMUKAN</h5>
                    <button class="btn-start" id="btn-start" data-href="/identitas">Konsultasi Sekarang <i class="far fa-arrow-right"></i></button>
                </div>
            @else
                @if ($riwayat->hasil_diagnosa == 'failed')
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
                                                                <div class="field-box-content">
                                                                    <div class="alert alert-info alert-dismissible" role="alert">
                                                                        <center>
                                                                            <strong>HASIL DIAGNOSA </strong>
                                                                        </center>
                                                                    </div>
                                                                    <br>
                                                                    <table class="table" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="35%">NO. DIAGNOSA</th>
                                                                                <th width="2%">:</th>
                                                                                <td width="87%">{{ $riwayat->id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>NAMA LENGKAP</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->nama }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>UMUR</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->umur }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>NO. HP</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->telp }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>ALAMAT</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->alamat }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>TANGGAL KONSULTASI</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->created_at->format('d-m-Y') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>HASIL</th>
                                                                                <th>:</th>
                                                                                <td><p>Berdasarkan gejala yang <b>{{ $riwayat->nama }}</b> rasakan, Jenis kulit tidak ditemukan <b>( {{ $riwayat->hasil_diagnosa }} )</b>.</p> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>REKOMENDASI TREATMENT</th>
                                                                                <th>:</th>
                                                                                <td><p>{!! $riwayat->rekomendasi_treatment !!}</p></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="q-and-a">
                                                                        <hr>
                                                                        <span>PERTANYAAN DAN JAWABAN</span>
                                                                        <hr>
                                                                    </div>
                                                                    @php
                                                                        $no = 1;
                                                                    @endphp
                                                                    @foreach ($riwayat->hasil as $p)
                                                                        <h5 class="field-subtitle">{{ $no }}. {{ $p->gejala }}</h5>
                                                                        <div class="answers">
                                                                            @if ($p->jawaban == 1)
                                                                                <div class="answer active">
                                                                                    Ya <i class="far fa-thumbs-up"></i>
                                                                                </div>
                                                                            @else
                                                                                <div class="answer">
                                                                                    Ya <i class="far fa-thumbs-up"></i>
                                                                                </div>
                                                                            @endif
                                                    
                                                                            @if ($p->jawaban == 0)
                                                                                <div class="answer active">
                                                                                    Tidak <i class="far fa-thumbs-down"></i>
                                                                                </div>
                                                                            @else   
                                                                                <div class="answer">
                                                                                    Tidak <i class="far fa-thumbs-down"></i>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if (count($riwayat->hasil) != $no)
                                                                            <hr class="q-and-a-hr">
                                                                        @endif
                                                                            
                                                                        @php
                                                                            $no++;
                                                                        @endphp
                                                                    @endforeach
                                                                    <div class="col-md-12">
                                                                        <hr><br>
                                                                    </div>
                                                                    <div class="major-recomendation pb-3">
                                                                        <form method="POST" action="/diagnosa" id="form-repeat">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="id" value="{{ $riwayat->id }}">
                                                                        </form>
                                                                        <button type="button" class="btn btn-primary btn-lg " id="repeat-analisa"> Ulangi Analisa   <i class="far fa-redo"></i></button>
                                                                        <button type="button" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i>  Konsultasi </button>
                                                                    </div>
                                                                </div>
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
                @else
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
                                                                <div class="field-box-content">
                                                                    <div class="alert alert-info alert-dismissible" role="alert">
                                                                        <center>
                                                                            <strong>HASIL DIAGNOSA </strong>
                                                                        </center>
                                                                    </div>
                                                                    <br>
                                                                    <table class="table" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="35%">NO. DIAGNOSA</th>
                                                                                <th width="2%">:</th>
                                                                                <td width="87%">{{ $riwayat->id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>NAMA LENGKAP</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->nama }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>UMUR</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->umur }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>NO. HP</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->telp }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>ALAMAT</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->alamat }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>TANGGAL KONSULTASI</th>
                                                                                <th>:</th>
                                                                                <td>{{ $riwayat->created_at->format('d-m-Y') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>HASIL</th>
                                                                                <th>:</th>
                                                                                <td><p>Berdasarkan gejala yang <b>{{ $riwayat->nama }}</b> rasakan, Jenis kulit yang dimiliki <b>Jenis {{ $riwayat->hasil_diagnosa }}</b>.</p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>REKOMENDASI TREATMENT</th>
                                                                                <th>:</th>
                                                                                <td><p>{!! $riwayat->rekomendasi_treatment !!}</p></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="q-and-a">
                                                                        <hr>
                                                                        <span>PERTANYAAN DAN JAWABAN</span>
                                                                        <hr>
                                                                    </div>
                                                                    @php
                                                                        $no = 1;
                                                                    @endphp
                                                                    @foreach ($riwayat->hasil as $p)
                                                                        <h5 class="field-subtitle">{{ $no }}. {{ $p->gejala }}</h5>
                                                                        <div class="answers">
                                                                            @if ($p->jawaban == 1)
                                                                                <div class="answer active">
                                                                                    Ya <i class="far fa-thumbs-up"></i>
                                                                                </div>
                                                                            @else
                                                                                <div class="answer">
                                                                                    Ya <i class="far fa-thumbs-up"></i>
                                                                                </div>
                                                                            @endif
                                                    
                                                                            @if ($p->jawaban == 0)
                                                                                <div class="answer active">
                                                                                    Tidak <i class="far fa-thumbs-down"></i>
                                                                                </div>
                                                                            @else   
                                                                                <div class="answer">
                                                                                    Tidak <i class="far fa-thumbs-down"></i>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if (count($riwayat->hasil) != $no)
                                                                            <hr class="q-and-a-hr">
                                                                        @endif        
                                                                    @php
                                                                        $no++;
                                                                    @endphp
                                                                    @endforeach
                                                                    <div class="col-md-12">
                                                                        <hr><br>
                                                                    </div>
                                                                    <div class="major-recomendation pb-3">
                                                                        <div class="d-grid gap-2 d-lg-block">
                                                                            <button type="button" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i> Konsultasi </button>
                                                                            <a href="{{ url('/hasil_pdf/'.$riwayat['id']) }}" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Cetak Hasil Diagnosa </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                @endif
            @endif
        </div>
    </div>
</section>
                            
@endsection
@if ($riwayat == null)
    @section('scripts')
        <script>
            $('#btn-start').on('click', function(){
                window.location = $(this).data('href');
            })
        </script>
    @endsection
@endif