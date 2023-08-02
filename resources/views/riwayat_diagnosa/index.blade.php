@extends('layout.admin.main')

@section('tittleadmin') @lang('Riwayat Diagnosa') @endsection

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Riwayat Diagnosa @endslot
  @endcomponent
    
  <section class="content">
    <div class="card">
      <div class="card-header">
          <div class="card-body table-responsive p-3">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-warning">
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Tanggal Konsultasi</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($riwayat as $index => $r) 
                        <tr>
                            <td>{{$index + $riwayat->firstItem() }}</td>
                            <td>{{$r->nama}}</td>
                            <td>{{$r->alamat}}</td>
                            <td>{{$r->telp}}</td>
                            <td>{{$r->created_at->format('d-m-Y')}}</td>
                            <td>
                              <form action="/riwayat-diagnosa/{{$r->id}}" method="POST">
                                <a href="{{ url('/hasil/'.$r->id) }}"  class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Detail</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
                                <i class="fa fa-trash"></i> Hapus</button>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{$riwayat->links()}}
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