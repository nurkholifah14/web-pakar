@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Diagnosa') @endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')

  @slot('li_1') Sipakar @endslot
  @slot('title') Data Diagnosa @endslot

  @endcomponent
  
  <section class="content">
    <div class="card">
        <div class="card-header p-3">
            <a href="/data-diagnosa/create"  method="POST" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Tambah</a>
            <div class="card-body table-responsive p-3">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">No</th>
                            <th scope="col">Kode jenis Kulit</th>
                            <th scope="col">Kode Gejala</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach($diagnosa as $index => $diagnoses)
                        <tr>
                            <td>{{$index + $diagnosa->firstItem() }}</td>
                            <td>{{$diagnoses->kode_jeniskulit}}</td>
                            <td>
                                @if ($diagnoses->premis)
                                    {{ $diagnoses->premis->kode_gejala }}
                                @endif
                            </td>
                            <td>
                                <form action="data-diagnosa/{{$diagnoses->id}}" method="POST">
                                    <a href="{{ route('data-diagnosa.edit',$diagnoses->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"  data-id="{{ $diagnoses->id }}" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
                                    <i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            {{$diagnosa->links()}}
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