@extends('layouts.layout')

@section('content')

<div class="container-fluid background bg-transparent pb-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('mssg'))
            <div class="alert alert-success text-center m-2">
                <p>{{ session('mssg') }}</p>
            </div>
            @endif
            @if(is_null($profile))
            
                <div class="alert alert-danger text-center m-2">
                    <p>Belum ada Profile. <a href="#" data-toggle="modal" data-target="#modalBuat">Buat</a></p>
                </div>
                <div id="modalBuat" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Profile</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('profile.create') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah :</label>
                                        <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat :</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="akreditasi">Akreditasi :</label>
                                        <select class="form-control" id="akreditasi" name="akreditasi">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="TT">TT</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="buat" class="btn btn-primary btn-block">Buat</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
                    
                    <a href="#" data-toggle="modal" data-target="#modalEdit" class="m-1 btn btn-warning btn-circle btn-sm float-right"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#modalHapus" class="m-1 btn btn-danger btn-circle btn-sm float-right"><i class="fa fa-trash"></i></a>
                    
                    <div class="col-md-10 p-lg-5 mx-auto my-5 color-black">
                        <h1 class="display-5 font-weight-normal">{{ $profile->nama_sekolah }}</h1>
                        <p class="lead font-weight-normal">{{ $profile->alamat }}</p>
                        <p>Terakreditasi {{ $profile->akreditasi }}</p>
                    </div>
                </div>

                <div id="modalEdit" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Edit</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah :</label>
                                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="{{ $profile->nama_sekolah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat :</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $profile->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="akreditasi">Akreditasi :</label>
                                        <select class="form-control" id="akreditasi" name="akreditasi">
                                            <option value="A" {{ $profile->akreditasi == 'A' ? 'selected' : null }}>A</option>
                                            <option value="B" {{ $profile->akreditasi == 'B' ? 'selected' : null }}>B</option>
                                            <option value="C" {{ $profile->akreditasi == 'C' ? 'selected' : null }}>C</option>
                                            <option value="TT" {{ $profile->akreditasi == 'TT' ? 'selected' : null }}>TT</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modalHapus" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Hapus</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h5>Anda Yakin Menghapus ?</h5>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <form action="{{ route('profile.destroy', $profile->id) }}"method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>
</div>

@endsection