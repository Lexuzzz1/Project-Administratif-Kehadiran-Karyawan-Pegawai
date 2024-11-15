@extends('layouts.master')

@section('web-content')

<!-- Main Content -->
<div class="container-fluid">
  <div class="col dashboard p-4">
    <h4>Laporan Kehadiran Tim</h4>
    <div class="card">
      <div class="card-body">
        <!-- Grafik -->
        <div class="d-flex mb-3">
          <div class="chart d-flex">
            <div>
              <svg class="progress-ring" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" fill="white" stroke="#28a745" stroke-width="10"></circle>
              </svg>
              <h5 class="mt-2">100 Employees Total</h5>
            </div>
            <!-- Kehadiran Ringkasan -->
            <div class="m-4 mt-5">
              <div class="d-flex align-items-center">
                <i class="bi bi-circle-fill text-danger"></i>
                <span class="ms-2">2 Absen</span>
              </div>
              <div class="d-flex align-items-center">
                <i class="bi bi-circle-fill text-warning"></i>
                <span class="ms-2">5 Terlambat</span>
              </div>
              <div class="d-flex align-items-center">
                <i class="bi bi-circle-fill text-success"></i>
                <span class="ms-2">93 Hadir</span>
              </div>
            </div>
          </div>
          <!-- Persenan kehadiran -->
          <div class="m-4 ms-5">
            <h1 class="display-2 text-primary">98%</h1>
            <p class="text-muted">Kehadiran Hari Ini</p>
          </div>
        </div>

        <!-- search bar -->
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input id="searchInput" type="text" class="form-control" placeholder="Cari Karyawan">
        </div>
        <!-- Attendance Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover mt-4" id="myTable">
            <thead class="bg-light">
              <tr>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Total Kehadiran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Benedict Wijaya</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-warning"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Joseph Adiwiguna</td>
                <td>Terlambat</td>
                <td>80%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Nathanael Kanaya C.</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Rafael Cavin E.T.</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Bambang Suhendra</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Benedict Wijaya</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-warning"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Joseph Adiwiguna</td>
                <td>Terlambat</td>
                <td>80%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Nathanael Kanaya C.</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Rafael Cavin E.T.</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Bambang Suhendra</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Benedict Wijaya</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-warning"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Joseph Adiwiguna</td>
                <td>Terlambat</td>
                <td>80%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Nathanael Kanaya C.</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Rafael Cavin E.T.</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Bambang Suhendra</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Benedict Wijaya</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-warning"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Joseph Adiwiguna</td>
                <td>Terlambat</td>
                <td>80%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Nathanael Kanaya C.</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Rafael Cavin E.T.</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Bambang Suhendra</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Benedict Wijaya</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-warning"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Joseph Adiwiguna</td>
                <td>Terlambat</td>
                <td>80%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Nathanael Kanaya C.</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-success"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Rafael Cavin E.T.</td>
                <td>Hadir</td>
                <td>100%</td>
              </tr>
              <tr>
                <td><i class="bi bi-circle-fill text-danger"></i> Jun 22</td>
                <td>Kamis</td>
                <td>Bambang Suhendra</td>
                <td>Absen</td>
                <td>0%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


