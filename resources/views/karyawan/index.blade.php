<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
        }

        td .button {
            background: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        td .button-danger {
            background-color: #dc3545;
            color: white;
        }

        .text-center {
            text-align: center;
        }

        .btn-primary:hover {
            background-color: aliceblue;
            color: #004080;
        }

        .btn-read:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-read {
            background-color: aliceblue;
            border-color: #007bff;
            color: #007bff;
        }

        .btn-update:hover {
            background-color: #ffc107;
            color: white;
        }

        .btn-update {
            background-color: aliceblue;
            border-color: #ffc107;
            color: #ffc107;
        }

        .btn-delete:hover {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete {
            background-color: aliceblue;
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Nama Perusahaan</h3>
        <nav class="nav flex-column">
            <a href="#" class="nav-link">Karyawan</a>
            <a href="#" class="nav-link">Pengaturan</a>
        </nav>
        <div class="logout">
            <a href="#" class="nav-link text-center">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Header Bar -->
        <div class="header-bar">
            Daftar Karyawan
        </div>

        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

        <table id="employeeTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->departemen }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ $karyawan->golongan }}</td>
                    <td>{{ $karyawan->alamat }}</td>
                    <td>{{ $karyawan->no_hp }}</td>
                    <td class="text-center">
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-update">Update</a>
                        <a href="{{ route('karyawan.delete', $karyawan->id) }}" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#employeeTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "autoWidth": false 
            });
        });
    </script>
</body>
</html>
