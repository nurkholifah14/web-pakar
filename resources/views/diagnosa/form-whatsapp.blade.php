@extends('layout.user.main')

@section('tittle') @lang('Konsultasi') @endsection

@section('container')                
                    
<section>
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6  main-content">
                <div class="card">
                <div class="card-header bg-warning">
                    Form Konsultasi
                </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('send.whatsapp') }}">
                            @csrf
                        
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{ $riwayat->nama}}" name="nama" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="form-group mt-3">
                                <label for="usia">Usia</label>
                                <input type="text" class="form-control" id="usia" value="{{ $riwayat->umur}}" name="usia" placeholder="Masukkan usia Anda">
                            </div>
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="{{ $riwayat->alamat}}" name="alamat" placeholder="Masukkan alamat Anda">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tipe_wajah">Tipe Wajah</label>
                                    <select class="form-select" aria-label="Default select example" id="tipe_wajah" name="tipe_wajah">
                                        <option>{{ $riwayat->hasil_diagnosa}}</option>
                                        <option>-</option>
                                    </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="rekomendasi_treatment">Rekomendasi treatment</label>
                                <textarea class="form-control" id="rekomendasi_treatment" name="rekomendasi_treatment" rows="3" placeholder="Tuliskan rekomendasi treatment yang disarankan"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="keluhan_wajah">Keluhan Wajah</label>
                                <textarea class="form-control" id="keluhan_wajah" name="keluhan_wajah" rows="3" placeholder="Tuliskan keluhan wajah Anda"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="riwayat_cream">Riwayat Pemakaian Cream</label>
                                <textarea class="form-control" id="riwayat_cream" name="riwayat_cream" rows="3" placeholder="Tuliskan riwayat pemakaian cream di wajah Anda"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <a class="btn btn-secondary float-right" href="/riwayat">Cancel</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    
