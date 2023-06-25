@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Gejala Kulit') @endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')

  @slot('li_1') Sipakar @endslot
  @slot('title') Data Gejala Kulit @endslot

  @endcomponent
  <section class="content">
    <div class="card">
        <div class="card-header pt-3">
          <a href="/gejalakulit/create"  method="POST" class="btn btn-info bg-lightblue  btn-md"><i class="fa fa-plus"></i> Tambah</a>
          <div class="card-body table-responsive p-3">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-info">
                        <th scope="col">No</th>
                        <th scope="col">Kode Gejala</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($gejalakulit as $index => $gk)
                        <tr>
                            <td>{{$index + $gejalakulit->firstItem() }}</td>
                            <td>{{$gk->kode_gejala}}</td>
                            <td>{{$gk->gejala}}</td>
                            <td>
                              <form action="gejalakulit/{{$gk->id}}" method="POST">
                                <a href="{{ route('gejalakulit.edit',$gk->id)}}" class="btn btn-warning btn-sm">
                                  <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $gk->id }}" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
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
          {{$gejalakulit->links()}}
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