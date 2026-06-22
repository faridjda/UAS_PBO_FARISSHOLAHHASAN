<?php
// Konfigurasi Database
$host     = "localhost";
$username = "root";
$password = ""; 
$database = "DB_UAS_PBO_TI1C_FarisSholahHasan";

// Membuat instansiasi objek koneksi (Pendekatan PBO)
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil atau gagal
if ($koneksi->connect_error) {
    // Jika gagal, hentikan program dan tampilkan error
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Set charset ke UTF-8 untuk menghindari isu pembacaan karakter khusus
$koneksi->set_charset("utf8");

// Catatan: Baris di bawah ini bisa kamu aktifkan (hilangkan tanda //) untuk uji coba awal.
  echo "Koneksi ke database berhasil!";
?>