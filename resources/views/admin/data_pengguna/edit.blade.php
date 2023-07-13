@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Data Pengguna @endslot
  @slot('title') Ubah Data @endslot
  @endcomponent
    <!-- Main content -->
    
    <section class="content ">
      <div class="ml-3 mt-3">
      <div class="card card-lightblue bg-light">
        <div class="card-header">
          <h3 class="card-title">Ubah data</h3>
        </div>
        <form action="/data-pengguna/{{$edit->id}}" method="POST">
          @csrf
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$edit->name}}" placeholder="nama">
                  @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Email</label>
                  <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$edit->email}}" placeholder="example@gmail.com">
                  @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
            <div class="row">
              <div class="col-12">
                <input type="submit" value="Ubah" class="btn btn-success float-right">
                <a class="btn btn-secondary float-right" href="/data-pengguna">Cancel</a>
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