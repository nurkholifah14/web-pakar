@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
  @component('components.breadcrumb')
  @slot('li_1') Data Gejala Kulit @endslot
  @slot('title') Tambah Data @endslot
  @endcomponent

  <!-- Main content -->
    
  <section class="content ">
    <div class="ml-3 mt-3">
      <div class="card card-lightblue bg-light">
        <div class="card-header">
          <h3 class="card-title">Tambah Gejala Kulit</h3>
        </div>
        <form action="/gejalakulit" method="POST">
          @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="kode_gejala">Kode Gejala</label>
                  <input type="text" id="kode_gejala" name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror" value="{{ old('kode_gejala', '') }}" placeholder="G04">
                  @error('kode_gejala')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gejala">Nama Gejala</label>
                  <input type="text" id="gejala" name="gejala" class="form-control @error('gejala') is-invalid @enderror" value="{{ old('gejala', '') }}" placeholder="text">
                  @error('gejala')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12">
                  <input type="submit" href="" value="Simpan" class="btn btn-success float-right">
                  <!-- <button class="btn btn-secondary float-right">Cancel</button> -->
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