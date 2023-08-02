@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
  @component('components.breadcrumb')
  @slot('li_1') Data Diagnosa @endslot
  @slot('title') Tambah Data @endslot
  @endcomponent

  <!-- Main content -->
    
  <section class="content ">
    <div class="ml-3 mt-3">
      <div class="card card-warning bg-light">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Diagnosa</h3>
        </div>
        <form action="/data-diagnosa" method="POST">
          @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="kodejeniskulit">Nama Jenis Kulit</label>
                  <select name="kode_jeniskulit" class="form-control @error('kode_gejala') is-invalid @enderror" value="{{ old('kode_jeniskulit', '') }}" >
                    <option value="">- pilih -</option>
                    @foreach($jeniskulit as $j)
                      <option value="{{$j->kode_jenis}}">{{$j->nama_jeniskulit}}</option>
                    @endforeach
                  </select>
                  @error('kode_jeniskulit')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kodegejala">Nama Gejala</label>
                  <select name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror" value="{{ old('kode_gejala', '') }}" >
                    <option value="">- pilih -</option>
                    @foreach($gejalakulit as $g)
                      <option value="{{$g->id}}">{{$g->gejala}}</option>
                    @endforeach
                  </select>
                  @error('kode_gejala')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12">
                    <button class="btn btn-success float-right" type="submit">Simpan</button>
                    <a class="btn btn-secondary float-right" href="/data-diagnosa">Cancel</a>
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