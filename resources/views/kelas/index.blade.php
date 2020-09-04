@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h4>Tabel Kelas</h4>
                </div>
                <div class="card-body">
                    <p class="mssg text-success">{{ session('mssg') }}</p>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kelas as $k)
                            <tr>
                                <td>{{ $k->kelas }}</td>
                                <td class="text-center">
                                <a href="{{ route('kelas.edit', $k->id) }}">Edit</a> | <a href="#" class="hapusKelas" data-id="{{ $k->id }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                            <form action="{{ route('kelas.create') }}" id="tambahKelas" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kelas">Kelas :</label>
                                    <input type="text" name="kelas" class="form-control" id="kelas" required />
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