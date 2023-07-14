@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @component('components.breadcrumb')
    @slot('li_1') Informasi Diskon @endslot
    @slot('title') Tambah Informasi @endslot
    @endcomponent

    <!-- Main content -->
    
    <section class="content ">
      <div class="ml-3 mt-3">
      <div class="card card-warning bg-light">
        <div class="card-header">
          <h3 class="card-title">Tambah Informasi Diskon</h3>
        </div>
        <div class="mb-3">
        <form action="{{route('diskon.store')}}" method="POST" enctype="multipart/form-data"> 
          @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="gambar" class="form-label">Gambar</label>
                <img class="img-preview img-fluid mb-3 col-sm-3">
                <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar', '') }}" placeholder="Upload gambar" onchange="previewImage()">
                @error('gambar')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
    <label for="category_id">Kategori</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">- pilih -</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

            <div class="card-footer">
            <div class="row">
              <div class="col-12">
                <input type="submit" href="" value="Simpan" class="btn btn-success float-right">
                <a class="btn btn-secondary float-right" href="diskon">Cancel</a>
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