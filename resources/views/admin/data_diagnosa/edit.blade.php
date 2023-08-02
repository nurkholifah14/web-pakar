@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @component('components.breadcrumb')
  @slot('li_1') Data Diagnosa @endslot
  @slot('title') Ubah data @endslot
  @endcomponent


    <!-- Main content -->
    
    <section class="content ">
      <div class="ml-3 mt-3">
      <div class="card card-warning bg-light">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Diagnosa</h3>
        </div>
        <form action="/data-diagnosa/{{$edit->id}}" method="POST">
          @csrf
          @method('PUT')
            <div class="card-body">
            <div class="form-group">
                <label for="kodejeniskulit">Nama Jenis Kulit</label>
                <select name="kode_jeniskulit" class="form-control @error('kode_jeniskulit') is-invalid @enderror">
                    <option value="">- pilih -</option>
                    @foreach($jeniskulit as $j)
                        <option value="{{$j->kode_jenis}}" {{ $j->kode_jenis == $edit->kode_jeniskulit ? 'selected' : '' }}>
                            {{$j->nama_jeniskulit}}
                        </option>
                    @endforeach
                </select>
                @error('kode_jeniskulit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="kodegejala">Nama Gejala</label>
              <select name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror">
                  <option value="">- pilih -</option>
                  @foreach($gejalakulit as $g)
                      <option value="{{$g->id}}" {{ $g->id == $edit->id_gejala ? 'selected' : '' }}>
                          {{$g->gejala}}
                      </option>
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
                <input type="submit" value="Ubah" class="btn btn-success float-right">
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