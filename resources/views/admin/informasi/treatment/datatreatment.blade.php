@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Data Treatment @endslot
  @endcomponent

    <section class="content">
      <div class="card">
        <div class="card-header p-3">
          <a href="/treatment/create" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Tambah</a>
          <div class="card-body table-responsive  p-3">
                <table class="table table-md dtable table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-warning">
                        <th scope="col-md-3">No</th>
                        <th scope="col-md-3">Nama Treatment</th>
                        <th scope="col-md-3">Gambar</th>
                        <th scope="col-md-3">Fungsi</th>
                        <th scope="col-md-3">Harga</th>
                        <th scope="col-md-3">Deskripsi</th>
                        <th scope="col-md-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($treatment as $index => $tr)
                        <tr>
                            <td>{{$index + $treatment->firstItem() }}</td>
                            <td>{{$tr->nama_treatment}}</td>
                            <td><img src="{{asset('storage/' . $tr->gambar)}}" width="100"></td>
                            <td>{!! $tr->fungsi !!}</td>
                            <td>{{$tr->harga}}</td>
                            <td>{{$tr->deskripsi}}</td>
                            <td>
                              <form action="treatment/{{$tr->id}}" method="POST">
                                <a href="{{ route('treatment.edit',$tr->id)}}" class="btn btn-warning btn-sm">
                                  <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $tr->id }}" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
                                  <i class="fa fa-trash"></i> Hapus</button>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{$treatment->links()}}
          </div>
        </div>
      </div>
    </section>
</div>
<script type="text/javascript">
 
  window.deleteConfirm = function (e) {
    e.preventDefault();
    var form = e.target.form;
    swal({
        title: "Apakah anda yakin?",
        text: "Data yang dihapus tidak dapat di kembalikan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
      });
  }
  
</script>
  
@include('sweetalert::alert')


@endsection