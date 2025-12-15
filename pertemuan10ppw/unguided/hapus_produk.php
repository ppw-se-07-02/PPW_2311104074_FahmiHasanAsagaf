<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$query = "DELETE FROM produk WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: admin.php?status=hapus_sukses");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>