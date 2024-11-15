@extends('layouts.master')

@section('web-content')
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title">List Pegawai</h5>
        </div>
          <!-- Absen semua -->
          <div class="d-flex justify-content-between">
            <div class="d-flex">
              <div class="m-2">
                <h4>Tandai Semua Pegawai</h4>
              </div>
              <div class="d-flex m-2">
                <button class="btn btn-outline-primary mx-1" onclick="toggleButton('Hadir')">Hadir</button>
                <button class="btn btn-outline-warning mx-1" onclick="toggleButton('Telat')">Telat</button>
                <button class="btn btn-outline-danger mx-1" onclick="toggleButton('Absen')">Absen</button>
              </div>
            </div>
            <div class="m-2">
              <input class="btn btn-primary" type="submit" value="Kirim">
            </div>
          </div>
          <!-- Perhitungan kehadiran -->
          <div class="d-flex justify-content-center m-3">
            <div class="m-1 mt-3">
              <h4>Total</h4>
            </div>
            <div class="d-flex m-3">
              <span class="border border-primary mx-1 p-2 rounded" id="totalHadir">0 Hadir</span>
              <span class="border border-warning mx-1 p-2 rounded" id="totalTelat" >0 Telat</span>
              <span class="border border-danger mx-1 p-2 rounded" id="totalAbsen">0 Absen</span>
            </div>
          </div>
          <!-- Tabel absensi -->
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Catatan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>Nama</strong><br>
                  <span class="grey-text">email@example.com</span>
                </td>
                <td>
                  <input type="radio" class="btn-check" name="attendance1" id="hadir1" value="Hadir" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-primary mx-1" for="hadir1">Hadir</label>
                
                  <input type="radio" class="btn-check" name="attendance1" id="telat1" value="Telat" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-warning mx-1" for="telat1">Telat</label>
                
                  <input type="radio" class="btn-check" name="attendance1" id="absen1" value="Absen" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-danger mx-1" for="absen1">Absen</label>
                </td>
                <td>
                  <i class="bi bi-envelope notes-icon"></i>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Nama</strong><br>
                  <span class="grey-text">email@example.com</span>
                </td>
                <td>
                  <input type="radio" class="btn-check" name="attendance2" id="hadir2" value="Hadir" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-primary mx-1" for="hadir2">Hadir</label>
                
                  <input type="radio" class="btn-check" name="attendance2" id="telat2" value="Telat" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-warning mx-1" for="telat2">Telat</label>
                
                  <input type="radio" class="btn-check" name="attendance2" id="absen2" value="Absen" autocomplete="off" onclick="countTotals()">
                  <label class="btn btn-outline-danger mx-1" for="absen2">Absen</label>
                </td>
                <td>
                  <i class="bi bi-envelope notes-icon"></i>
                </td>
              </tr>
              <!-- Tambahkan baris sesuai dengan kebutuhan -->
            </tbody>
          </table>
        </div>
    </div>
@endsection