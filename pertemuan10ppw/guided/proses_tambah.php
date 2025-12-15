<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Cek NIM duplicate
    $cek = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim='$nim'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIM sudah terdaftar!'); window.location='form_tambah.php';</script>";
    } else {
        $query = "INSERT INTO mahasiswa (nim, nama, jurusan, email, tanggal_lahir)
                  VALUES ('$nim', '$nama', '$jurusan', '$email', '$tanggal_lahir')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='tampil_data.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data!'); window.location='form_tambah.php';</script>";
        }
    }
}

mysqli_close($conn);
?>