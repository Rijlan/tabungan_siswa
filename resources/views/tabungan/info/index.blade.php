@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Info Kas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('info.show') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start-date">Tanggal Mulai</label>
                                    <input class="form-control" type="date" name="start-date" id="start-date" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end-date">Tanggal Selesai</label>
                                    <input class="form-control" type="date" name="end-date" id="end-date" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block m-3">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection