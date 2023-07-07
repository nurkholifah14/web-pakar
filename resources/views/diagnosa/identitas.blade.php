@extends('layout.user.main')

@section('tittle') @lang('Identitas') @endsection

@section('container')

<section class="row main">
  <div class="col-lg-6 offset-lg-3 main-content">
    <div class="card">
      <div class="card-body">
          <div class="alert alert-info alert-dismissible text-center" role="alert">
            <strong><h4><b>DATA IDENTITAS</b></h4></strong>
          </div>        
          <!-- form start -->
          <form id="quickForm" method="POST" action="/diagnosa">
          {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama', '') }}" id="nama" placeholder="Masukan Nama Lengkap" required>
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                <div class="col-sm-9">
                  <input type="umur" name="umur" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur', '') }}" id="umur" placeholder="Masukan Umur" required>
                  @error('umur')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', '') }}" id="alamat" placeholder="Masukan Alamat" required>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="telp" class="col-sm-3 col-form-label">Telp</label>
                <div class="col-sm-9">
                  <input type="telp" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', '') }}" id="telp" placeholder="Masukan Telp" required>
                  @error('telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Konsultasi</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</section>
@endsection