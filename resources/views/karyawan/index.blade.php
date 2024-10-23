<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: #fff;
        }
        a {
            text-decoration: none;
        }
        .button {
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
            display: inline-block;
        }
        .button-danger {
            background: red;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <h1>Manajemen Karyawan</h1>
</header>

<div class="container">
    <h2>Data Karyawan</h2>
    <a href="{{ route('karyawan.create') }}" class="button">Tambah Karyawan</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="button">Edit</a>
                        <a href="{{ route('karyawan.delete', $karyawan->id) }}" class="button button-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
