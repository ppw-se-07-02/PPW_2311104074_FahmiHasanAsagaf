<?php
include "koneksi.php";
include "proses_cari.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #4CAF50; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .btn { padding: 6px 10px; color: white; border-radius: 3px; text-decoration: none; }
        .btn-edit { background: #2196F3; }
        .btn-delete { background: #f44336; }
        .btn-add { background: #4CAF50; padding: 10px 15px; }
    </style>
</head>
<body>

<h2>Data Mahasiswa</h2>

<a href="form_tambah.php" class="btn btn-add">Tambah Data</a>

<form method="GET" style="margin: 20px 0;">
    <input type="text" name="keyword" placeholder="Cari..." value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '';?>">
    <button type="submit">Cari</button>
</form>

<?php
if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $keyword = $_GET['keyword'];
    $result = cariMahasiswa($conn, $keyword);
    $jumlah = hitungHasilCari($result);
    echo "Ditemukan $jumlah data untuk: <b>$keyword</b>";
} else {
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nim ASC");
    $jumlah = mysqli_num_rows($result);
    echo "Menampilkan $jumlah data mahasiswa";
}
?>

<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Aksi</th>
    </tr>

    <?php
    if ($jumlah > 0) {
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['tanggal_lahir']}</td>
                    <td>
                        <a href='form_edit.php?nim={$row['nim']}' class='btn btn-edit'>Edit</a>
                        <a href='proses_hapus.php?nim={$row['nim']}' class='btn btn-delete' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center;'>Tidak ada data</td></tr>";
    }

    mysqli_close($conn);
    ?>
</table>

</body>
</html>