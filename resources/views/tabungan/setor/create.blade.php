@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Setoran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('setor.store') }}" id="tambahSetorTarik" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nis">Siswa :</label>
                            <select class="form-control" id="nis" name="nis" required>
                                <option value="">--- Pilih Siswa ---</option>
                                @foreach($siswa as $s)
                                <option value="{{ $s->nis }}">{{ $s->nis ." - " . $s->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="saldo">Saldo Tabungan :</label>
                            <input type="text" name="saldo" class="form-control" id="saldo" value="Rp. " readonly="readonly" />
                        </div>
                        <div class="form-group">
                            <label for="setor">Jumlah Setor :</label>
                            <input type="number" name="setor" class="form-control" id="setor" required />
                        </div>
                        <input type="hidden" name="transaksi" value="S">
                        <input type="hidden" name="petugas" value="{{ Session::get('nama') }}">
                        <button type="submit" name="setorkan" class="btn btn-primary">Setorkan</button>
                        <button type="reset" id="batal" name="batal" class="btn btn-secondary">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection