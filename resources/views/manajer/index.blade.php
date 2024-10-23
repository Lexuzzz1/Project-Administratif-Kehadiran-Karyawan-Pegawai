<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Pegawai</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
      white-space: nowrap;
      overflow: hidden;
      transition: all 0.3s;
    }

    .sidebar a:hover {
      background-color: #004080;
      color: white;
    }

    .sidebar.collapsed a span {
      display: none;
    }

    .sidebar-toggler {
      display: flex;
      justify-content: flex-end;
      padding: 10px;
      cursor: pointer;
    }

    .sidebar-toggler:hover {
      background-color: #004080;
    }

    .status-button {
      border-radius: 30px;
      padding: 5px 15px;
    }

    .status-hadir {
      background-color: #007bff;
      color: white;
    }

    .status-telat {
      background-color: #ffcc00;
      color: black;
    }

    .status-absen {
      background-color: #ff4c4c;
      color: white;
    }

    .btn-submit {
      background-color: #0056b3;
      color: white;
    }

    .notes-icon {
      font-size: 1.5rem;
      color: #0056b3;
    }

    .notes-icon:hover {
      color: #003366;
    }

    .grey-text {
      color: #aaa;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div id="sidebar" class="col-auto sidebar p-0">
        <div class="sidebar-toggler" id="toggle-btn">
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
      <div class="col">
        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title">List Pegawai</h5>
            <div class="d-flex justify-content-end">
              <button class="btn btn-light mx-1">Hadir</button>
              <button class="btn btn-light mx-1">Telat</button>
              <button class="btn btn-light mx-1">Absen</button>
              <button class="btn btn-submit mx-3">Submit Kehadiran</button>
            </div>
          </div>
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
                    <button class="btn status-button status-hadir">Hadir</button>
                    <button class="btn status-button status-telat">Telat</button>
                    <button class="btn status-button status-absen">Absen</button>
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
                    <button class="btn status-button status-hadir">Hadir</button>
                    <button class="btn status-button status-telat">Telat</button>
                    <button class="btn status-button status-absen">Absen</button>
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
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Icon Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script>
    document.getElementById('toggle-btn').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
