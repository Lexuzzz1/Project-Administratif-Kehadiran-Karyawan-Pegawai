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
                <svg class="progress-ring" viewBox="0 0 100 100" width="200" height="200">
                  <!-- Background Circle -->
                  <circle cx="50" cy="50" r="45" fill="transparent" stroke="#e9ecef" stroke-width="10"></circle>
                  <!-- Absen Section -->
                  <circle class="absen-ring" cx="50" cy="50" r="45" fill="transparent" stroke="#dc3545" stroke-width="10" stroke-dasharray="0 283"></circle>
                  <!-- Telat Section -->
                  <circle class="telat-ring" cx="50" cy="50" r="45" fill="transparent" stroke="#ffc107" stroke-width="10" stroke-dasharray="0 283"></circle>
                  <!-- Hadir Section -->
                  <circle class="hadir-ring" cx="50" cy="50" r="45" fill="transparent" stroke="#28a745" stroke-width="10" stroke-dasharray="0 283"></circle>
                </svg>
                <h5 class="mt-2">100 Employees Total</h5>
              </div>
              <!-- Kehadiran Ringkasan -->
              <div class="m-4 mt-5">
                <div class="d-flex align-items-center">
                  <i class="bi bi-circle-fill text-danger"></i>
                  <span class="ms-2" id="absenCount">0 Absen</span>
                </div>
                <div class="d-flex align-items-center">
                  <i class="bi bi-circle-fill text-warning"></i>
                  <span class="ms-2" id="telatCount">0 Terlambat</span>
                </div>
                <div class="d-flex align-items-center">
                  <i class="bi bi-circle-fill text-success"></i>
                  <span class="ms-2" id="hadirCount">0 Hadir</span>
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
                @foreach ($absensis as $absensi)
                  <tr>
                    <td>
                      @if ($absensi->status === 'Hadir')
                          <i class="bi bi-circle-fill text-success"></i>
                      @elseif ($absensi->status === 'Telat')
                          <i class="bi bi-circle-fill text-warning"></i>
                      @else
                          <i class="bi bi-circle-fill text-danger"></i>
                      @endif
                      {{ date('j F', strtotime($absensi->waktu_masuk)) }}
                    </td>
                    <td>{{ date('l', strtotime($absensi->waktu_masuk)) }}</td>
                    <td>{{ $absensi->id_karyawan }}</td>
                    <td>{{ $absensi->status }}</td>
                  </tr>
                @endforeach
                {{-- <tr>
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
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('spc-js')
    <script src="{{ asset('js/searchBar.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // Elemen tabel dan grafik
    const tableBody = document.querySelector("#myTable tbody");
    const totalEmployeesText = document.querySelector(".chart h5");
    const attendancePercentageText = document.querySelector(".text-primary");
    
    // Elemen untuk menampilkan jumlah kehadiran
    const absenCountText = document.querySelector("#absenCount");
    const telatCountText = document.querySelector("#telatCount");
    const hadirCountText = document.querySelector("#hadirCount");

    // SVG Circle Elements
    const absenRing = document.querySelector(".absen-ring");
    const telatRing = document.querySelector(".telat-ring");
    const hadirRing = document.querySelector(".hadir-ring");

    // Variabel untuk menghitung status kehadiran
    let hadirCount = 0;
    let telatCount = 0;
    let absenCount = 0;

    // Menghitung total berdasarkan data tabel
    const rows = tableBody.querySelectorAll("tr");
    rows.forEach((row) => {
        const statusCell = row.cells[3]?.innerText.trim();
        if (statusCell === "Hadir") {
            hadirCount++;
        } else if (statusCell === "Telat") {
            telatCount++;
        } else if (statusCell === "Absen") {
            absenCount++;
        }
    });

    // Hitung total karyawan
    const totalEmployees = hadirCount + telatCount + absenCount;

    // Hitung persentase
    const hadirPercentage = ((hadirCount / totalEmployees) * 100).toFixed(2);
    const telatPercentage = ((telatCount / totalEmployees) * 100).toFixed(2);
    const absenPercentage = ((absenCount / totalEmployees) * 100).toFixed(2);

    // Update Total Employees Text
    totalEmployeesText.textContent = `${totalEmployees} Employees Total`;

    // Update Kehadiran Hari Ini
    attendancePercentageText.textContent = `${hadirPercentage}%`;

    // Total lingkaran (283 adalah keliling lingkaran dengan radius 45)
    const circumference = 2 * Math.PI * 45;

    // Set Dasharray untuk setiap bagian
    const hadirDash = (circumference * hadirPercentage) / 100;
    const telatDash = (circumference * telatPercentage) / 100;
    const absenDash = (circumference * absenPercentage) / 100;

    // Update Jumlah Kehadiran
    absenCountText.textContent = `${absenCount} Absen`;
    telatCountText.textContent = `${telatCount} Terlambat`;
    hadirCountText.textContent = `${hadirCount} Hadir`;

    // Update Grafik
    hadirRing.setAttribute("stroke-dasharray", `${hadirDash} ${circumference - hadirDash}`);
    telatRing.setAttribute("stroke-dasharray", `${telatDash} ${circumference - telatDash}`);
    absenRing.setAttribute("stroke-dasharray", `${absenDash} ${circumference - absenDash}`);

    // Posisi Offset untuk setiap bagian
    hadirRing.setAttribute("stroke-dashoffset", 0);
    telatRing.setAttribute("stroke-dashoffset", -hadirDash); // Mulai setelah hadir
    absenRing.setAttribute("stroke-dashoffset", -(hadirDash + telatDash)); // Mulai setelah hadir + telat
});

    </script>
@endsection
