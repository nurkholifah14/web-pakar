@extends('layout.admin.main')

@section('tittleadmin')@lang('translation.Dashboard - Admin')@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @component('components.breadcrumb')
    @slot('li_1') Home @endslot
    @slot('title') Dashboard @endslot
    @endcomponent
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
        <div class="co ntainer-fluid">
            <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$count_pengguna}}</h3>
                    <p>Data Pengguna</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-user"></i>
                </div>
                <a href="/data-pengguna" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$count_gejala}}</h3>
                    <p>Data Gejala</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-plus-square"></i>
                </div>
                <a href="/gejalakulit" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$count_jeniskulit}}</h3>
                    <p>Data Jenis Kulit</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-copy"></i>
                </div>
                <a href="/jeniskulit" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$count_riwayat}}</h3>
                    <p>Riwayat Diagnosa</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-chart-line"></i>
                </div>
                <a href="/riwayat-diagnosa" class="small-box-footer">selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
        <!-- /.content -->
</div>

@endsection