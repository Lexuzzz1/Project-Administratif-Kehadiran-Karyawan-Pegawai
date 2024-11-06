@extends('layouts.master')

@section('web-content')
<div class="container my-4">
    <h2 class="mb-4">Catatan Kehadiran</h2>

    <!-- Search Bar -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input id="searchInput" type="text" class="form-control" placeholder="Cari Karyawan">
    </div>

    <!-- Attendance Table -->
    <div class="table-responsive">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <table class="table table-bordered text-center align-items-center" id="myTable">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Karyawan</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Jenis Presensi</th>
                    <th>Status</th>
                    <th>Persetujuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensiAll as $absen)
                <tr>
                    <td>{{$absen->absen_id}}</td>
                    <td>{{$absen->id_karyawan}}</td>
                    <td>{{$absen->waktu_masuk}}</td>
                    <td>{{$absen->waktu_keluar}}</td>
                    <td>{{$absen->jenis_presensi}}</td>
                    @if($absen->status == 'hadir')
                        <td class="bg-success">
                            <div class="text-white">
                                <i class="bi bi-check-circle-fill"></i>
                                <p>{{$absen->status}}</p>
                            </div>
                        </td>
                    @elseif($absen->status == 'cuti')
                    <td class="bg-warning">
                        <div class="text-white">
                            <i class="bi bi-alarm-fill"></i>
                            <p>{{$absen->status}}</p>
                        </div>
                    </td>
                    @elseif($absen->status == 'tidak hadir')
                    <td class="bg-danger">
                        <div class="text-white">
                            <i class="bi bi-x-lg"></i>
                            <p>{{$absen->status}}</p>
                        </div>
                    </td>
                    @else
                        <td>{{$absen->status}}</td>
                    @endif
                    @if($absen->approval == 1)
                        <td class="bg-success text-white">Disetujui</td>
                    @elseif($absen->approval == 0)
                        <td class="bg-danger text-white">Tidak Disetujui</td>
                    @else
                        <td>{{$absen->approval}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('spc-js')
@endsection