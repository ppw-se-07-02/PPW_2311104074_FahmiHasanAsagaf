<?php
session_start();
require_once 'config/database.php';

// Cek login (sederhana)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Ambil data produk
$produk = query("SELECT * FROM produk ORDER BY id DESC");

// Proses pencarian
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $produk = query("SELECT * FROM produk WHERE 
        nama_produk LIKE '%$keyword%' OR 
        kategori LIKE '%$keyword%' OR 
        deskripsi LIKE '%$keyword%' 
        ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Administrator</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: calc(100vh - 140px);
            background: #f8f9fa;
        }
        .sidebar .nav-link {
            color: #333;
            padding: 10px 15px;
            margin: 2px 0;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #4CAF50;
            color: white;
        }
        .content {
            padding: 20px;
        }
        .table-actions {
            white-space: nowrap;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-success text-white py-3">
        <div class="container">
            <h4 class="mb-0">Sistem Administrasi Toko</h4>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 sidebar">
                <nav class="nav flex-column p-3">
                    <h5 class="mb-3 text-secondary">Menu Admin</h5>
                    <a class="nav-link" href="#">
                        <i class="fas fa-users me-2"></i>Data User
                    </a>
                    <a class="nav-link active" href="admin.php?page=produk">
                        <i class="fas fa-box me-2"></i>Kelola Produk
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-key me-2"></i>Edit Password
                    </a>
                    <hr>
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="col-md-9 col-lg-10 content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3><i class="fas fa-boxes me-2"></i>Kelola Produk</h3>
                    <a href="tambah_produk.php" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i>Tambah Produk
                    </a>
                </div>

                <!-- Form Pencarian -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" 
                                       placeholder="Cari produk..." 
                                       value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
                                <button class="btn btn-primary" type="submit" name="cari">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <?php if (isset($_GET['cari'])): ?>
                                <a href="admin.php" class="btn btn-secondary">Reset</a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel Produk -->
                <div class="card">
                    <div class="card-body">
                        <?php if (empty($produk)): ?>
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h5>Belum ada produk</h5>
                                <p>Mulai dengan menambahkan produk baru</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($produk as $p): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($p['nama_produk']) ?></strong><br>
                                                <small class="text-muted"><?= substr($p['deskripsi'], 0, 50) ?>...</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary"><?= $p['kategori'] ?></span>
                                            </td>
                                            <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                                            <td>
                                                <?php if ($p['stok'] > 10): ?>
                                                    <span class="badge bg-success"><?= $p['stok'] ?> pcs</span>
                                                <?php elseif ($p['stok'] > 0): ?>
                                                    <span class="badge bg-warning"><?= $p['stok'] ?> pcs</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Habis</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="table-actions">
                                                <a href="edit_produk.php?id=<?= $p['id'] ?>" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="hapus_produk.php?id=<?= $p['id'] ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Hapus produk ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" 
                                                   class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Info -->
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle me-2"></i>
                    Total: <strong><?= count($produk) ?> produk</strong> ditemukan
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Sistem Toko. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Alert untuk operasi CRUD
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'tambah_sukses'): ?>
                alert('Produk berhasil ditambahkan!');
            <?php elseif ($_GET['status'] == 'edit_sukses'): ?>
                alert('Produk berhasil diperbarui!');
            <?php elseif ($_GET['status'] == 'hapus_sukses'): ?>
                alert('Produk berhasil dihapus!');
            <?php endif; ?>
        <?php endif; ?>
    </script>
</body>
</html>