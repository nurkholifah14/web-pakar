@extends('layout.user.main')

@section('tittle') @lang('Diagnosa') @endsection

@section('container')

<section>
    <div class="container pt-5 mb-5">
        <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-5 col-xxl-8">
            <!-- Project Card 2-->
            <div class="card overflow-hidden shadow rounded-4 border-0">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <center>
                                <strong><h4>Konsultasi</h4></strong>
                            </center>
                        </div>
                        <div class="card text-center">
                            <div class="card-header">
                            Jawablah pertanyaan berikut sesuai dengan gejala yang Anda rasakan
                            </div>
                            <div class="card-body">
                            
                                <h5 class="field-subtitle">PERTANYAAN</h5>
                                <h2 class="field-title" id="question">{{ $no }}. {{ $gejala->gejala}}</h2>
                                <div class="loading-outline">
                                    <div class="loading-progress"></div>
                                </div>
                                <input type="hidden" id="idAnalisa" value="{{ $id }}">
                                <input type="hidden" id="no" value="{{ $no }}">
                                <input type="hidden" id="premis" value="{{ $gejala->id }}">
                                <div clsss="row">
                                    <button class="btn-answer" data-answer="1">Ya <i class="far fa-thumbs-up"></i></button>
                                    <button class="btn-answer" data-answer="0">Tidak <i class="far fa-thumbs-down"></i></button>
                                </div>
                                <!-- <button class="btn-answer bg-secondary" >Back<i class="far fa-back"></i></button>     -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>



  @endsection



