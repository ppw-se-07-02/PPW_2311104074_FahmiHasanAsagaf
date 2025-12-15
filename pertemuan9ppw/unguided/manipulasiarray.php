<?php
echo "=== MANIPULASI ARRAY ===<br>";

// Array nilai mahasiswa
$nilai = [75, 89, 65, 90, 85, 70, 98, 65, 69, 70, 12];

// Nilai tertinggi & terendah
$nilaiTertinggi = max($nilai);
$nilaiTerendah = min($nilai);

// Rata-rata
$rataRata = array_sum($nilai) / count($nilai);

// Jumlah mahasiswa lulus (>=70)
$lulus = 0;
foreach ($nilai as $n) {
    if ($n >= 70) {
        $lulus++;
    }
}

// Urutkan dari tertinggi ke terendah
rsort($nilai);

// Output
echo "Nilai Tertinggi : $nilaiTertinggi<br>";
echo "Nilai Terendah  : $nilaiTerendah<br>";
echo "Rata-rata Nilai : " . number_format($rataRata, 2) . "<br>";
echo "Jumlah Lulus    : $lulus mahasiswa<br>";
echo "Nilai Urut (Tertinggi ke Terendah):<br>";

foreach ($nilai as $n) {
    echo $n . " ";
}
?>
