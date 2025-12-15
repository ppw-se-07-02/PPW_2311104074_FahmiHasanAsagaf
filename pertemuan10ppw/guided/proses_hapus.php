<?php
include "koneksi.php";

$nim = $_GET['nim'];

$query = "DELETE FROM mahasiswa WHERE nim='$nim'";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='tampil_data.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='tampil_data.php';</script>";
}

mysqli_close($conn);
?>