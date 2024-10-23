<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
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
            background-color: #003366;
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

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            display: block;
            width: fit-content;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary:hover {
            background-color: aliceblue;
            color: #004080;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>Nama Perusahaan</h3>
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
        Edit Karyawan
    </div>

    <div class="form-container">
        <form method="post" action="{{ route('karyawan.update', $karyawan->id) }}">
            @csrf
            
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" required>

            <label>Departemen:</label>
            <input type="text" name="departemen" value="{{ $karyawan->departemen }}" required>

            <label>Jabatan:</label>
            <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}" required>

            <label>Golongan:</label>
            <input type="text" name="golongan" value="{{ $karyawan->golongan }}" required>

            <label>Alamat:</label>
            <input type="text" name="alamat" value="{{ $karyawan->alamat }}" required>

            <label>No HP:</label>
            <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}" required>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

</body>
</html>
