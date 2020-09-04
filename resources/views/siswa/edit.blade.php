@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8">
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h4>Update Data {{ $siswa[0]->nama_siswa }}</h4>
                </div>
                <div class="card-body">
                    @foreach($siswa as $s)
                    <form action="{{ route('siswa.update') }}" method="POST" id="editSiswa">
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS :</label>
                            <input type="number" name="nis" class="form-control" id="nis" value="{{ $s->nis }}" readonly="readonly" />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama" value="{{ $s->nama_siswa }}" required />
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L" {!! $s->jenis_kelamin == 'L' ? 'checked' : null !!} /> Laki-Laki </label>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P" {!! $s->jenis_kelamin == 'P' ? 'checked' : null !!} /> Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas :</label>
                            <select class="form-control" id="kelas" name="kelas_id">
                            @foreach($kelas as $kelas)
                            <option value="{{ $kelas->id }}" {!! $s->kelas_id == $kelas->id ? 'selected' : null !!}>{{ $kelas->kelas }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select class="form-control" id="status" name="status">
                            <option value="aktif" {!! $s->status == 'aktif' ? 'selected' : null !!}>Aktif</option>
                            <option value="lulus" {!! $s->status == 'lulus' ? 'selected' : null !!}>Lulus</option>
                            <option value="pindah" {!! $s->status == 'pindah' ? 'selected' : null !!}>Pindah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk :</label>
                            <input type="number" min="1900" max="2099" name="tahun_masuk" class="form-control" id="tahun_masuk" value="{{ $s->tahun_masuk }}" required />
                        </div>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                        <button type="reset" name="batal" class="btn btn-secondary">Batal</button>
                    </form>
                    @endforeach
                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection