@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @component('components.breadcrumb')
    @slot('li_1') Data Treatment @endslot
    @slot('title') Tambah Data @endslot
    @endcomponent

    <!-- Main content -->
    
    <section class="content ">
      <div class="ml-3 mt-3">
      <div class="card card-warning bg-light">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Treatment</h3>
        </div>
        <div class="mb-3">
        <form action="/treatment" method="POST" enctype="multipart/form-data"> 
          @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="nama">Nama Treatment</label>
                  <input type="text" id="nama_treatment" name="nama_treatment" class="form-control @error('nama_treatment') is-invalid @enderror" value="{{ old('nama', '') }}" placeholder="Facial">
                  @error('nama_treatment')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gambar" class="form-label">Gambar</label>
                  <img class="img-preview img-fluid mb-3 col-sm-3">
                  <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar', '') }}" placeholder="Upload gambar" onchange="previewImage()">
                  @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="fungsi">Fungsi</label>
                  <input id="fungsi" type="hidden"  name="fungsi" class="form-control @error('fungsi') is-invalid @enderror" value="{{old('fungsi', '')}}" placeholder="" > 
                  <trix-editor input="fungsi"></trix-editor>
                  @error('fungsi')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', '') }}" placeholder="">
                  @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> 
                <div class="form-group">
                  <label for="Deskripsi">Deskripsi</label>
                  <input type="text" id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi', '') }}" placeholder="text">
                  @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
            <div class="row">
              <div class="col-12">
                <input type="submit" style="margin-right: 10px;" value="Simpan" class="btn btn-success float-right">
                <a class="btn btn-secondary float-right" style="margin-right: 10px;" href="/treatment">Cancel</a>
              </div>
            </div>
            </div>
        </form>
      </div>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
    function previewImage(){
      const image = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }

    }
  </script>

@endsection