@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Penarikan</h4>
                </div>
                <div class="card-body">
                    <p class="mssg text-success">{{ session('mssg') }}</p>
                    <div class="col-lg-4 alert alert-danger">
                        <p class="lead pt-2">Total Penarikan : Rp. {{  number_format($jumlah) }}</p>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('tarik.create') }}"><button class="btn btn-success" type="button"><i class="fas fa-plus"></i> Tambah</button></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jumlah Penarikan</th>
                                <th>Petugas</th>
                                <th class="text-center">Aksi</th>
                            </thead>
                            @foreach($tabungan as $tarik)
                            <tbody>
                                <td> {{ $tarik->nis }} </td>
                                <td> {{ $tarik->siswa->nama_siswa }} </td>
                                <td> {{ $tarik->tanggal }} </td>
                                <td> Rp. {{ number_format($tarik->tarik) }} </td>
                                <td> {{ $tarik->petugas }} </td>
                                <td class="text-center">
                                <a href="#" class="hapusTarik" data-id="{{ $tarik->id }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <p class="text-primary text-right m-1">
                        Jumlah Total : {{ $tabungan->total() }}
                    </p>
                    <div class="d-flex justify-content-center mt-5">
                        {{ $tabungan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection