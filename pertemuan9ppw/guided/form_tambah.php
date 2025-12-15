<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 40px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select { width: 100%; padding: 8px; }
        button { padding: 10px 15px; border: none; background: #4CAF50; color: white; cursor: pointer; }
    </style>
</head>
<body>

<h2>Tambah Data Mahasiswa</h2>

<form method="POST" action="proses_tambah.php">
    <div class="form-group">
        <label>NIM</label>
        <input type="text" name="nim" required maxlength="10">
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" required maxlength="50">
    </div>

    <div class="form-group">
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Ilmu Komputer">Ilmu Komputer</option>
        </select>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" maxlength="50">
    </div>

    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir">
    </div>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="tampil_data.php">Lihat Data</a>

</body>
</html>