<?php
// FILE: tampil_tahap4.php
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'SubclassKaryawan.php';

$sql = "SELECT * FROM tabel_karyawan ORDER BY id_karyawan ASC";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UAS PBO - Tahap 4 (Inheritance)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tahap 4: Implementasi Pewarisan (Inheritance)</h5>
            <span class="badge bg-dark">Faris Sholah Hasan</span>
        </div>
        <div class="card-body">
            <p class="text-muted">Membuktikan properti tambahan pada KaryawanTetap, KaryawanKontrak, dan KaryawanMagang berhasil diwariskan.</p>
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama Karyawan</th>
                        <th>Status</th>
                        <th>Spesifikasi Jabatan (Atribut Kelas Anak)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $result->fetch_assoc()) {
                        $obj = null;
                        if ($row['jenis_karyawan'] == 'Tetap') {
                            $obj = new KaryawanTetap($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
                        } elseif ($row['jenis_karyawan'] == 'Kontrak') {
                            $obj = new KaryawanKontrak($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
                        } elseif ($row['jenis_karyawan'] == 'Magang') {
                            $obj = new KaryawanMagang($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
                        }

                        if ($obj != null) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $obj->getIdKaryawan() . "</td>";
                            echo "<td>" . htmlspecialchars($obj->getNamaKaryawan()) . "</td>";
                            echo "<td class='text-center'><span class='badge bg-primary'>" . $row['jenis_karyawan'] . "</span></td>";
                            echo "<td>" . $obj->tampilkanProfilKaryawan() . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>