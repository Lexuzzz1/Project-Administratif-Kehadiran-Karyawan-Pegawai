<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Izin Cuti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #003366;
            position: fixed;
            color: white;
        }

        .sidebar h3 {
            margin: 20px;
        }

        .sidebar .nav-link {
            color: white;
            margin: 10px 0;
        }

        .sidebar .nav-link:hover {
            background-color: #004080;
        }

        .sidebar .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .content {
            margin-left: 230px;
            padding: 20px;
        }

        .header-bar {
            background-color: #003366;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: left;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>Nama Perusahaan</h3>
    <nav class="nav flex-column">
        <a href="{{ route('izin_cuti.create') }}" class="nav-link">Pengajuan Izin Cuti</a>
        <a href="{{ route('izin_cuti.index') }}" class="nav-link">Daftar Izin Cuti</a>
    </nav>
    <div class="logout">
        <a href="#" class="nav-link text-center">Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="content">
    <div class="header-bar">
        Daftar Izin Cuti
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Data Table -->
    <table id="izinCutiTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Alasan Izin</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($izinCuti as $izin)
                <tr>
                    <td>{{ $izin->id }}</td>
                    <td>{{ $izin->name }}</td>
                    <td>{{ $izin->department }}</td>
                    <td>{{ $izin->position }}</td>
                    <td>{{ $izin->alasan_izin }}</td>
                    <td>{{ $izin->tanggal_awal }}</td>
                    <td>{{ $izin->tanggal_akhir }}</td>
                    <td>
                        @if ($izin->berkas)
                            <a href="{{ asset('storage/' . $izin->berkas) }}" target="_blank">Lihat Berkas</a>
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('izin_cuti.edit', $izin->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Update
                        </a>
                        <form action="{{ route('izin_cuti.destroy', $izin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#izinCutiTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/Indonesian.json"
            }
        });
    });
</script>
</body>
</html>
