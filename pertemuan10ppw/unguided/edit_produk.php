<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $query = "UPDATE produk SET 
              nama_produk = '$nama',
              harga = '$harga',
              stok = '$stok',
              kategori = '$kategori',
              deskripsi = '$deskripsi'
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php?status=edit_sukses");
        exit;
    } else {
        $error = "Gagal mengupdate produk: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Produk</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" 
                                       value="<?= $produk['nama_produk'] ?>" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control" 
                                           value="<?= $produk['harga'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" 
                                           value="<?= $produk['stok'] ?>" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="Elektronik" <?= $produk['kategori'] == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                                    <option value="Pakaian" <?= $produk['kategori'] == 'Pakaian' ? 'selected' : '' ?>>Pakaian</option>
                                    <option value="Makanan" <?= $produk['kategori'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                    <option value="Minuman" <?= $produk['kategori'] == 'Minuman' ? 'selected' : '' ?>>Minuman</option>
                                    <option value="Alat Tulis" <?= $produk['kategori'] == 'Alat Tulis' ? 'selected' : '' ?>>Alat Tulis</option>
                                    <option value="Lainnya" <?= $produk['kategori'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4"><?= $produk['deskripsi'] ?></textarea>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="admin.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save me-1"></i>Update Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>