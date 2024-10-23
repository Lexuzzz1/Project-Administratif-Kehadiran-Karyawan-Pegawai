<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Kehadiran Tim</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
    }

    .sidebar {
      background-color: #002855;
      color: white;
      min-height: 100vh;
      width: 250px;
      transition: width 0.3s;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #004080;
      color: white;
    }

    .sidebar.collapsed a span {
      display: none;
    }

    .dashboard {
      margin-left: 260px; /* Jarak antara sidebar dan dashboard */
      transition: margin-left 0.3s;
    }

    .sidebar.collapsed + .dashboard {
      margin-left: 90px;
    }

    /* Memperkecil margin ketika sidebar tidak collapse */
    @media (min-width: 768px) {
      .dashboard {
        margin-left: 50px; /* Kurangi jarak dashboard agar tidak terlalu jauh dari sidebar */
      }

      .sidebar.collapsed + .dashboard {
        margin-left: 90px;
      }
    }

    .card-header-custom {
      background-color: #007bff;
      color: white;
    }

    .chart-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
    }

    .chart {
      text-align: center;
    }

    .chart .progress-ring {
      height: 150px;
      width: 150px;
    }

    .attendance-summary {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .status-dot {
      height: 15px;
      width: 15px;
      border-radius: 50%;
    }

    .status-absen {
      background-color: red;
    }

    .status-terlambat {
      background-color: #ffc107;
    }

    .status-hadir {
      background-color: #28a745;
    }
    
    .attendance-table td, .attendance-table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div id="sidebar" class="col-auto sidebar p-0">
        <div class="sidebar-toggler" id="toggle-btn" style="cursor: pointer; padding: 10px;">
          <i class="bi bi-list" style="font-size: 1.5rem; color: white;"></i>
        </div>
        <ul class="nav flex-column px-3">
          <li class="nav-item mb-3">
            <a href="#" class="nav-link"><i class="bi bi-check-circle"></i> <span>Kehadiran</span></a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link"><i class="bi bi-journal-text"></i> <span>Catatan</span></a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link"><i class="bi bi-gear"></i> <span>Pengaturan</span></a>
          </li>
        </ul>
        <a href="#" class="nav-link mt-auto px-3 text-danger"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
      </div>

      <!-- Main Content -->
      <div class="col dashboard p-4">
        <h4>Laporan Kehadiran Tim</h4>
        <div class="card">
          <div class="card-body">
            <div class="chart-container">
              <!-- Chart placeholder -->
              <div class="chart">
                <svg class="progress-ring" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="45" fill="white" stroke="#28a745" stroke-width="10"></circle>
                </svg>
                <h5 class="mt-3">100 Employees Total</h5>
              </div>

              <!-- Kehadiran Ringkasan -->
              <div class="attendance-summary">
                <div>
                  <div class="d-flex align-items-center">
                    <div class="status-dot status-absen"></div>
                    <span class="ms-2">3 Absen</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="status-dot status-terlambat"></div>
                    <span class="ms-2">5 Terlambat</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="status-dot status-hadir"></div>
                    <span class="ms-2">93 Hadir</span>
                  </div>
                </div>
                <div>
                  <h1 class="display-4 text-primary">98%</h1>
                  <p class="text-muted">Kehadiran Hari Ini</p>
                </div>
              </div>
            </div>

            <!-- Attendance Table -->
            <table class="table table-bordered attendance-table mt-4">
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
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggle-btn').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
