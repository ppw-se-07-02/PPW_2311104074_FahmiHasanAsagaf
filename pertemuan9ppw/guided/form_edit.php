<?php
include "koneksi.php";

$nim = $_GET['nim'];
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='tampil_data.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 40px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        input, select { width: 100%; padding: 8px; }
        button { padding: 10px 15px; border: none; color: white; cursor: pointer; }
        .btn-update { background: #2196F3; }
        .btn-cancel { background: #999; }
    </style>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST" action="proses_edit.php">

    <div class="form-group">
        <label>NIM</label>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly>
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
    </div>

    <div class="form-group">
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="Teknik Informatika" <?php if($data['jurusan']=="Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
            <option value="Sistem Informasi" <?php if($data['jurusan']=="Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
            <option value="Teknologi Informasi" <?php if($data['jurusan']=="Teknologi Informasi") echo "selected"; ?>>Teknologi Informasi</option>
            <option value="Ilmu Komputer" <?php if($data['jurusan']=="Ilmu Komputer") echo "selected"; ?>>Ilmu Komputer</option>
        </select>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>">
    </div>

    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
    </div>

    <button type="submit" class="btn-update">Update</button>
    <a href="tampil_data.php"><button type="button" class="btn-cancel">Batal</button></a>

</form>

</body>
</html>