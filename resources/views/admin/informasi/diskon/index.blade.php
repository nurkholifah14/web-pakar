@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Data Diskon @endslot
  @endcomponent

    <section class="content">
      <div class="card">
        <div class="card-header p-3">
          <a href="{{ route('diskon.create') }}" class="btn btn-info bg-lightblue  btn-md"><i class="fa fa-plus"></i> Tambah</a>
          <div class="card-body table-responsive  p-3">
                <table class="table table-md dtable table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-info">
                        <th scope="col-md-3">No</th>
                        <th scope="col-md-3">Diskon</th>
                        <!-- <th scope="col-md-3">Kategori</th> -->
                        <th scope="col-md-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($diskon as $index => $diskons)
                        <tr>
                            <td>{{$index + $diskon->firstItem() }}</td>
                            <td><img src="{{asset('storage/' . $diskons->gambar)}}" width="100"></td>
                            <td>
                              <form action="{{ route('diskon.destroy', $diskons->id) }}" method="POST">
                                <a href="{{ route('diskon.edit',$diskons->id)}}" class="btn btn-warning btn-sm">
                                  <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $diskons->id }}" class="btn btn-danger btn-sm" onclick="deleteConfirm(event)">
                                  <i class="fa fa-trash"></i> Hapus</button>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{$diskon->links()}}
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