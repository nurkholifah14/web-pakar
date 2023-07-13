@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Data Jenis Kulit @endslot
  @slot('title') Ubah Data @endslot
  @endcomponent

    <!-- Main content -->
    
    <section class="content ">
      <div class="ml-0 mt-3">
      <div class="card card-lightblue bg-light">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Jenis Kulit</h3>
        </div>
        <form action="/jeniskulit/{{$edit->id}}" method="POST">
          @csrf
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                  <label for="kode_jenis">Kode Jenis</label>
                  <input type="text" id="kode_jenis" name="kode_jenis" class="form-control @error('kode_jenis') is-invalid @enderror" value="{{$edit->kode_jenis}}" placeholder="Jk04">
                  @error('kode_jenis')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" name="nama_jeniskulit" class="form-control @error('nama') is-invalid @enderror" value="{{$edit->nama_jeniskulit}}" placeholder="kulit normal">
                  @error('nama_jeniskulit')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="rekomendasi_treatment">Rekomendasi Treatment</label>
                  <input id="rekomendasi_treatment" type="hidden"  name="rekomendasi_treatment" class="form-control @error('rekomendasi_treatment') is-invalid @enderror"  placeholder="" > 
                  <trix-editor input="rekomendasi_treatment"> {!! $edit->rekomendasi_treatment !!}</trix-editor>
                  @error('rekomendasi_treatment')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
            <div class="row">
              <div class="col-12">
                <input type="submit" value="Ubah" class="btn btn-success float-right">
                <a class="btn btn-secondary float-right" href="/jeniskulit">Cancel</a>
              </div>
            </div>
            </div>
        </form>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


@endsection