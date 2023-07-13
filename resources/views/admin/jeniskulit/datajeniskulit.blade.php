@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Jenis Kulit') @endsection

@section('content')

<div class="content-wrapper">

<!-- Content Header (Page header) -->
    @component('components.breadcrumb')
    @slot('li_1') Sipakar @endslot
    @slot('title') Data Jenis Kulit @endslot
    @endcomponent

    <section class="content">
        <div class="card">
            <div class="card-header p-3">
                <a href="/jeniskulit/create" method="POST" class="btn btn-warning btn-md"><i class="fa fa-plus"></i> Tambah</a>
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr class="bg-warning">
                                <th scope="col">No</th>
                                <th scope="col">Kode Jenis</th>
                                <th scope="col">Nama Jenis Kulit</th>
                                <th scope="col">Rekomendasi Treatment</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($jeniskulits as $index => $jk)
                                <tr> 
                                    <td>{{$index + $jeniskulits->firstItem() }}</td>
                                    <td>{{ $jk->kode_jenis }}</td>
                                    <td>{{ $jk->nama_jeniskulit }}</td>
                                    <td>{!! $jk->rekomendasi_treatment !!}</td>
                                    <td>
                                    <form action="jeniskulit/{{$jk->id}}" method="POST">
                                        <a href="{{ route('jeniskulit.edit',$jk->id)}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-id="{{ $jk->id}}" class="btn btn-danger btn-sm"  onclick="deleteConfirm(event)">
                                            <i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                {{$jeniskulits->links()}}
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
