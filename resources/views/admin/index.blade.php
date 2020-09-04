@extends('layouts.layout')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-list fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Setoran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $setor }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-green-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penarikan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $tarik }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    
        <!-- Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Saldo</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $total }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection