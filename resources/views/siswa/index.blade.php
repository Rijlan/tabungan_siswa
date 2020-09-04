@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-xl-10">
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h4>Tabel Siswa</h4>
                </div>
                <div class="card-body">
                    <p class="mssg text-success">{{ session('mssg') }}</p>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Tahun Masuk</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($siswas as $siswa)
                            <tr>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                <td>
                                    {{ $siswa->kelas->kelas }}
                                </td>
                                <td>{{ $siswa->status }}</td>
                                <td>{{ $siswa->tahun_masuk }}</td>
                                <td class="text-center">
                                <a href="{{ route('siswa.edit', $siswa->nis) }}">Edit</a> | <a class="hapusSiswa" href="#" data-id="{{ $siswa->nis }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-primary text-right m-1">
                        Jumlah Total : {{ $siswas->total() }}
                    </p>
                    <div class="d-flex justify-content-center mt-5">
                        {{ $siswas->links() }}
                    </div>

                    </div>
                </div>
            </div>
            
            <div class="mb-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah</button>
            </div>

            <div id="modalTambah" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('siswa.create') }}" method="POST" id="tambahSiswa">
                                @csrf
                                <div class="form-group">
                                    <label for="nis">NIS :</label>
                                    <input type="number" name="nis" class="form-control" id="nis" required />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input type="text" name="nama_siswa" class="form-control" id="nama" required />
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin :</label>
                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L" checked /> Laki-Laki </label>
                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P" /> Perempuan</label>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas :</label>
                                    <select class="form-control" id="kelas" name="kelas_id" required />
                                    @foreach($kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <select class="form-control" id="status" name="status">
                                    <option value="aktif">Aktif</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="pindah">Pindah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Masuk :</label>
                                    <input type="number" min="1900" max="2099" name="tahun_masuk" class="form-control" id="tahun_masuk" required />
                                </div>
                                <button type="submit" name="tambah" class="btn btn-primary btn-block">Tambah</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection