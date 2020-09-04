@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card pb-4">
                <div class="card-header">
                    <h4>Edit Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.update') }}" id="editKelas" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $kelas->id }}">
                        <div class="form-group">
                            <label for="kelas">Kelas :</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $kelas->kelas }}" required />
                        </div>
                        <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection