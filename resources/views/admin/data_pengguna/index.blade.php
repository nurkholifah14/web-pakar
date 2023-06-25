@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Pengguna') @endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Data pengguna @endslot
  @endcomponent
    
  <section class="content">
    <div class="card">
      <div class="card-header">
          <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-info">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($users as $index => $pengguna)
                        <tr>
                            <td>{{$index + $users->firstItem() }}</td>
                            <td>{{$pengguna->name}}</td>
                            <td>{{$pengguna->email}}</td>
                            <td>{{$pengguna->role}}</td>
                            <td>
                              <form action="data-pengguna/{{$pengguna->id}}" method="POST">
                                <a href="{{ route('data-pengguna.edit',$pengguna->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $pengguna->id }}" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
                                <i class="fa fa-trash"></i> Hapus</button>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{$users->links()}}
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