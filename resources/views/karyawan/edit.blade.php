<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
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
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button {
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Edit Karyawan</h1>
</header>

<div class="container">
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

        <button type="submit" class="button">Update</button>
    </form>
    <a href="{{ route('karyawan.index') }}">Kembali</a>
</div>
</body>
</html>
