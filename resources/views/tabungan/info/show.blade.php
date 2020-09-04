@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Info Kas</h4>
                    <p class="text-success small">*Tanggal {{ $start }} s/d {{ $end }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th><i class="fa fa-plus-square"></i> Total Setoran</th>
                                <th><i class="fa fa-minus-square"></i> Total Penarikan</th>
                                <th><i class="fa fa-calculator"></i> Sisa Saldo</th>
                            </thead>
                            <tbody>
                                <td> Rp. {{ number_format($setor) }} </td>
                                <td> Rp. {{ number_format($tarik) }} </td>
                                <td> Rp. {{ number_format($saldo) }} </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection