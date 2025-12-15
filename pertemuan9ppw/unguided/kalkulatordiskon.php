<?php
echo "=== KALKULATOR DISKON ===<br>";

// Input total belanja
$totalBelanja = 750000;
$diskon = 0;

// Menentukan diskon
if ($totalBelanja >= 1000000) {
    $diskon = 0.30;
} elseif ($totalBelanja >= 500000) {
    $diskon = 0.20;
} elseif ($totalBelanja >= 100000) {
    $diskon = 0.10;
}

// Perhitungan
$jumlahDiskon = $totalBelanja * $diskon;
$totalBayar = $totalBelanja - $jumlahDiskon;

// Output
echo "Total Belanja : Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon        : Rp " . number_format($jumlahDiskon, 0, ',', '.') . "<br>";
echo "Total Bayar   : Rp " . number_format($totalBayar, 0, ',', '.') . "<br><br>";
?>
