@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Daftar Kehadiran</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Check In</th>
                <th>Check Out</th> <!-- Kolom Waktu Keluar -->
                <th>Jenis Presensi</th> <!-- Kolom Jenis Presensi -->
                <th>Status</th> <!-- Kolom Status -->
                <th>Approval</th> <!-- Kolom Approval -->
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $item)
                <tr>
                    <td>{{ $item->id_karyawan }}</td> <!-- Ganti 'employee_id' menjadi 'id_karyawan' -->
                    <td>{{ $item->waktu_masuk }}</td> <!-- Ganti 'check_in' menjadi 'waktu_masuk' -->
                    <td>{{ $item->waktu_keluar }}</td> <!-- Kolom Waktu Keluar -->
                    <td>{{ $item->jenis_presensi }}</td> <!-- Kolom Jenis Presensi -->
                    <td>{{ $item->status }}</td> <!-- Kolom Status -->
                    <td>{{ $item->approval }}</td> <!-- Kolom Approval -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tambahkan navigasi paginasi di bawah tabel -->
    <div class="d-flex justify-content-center">
        {{ $absensi->links() }}
    </div>
</div>

@endsection
