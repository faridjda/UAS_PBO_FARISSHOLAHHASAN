<?php
// FILE: tampil_karyawan.php

// 1. Panggil semua file pendukung yang sudah dibuat
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'SubclassKaryawan.php';

// 2. Ambil data dari tabel_karyawan di MySQL
$sql = "SELECT * FROM tabel_karyawan ORDER BY id_karyawan ASC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS PBO - Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid my-5 px-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Karyawan - Implementasi Polimorfisme & Inheritance</h4>
            <span class="badge bg-primary fw-bold">TI1C - Faris Sholah Hasan</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nama Karyawan</th>
                            <th>Departemen</th>
                            <th>Hari Kerja</th>
                            <th>Gaji / Hari</th>
                            <th>Status</th>
                            <th>Detail Atribut Objek (Anak)</th>
                            <th>Total Gaji Bersih (Polimorfisme)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
                                $karyawanObj = null;
                                $badgeColor = 'secondary';

                                // =============================================================
                                // PROSES POLIMORFISME: Mengubah baris DB menjadi Objek Subclass
                                // =============================================================
                                switch ($row['jenis_karyawan']) {
                                    case 'Tetap':
                                        $karyawanObj = new KaryawanTetap(
                                            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                                            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                                            $row['tunjangan_kesehatan'], $row['opsi_saham_id']
                                        );
                                        $badgeColor = 'success';
                                        break;
                                        
                                    case 'Kontrak':
                                        $karyawanObj = new KaryawanKontrak(
                                            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                                            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                                            $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                                        );
                                        $badgeColor = 'warning text-dark';
                                        break;
                                        
                                    case 'Magang':
                                        $karyawanObj = new KaryawanMagang(
                                            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                                            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                                            $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                                        );
                                        $badgeColor = 'info text-dark';
                                        break;
                                }

                                // =============================================================
                                // MENAMPILKAN DATA MENGGUNAKAN METHOD DARI OBJEK YANG DIBUAT
                                // =============================================================
                                if ($karyawanObj != null) {
                                    echo "<tr>";
                                    echo "<td class='text-center fw-bold'>" . $karyawanObj->getIdKaryawan() . "</td>";
                                    echo "<td>" . htmlspecialchars($karyawanObj->getNamaKaryawan()) . "</td>";
                                    echo "<td class='text-center'>" . htmlspecialchars($karyawanObj->getDepartemen()) . "</td>";
                                    echo "<td class='text-center'>" . $karyawanObj->getHariKerjaMasuk() . " Hari</td>";
                                    echo "<td class='text-end'>Rp " . number_format($karyawanObj->getGajiDasarperhari(), 0, ',', '.') . "</td>";
                                    echo "<td class='text-center'><span class='badge bg-" . $badgeColor . "'>" . $row['jenis_karyawan'] . "</span></td>";
                                    
                                    // Memanggil method cetak profil spesifik milik subclass masing-masing
                                    echo "<td>" . $karyawanObj->tampilkanProfilKaryawan() . "</td>";
                                    
                                    // Memanggil method hitung gaji bersih secara polimorfik (Aturan Tahap 5)
                                    echo "<td class='text-end fw-bold text-success'>Rp " . number_format($karyawanObj->hitungGajiBersih(), 0, ',', '.') . "</td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center text-muted py-4'>Tidak ada data karyawan di database.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-end text-muted small">
            Status: Data berhasil ditarik menggunakan konsep Objek Konkrit (Subclass).
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi database
$koneksi->close();
?>