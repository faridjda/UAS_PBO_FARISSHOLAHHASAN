<?php
// FILE: SubclassKaryawan.php

// Wajib memanggil file induk agar kelas anak bisa mengenali abstract class Karyawan
require_once 'Karyawan.php';

// =================================================================
// 1. SUBCLASS KARYAWAN KONTRAK
// =================================================================
class KaryawanKontrak extends Karyawan {
    // Properti tambahan khusus (enkapsulasi private)
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Constructor untuk menginisialisasi atribut induk dan atribut sendiri
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari, $durasiKontrakBulan, $agensiPenyalur) {
        // Melempar atribut global ke Constructor Class Induk (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Mengimplementasikan (Override) metode hitungGajiBersih
    // Rumus: Hari Kerja x Gaji Dasar
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarperhari;
    }

    // Mengimplementasikan (Override) metode tampilkanProfilKaryawan
    public function tampilkanProfilKaryawan() {
        return "• Durasi Kontrak: " . $this->durasiKontrakBulan . " Bulan<br>" .
               "• Agensi Penyalur: " . $this->agensiPenyalur;
    }
}

// =================================================================
// 2. SUBCLASS KARYAWAN TETAP
// =================================================================
class KaryawanTetap extends Karyawan {
    // Properti tambahan khusus (enkapsulasi private)
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari, $tunjanganKesehatan, $opsiSahamId) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // Mengimplementasikan (Override) metode hitungGajiBersih
    // Rumus: (Hari Kerja x Gaji Dasar) + Tunjangan Kesehatan
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarperhari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        return "• Tunjangan Kesehatan: Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>" .
               "• Opsi Saham ID: " . $this->opsiSahamId;
    }
}

// =================================================================
// 3. SUBCLASS KARYAWAN MAGANG
// =================================================================
class KaryawanMagang extends Karyawan {
    // Properti tambahan khusus (enkapsulasi private)
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Mengimplementasikan (Override) metode hitungGajiBersih
    // Rumus: (Hari Kerja x Gaji Dasar) + Uang Saku Bulanan
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarperhari) + $this->uangSakuBulanan;
    }

    public function tampilkanProfilKaryawan() {
        return "• Uang Saku Bulanan: Rp " . number_format($this->uangSakuBulanan, 0, ',', '.') . "<br>" .
               "• Program: " . $this->sertifikatKampusMerdeka;
    }
}
?>