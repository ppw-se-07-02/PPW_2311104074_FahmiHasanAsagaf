<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/beranda', function () {
//     return view('beranda');
// })->name('beranda');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');

Route::get('/mahasiswa', function () {
return view('mahasiswa');
});

Route::get('/mahasiswa', function () {
return view('mahasiswa',
[
"mhs1" => "Fahmi Hasan Asagaf",
"mhs2" => "Aufar Bintang",
"mhs3" => "Muhammad Nur Hamada",
"mhs4" => "Hastin Ajeng"
]);
});
