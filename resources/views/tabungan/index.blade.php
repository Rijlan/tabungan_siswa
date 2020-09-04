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
                    <form action="{{ route('tabungan.show') }}" method="POST">
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
                        <button type="submit" name="lihat" class="btn btn-primary">Lihat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection