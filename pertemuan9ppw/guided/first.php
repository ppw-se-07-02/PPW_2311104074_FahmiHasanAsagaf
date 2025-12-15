<?php
// echo "Hello, World!"; 
// echo "<br>";

// echo "\nThis is my first PHP script."; komentar single line
/* echo "\nThis is my first PHP script."; komentar multi line
echo "\nWelcome to PHP programming."; */

//menggabungkan string dengan variabel
/*$nama = "Fariz"; 
$nim = 21; 
$hobi = "Ngoding"; 

echo "Nama: " . $nama; 
echo "<br>";
echo "NIM: " . $nim;
echo "<br>";
echo "Hobi: " . $hobi; */

//konstanta
/*define("NAMA", "Fariz"); 
define("NIM", 21);
define("ASAL", "Tegal");

echo "Nama: " . NAMA;
echo "<br>";
echo "NIM: " . NIM;
echo "<br>";
echo "Asal: " . ASAL; */

//struktur kondisi
// $nilai = 90;

// if ($nilai > 50){
//     echo "Nilai anda adalah " . $nilai . ". Selamat, Anda Lulus!";
// } else {
//     echo "Nilai anda adalah " . $nilai . ". Maaf, Anda Tidak Lulus.";
// }

// $nilai = 60;

// switch ($nilai) {
//     case ($nilai > 50 && $nilai <= 60):
//         echo "Nilai Anda adalah $nilai. Indeks nilai anda C";
//         break;
//     case ($nilai > 60 && $nilai <= 70):
//         echo "Nilai Anda adalah $nilai. Indeks nilai anda BC";
//         break;
//     case ($nilai > 70 && $nilai <= 75):
//         echo "Nilai Anda adalah $nilai. Indeks nilai anda B";
//         break;
//     case ($nilai > 75 && $nilai <= 80):
//         echo "Nilai Anda adalah $nilai. Indeks nilai anda AB";
//         break;
//     case ($nilai > 80 && $nilai <= 100):
//         echo "Nilai Anda adalah $nilai. Indeks nilai anda A";
//         break;
//     default:
//         echo "Nilai Anda adalah $nilai. Maaf, Anda tidak lulus";
//         break;
// }

// echo "Contoh perulangan menggunakan for:";
// echo "<br>";
// for ($i = 1; $i <= 10; $i++) {
//     echo "Perulangan ke-" . $i;
//     echo "<br>";
// }

// echo "Contoh perulangan menggunakan while:";
// echo "<br>";
// $i = 1;
// while ($i <= 20) {
//     echo "Perulangan ke-" . $i;
//     $i += 2;
//     echo "<br>";
// }

// echo "Contoh perulangan menggunakan do...while:";
// echo "<br>";
// $i = 1;
// do {
//     echo "Perulangan ke-" . $i;
//     echo "<br>";
//     $i += 3;
// } while ($i <= 30);

// funcstion untuk mencetak bilangan genap dari 1 sampai 20
// function cetakGenap(){
//     echo "Contoh perulangan menggunakan fungsi untuk mencetak bilangan genap dari 1 sampai 20:";
//     echo "<br>";
//     for ($i = 1; $i <= 20; $i++) {
//         if ($i % 2 == 0) {
//             echo "Bilangan Genap: " . $i;
//             echo "<br>";
//         }
//     }
// }

// $a = 10;
// $b = 20;
// echo "Bilangan genap dari $a sampai $b: ";
// echo "<br>";
// cetakGenap($a, $b);

// function luasSegitiga($alas, $tinggi){
//     $luas = 0.5 * $alas * $tinggi;
//     return $luas;
// }
// $alas = 10;
// $tinggi = 50;
// echo "Luas segitiga dengan alas $alas dan tinggi $tinggi adalah: " . luasSegitiga($alas, $tinggi);

$arrKendaraan = ["Mobil", "Pesawat", "Kereta Api", "Kapal Laut"];
echo $arrKendaraan[0] . "<br>"; //Mobil
echo $arrKendaraan[1] . "<br>"; //Pesawat
echo $arrKendaraan[2] . "<br>"; //Kereta Api
$arrKota = [];
$arrKota[] = "Jakarta";
$arrKota[] = "Medan";
$arrKota[] = "Bandung";
$arrKota[] = "Malang";
$arrKota[] = "Sulawesi";
echo $arrKota[1] . "<br>"; //Medan
echo $arrKota[2] . "<br>"; //Bandung
echo $arrKota[3] . "<br>"; //Malang
echo $arrKota[4] . "<br>"; //Sulawesi

$arrAlamat = [
"Rona" => "Banjarmasin",
"Dhiva" => "Bandung",
"Ilham" => "Medan",
"Oku" => "Hongkong",
];
echo $arrAlamat["Dhiva"] . "<br>"; //Bandung
echo $arrAlamat['Oku'] . "<br>"; //Hongkong
$arrNim = [];
$arrNim["Rona"] = "11011112";
$arrNim["Dhiva"] = "11011101";
$arrNim["Ilham"] = "11011309";
$arrNim["Oku"] = "11014765";
$arrNim["Fadhlan"] = "11011113";
echo $arrNim["Ilham"] . "<br>"; //11011309
echo $arrNim['Fadhlan'] . "<br>"; //11011113
?>