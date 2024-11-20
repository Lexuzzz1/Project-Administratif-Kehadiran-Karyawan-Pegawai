@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Scan QR untuk Presensi</h1>

    @if (auth()->check() && auth()->user()->karyawan)
        <div class="alert alert-info">
            <p>Silakan scan QR code di bawah ini untuk melakukan presensi.</p>
        </div>

        <div class="text-center">
            <img src="{{ asset('images/qr_code.png') }}" alt="QR Code" class="img-fluid" width="300">
            <!-- Ganti 'images/qr_code.png' dengan lokasi QR code yang sesuai -->
        </div>

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_karyawan" value="{{ auth()->user()->karyawan->karyawan_id }}">
            <button type="submit" class="btn btn-success mt-3">Presensi</button>
        </form>
    @else
        <div class="alert alert-danger">
            <p>Data karyawan tidak ditemukan. Pastikan Anda sudah terdaftar sebagai karyawan.</p>
        </div>
    @endif

</div>
@endsection
