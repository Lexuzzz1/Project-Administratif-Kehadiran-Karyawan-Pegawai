<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            background-color: #dc3545;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: left;
            font-size: 18px;
            font-weight: bold;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .buttonHapus{
            background-color: #dc3545;
            color: white;
        }

        .buttonHapus:hover{
            background-color: white;
            border-color: #dc3545;
            color: #dc3545;
        }

        .buttonCancel{
            background-color: #0d6efc;
            color: white;
        }
        .buttonCancel:hover{
            background-color: white;
            color: #0d6efc;
            border-color: #0d6efc;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>VINUNIVERSITY</h3>
    <nav class="nav flex-column">
        <a href="{{ route('karyawan.index') }}" class="nav-link">Karyawan</a>
        <a href="#" class="nav-link">Pengaturan</a>
    </nav>
    <div class="logout">
        <a href="#" class="nav-link text-center">Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="content">
    <div class="header-bar">
        Hapus Karyawan
    </div>

    <div class="form-container">
        <h2>Apakah Anda yakin ingin menghapus karyawan berikut?</h2>
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>Departemen:</strong> {{ $karyawan->departemen }}</p>
        <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
        <p><strong>Golongan:</strong> {{ $karyawan->golongan }}</p>
        <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
        <p><strong>No HP:</strong> {{ $karyawan->no_hp }}</p>

        <form method="post" action="{{ route('karyawan.delete', $karyawan->id) }}">
            @csrf
            <button type="submit" class="btn buttonHapus">Hapus</button>
            <a href="{{ route('karyawan.index') }}" class="btn buttonCancel">Batal</a>
        </form>
    </div>
</div>

</body>
</html>
