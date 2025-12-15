<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $query = "UPDATE mahasiswa SET
                nama='$nama',
                jurusan='$jurusan',
                email='$email',
                tanggal_lahir='$tanggal_lahir'
              WHERE nim='$nim'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='tampil_data.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!'); window.location='form_edit.php?nim=$nim';</script>";
    }
}

mysqli_close($conn);
?>