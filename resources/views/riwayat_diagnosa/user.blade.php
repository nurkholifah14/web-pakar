@extends('layout.user.main')

<!-- @section('tittle') @lang('Informasi - jenis Kulit') @endsection -->

@section('container')

<section>
    <div class="container pt-5 mb-5">
        <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-5 col-xxl-8">
            <!-- Project Card 2-->
            <div class="card overflow-hidden shadow rounded-4 border-0">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-info">
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
                            <td>{{$no}}</td>
                            <td>{{$r->nama}}</td>
                            <td>{{$r->alamat}}</td>
                            <td>{{$r->telp}}</td>
                            <td>{{$r->tanggal_konsultasi}}</td>
                            <td>
                              <form>
                                <a href="" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Detail</a>
                                <a href="" class="btn btn-info btn-sm">
                                <i class="fa fa-print"></i> cetak</a>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>





@endsection