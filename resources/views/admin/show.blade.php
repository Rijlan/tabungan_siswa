@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">

      <div class="col-md-10">
        <!-- DataTales Example -->
        <div class="card shadow-sm mb-4">
          <div class="card-header">
            <h4>Tabel Admin</h4>
          </div>
          <div class="card-body">
            <p class="mssg text-success">{{ session('mssg') }}</p>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th class="text-center">Action</th>
                      </tr>
                  </thead>

                  <tbody>
                      @foreach($admins as $admin)
                      <tr>
                        <td>{{ $admin->nama }}</td>
                        <td>{{ $admin->level }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">
                          <a href="{{ route('admin.edit', $admin->id) }}">Edit</a> | <a href="#" class="hapusAdmin" data-id="{{ $admin->id }}">Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
            <h4 class="warn text-danger text-center mb-5">{{ session('warn') }}</h4>
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
                <form action="{{ route('admin.create') }}" id="tambahAdmin" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" class="form-control" id="nama" required />
                  </div>
                  <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control" id="email" required />
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" class="form-control" id="password" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password2">Ulangi Password :</label>
                        <input type="password" name="password2" class="form-control" id="password2" required />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level">Level :</label>
                    <select class="form-control" id="level" name="level">
                      <option value="admin">Admin</option>
                      <option value="petugas">Petugas</option>
                    </select>
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