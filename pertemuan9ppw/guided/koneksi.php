<?php
// File: koneksi.php
// Membuat koneksi ke database MySQL

$host = "localhost";
$username = "root";
$password = "";
$database = "akademik";

$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Charset agar dukung karakter UTF-8
mysqli_set_charset($conn, "utf8");
?>