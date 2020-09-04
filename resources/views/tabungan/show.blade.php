@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabungan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    <h4 class=""><i class="fa fa-fw fa-info"></i> Pemilik</h4>
                                    <hr />
                                    <p id="info-nama">Nama :</p>
                                    <p id="info-nis">NIS :</p>
                                    <p id="info-kelas">Kelas :</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success p-4">
                                <h4><i class="fa fa-fw fa-info mr-2"></i> Tabungan</h4>
                                <hr />
                                <p>Total Setoran : Rp. {{ number_format($setor) }}</p>
                                <p>Total Penarikan : Rp. {{ number_format($tarik) }}</p>
                                <hr>
                                <p class="lead pt-2">Saldo Tabungan : Rp. {{ number_format($saldo) }}</p>
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3 font-weight-bold">Riwayat Transaksi</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th class="text-center">No</th>
                                <th class="display-none">NIS</th>
                                <th class="display-none">Nama</th>
                                <th class="display-none">Kelas</th>
                                <th>Tanggal</th>
                                <th>Setoran</th>
                                <th>Tarikan</th>
                                <th>Petugas</th>
                            </thead>
                            @foreach($tabungan as $key => $t)
                            <tbody>
                                <td class="text-center"> {{ $key+1 }}</td>
                                <td id="nis" class="display-none"> {{ $t->nis }} </td>
                                <td id="nama_siswa" class="display-none"> {{ $t->siswa->nama_siswa }} </td>
                                <td id="kelas" class="display-none"> {{ $t->siswa->kelas->kelas }} </td>
                                <td> {{ $t->tanggal }} </td>
                                <td>Rp. {{ number_format($t->setor) }} </td>
                                <td>Rp. {{ number_format($t->tarik) }} </td>
                                <td> {{ $t->petugas }} </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <p class="text-primary text-right m-1">
                        Jumlah Total : {{ $tabungan->count() }}
                    </p>
                    <a href="{{ route('tabungan.index') }}"><button class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection