@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Data Treatment @endslot
  @slot('title') Ubah Data @endslot
  @endcomponent
  <!-- Main content -->
    
  <section class="content ">
    <div class="ml-3 mt-3">
      <div class="card card-warning bg-light">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Treatment</h3>
        </div>
        <form action="{{ route('diskon.update', ['id' => $edit->id]) }}" method="POST" enctype="multipart/form-data"> 
          @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="hidden" name="oldImage" value="{{$edit->gambar}}">
                  @if($edit->gambar)
                    <img src="{{ asset('storage/' . $edit->gambar)}}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                  @else
                    <img class="img-preview img-fluid mb-3 col-sm-3">
                  @endif
                    <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" placeholder="Upload gambar" onchange="previewImage()">
                  @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div> 
                  @enderror
                </div> 
            </div>
            <div class="card-footer">
                <div class="row">
                <div class="col-12">
                    <input type="submit" href="" value="Ubah" class="btn btn-success float-right">
                    <a class="btn btn-secondary float-right" href="/treatment">Cancel</a>
                </div>
                </div>
            </div>
            </div>
        </form>
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