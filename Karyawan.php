<?php
// Mendefinisikan Abstract Class Karyawan
abstract class Karyawan {
    
    // =================================================================
    // PROPERTI TERENKAPSULASI (Protected)
    // Hanya bisa diakses oleh class ini sendiri dan class turunannya (anak)
    // =================================================================
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarperhari;

    // =================================================================
    // CONSTRUCTOR
    // Digunakan untuk menginisialisasi data saat objek anak dibuat
    // =================================================================
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarperhari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hariKerjaMasuk;
        $this->gajiDasarperhari = $gajiDasarperhari;
    }

    // =================================================================
    // METODE ABSTRAK (Tanpa Isi / Body)
    // WAJIB diimplementasikan (override) oleh semua class anak
    // =================================================================
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();

    // =================================================================
    // GETTER METHODS (Untuk mengambil nilai properti yang dilindungi)
    // =================================================================
    public function getIdKaryawan() {
        return $this->id_karyawan;
    }

    public function getNamaKaryawan() {
        return $this->nama_karyawan;
    }

    public function getDepartemen() {
        return $this->departemen;
    }

    public function getHariKerjaMasuk() {
        return $this->hariKerjaMasuk;
    }

    public function getGajiDasarperhari() {
        return $this->gajiDasarperhari;
    }
}
?>