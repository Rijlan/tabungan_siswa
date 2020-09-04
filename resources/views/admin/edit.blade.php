@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card pb-4">
                <div class="card-header">
                    <h4>Edit Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update') }}" id="editAdmin" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $admin->id }}" />
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $admin->nama }}" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $admin->email }}" required />
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
                        <option value="admin" {!! $admin->level == 'admin' ? 'selected' : null !!}>Admin</option>
                        <option value="petugas" {!! $admin->level == 'petugas' ? 'selected' : null !!}>Petugas</option>
                        </select>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary btn-block">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection