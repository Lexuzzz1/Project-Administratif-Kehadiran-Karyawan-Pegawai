@extends('layouts.master')

@section('web-content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h1>Tambah Departemen</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ implode('', $errors->all(':message')) }}
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="{{ route('departemen.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama_departemen">Nama Departemen:</label>
                        <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('departemen.index') }}" class="btn btn-secondary ml-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
