<?php
// FILE: tampil_tahap6.php
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'SubclassKaryawan.php';

$sql = "SELECT * FROM tabel_karyawan ORDER BY id_karyawan ASC";
$result = $koneksi->query($sql);

$listTetap = []; $listKontrak = []; $listMagang = [];

while($row = $result->fetch_assoc()) {
    if ($row['jenis_karyawan'] == 'Tetap') {
        $listTetap[] = new KaryawanTetap($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
    } elseif ($row['jenis_karyawan'] == 'Kontrak') {
        $listKontrak[] = new KaryawanKontrak($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
    } elseif ($row['jenis_karyawan'] == 'Magang') {
        $listMagang[] = new KaryawanMagang($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UAS PBO - Tahap 6 (View Terkelompok)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <h3 class="mb-4 text-center fw-bold text-dark">Tahap 6: Antarmuka Terkelompok & Dinamis</h3>
    
    <div class="card mb-4 border-success shadow-sm">
        <div class="card-header bg-success text-white fw-bold">1. Kategori Karyawan Tetap</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr><th>Nama</th><th>Departemen</th><th>Atribut Spesifik</th><th>Gaji Bersih</th></tr>
                </thead>
                <tbody>
                    <?php foreach($listTetap as $k): ?>
                        <tr>
                            <td><?= htmlspecialchars($k->getNamaKaryawan()); ?></td>
                            <td><?= $k->getDepartemen(); ?></td>
                            <td><?= $k->tampilkanProfilKaryawan(); ?></td>
                            <td class="text-end fw-bold text-success">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4 border-warning shadow-sm">
        <div class="card-header bg-warning text-dark fw-bold">2. Kategori Karyawan Kontrak</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr><th>Nama</th><th>Departemen</th><th>Atribut Spesifik</th><th>Gaji Bersih</th></tr>
                </thead>
                <tbody>
                    <?php foreach($listKontrak as $k): ?>
                        <tr>
                            <td><?= htmlspecialchars($k->getNamaKaryawan()); ?></td>
                            <td><?= $k->getDepartemen(); ?></td>
                            <td><?= $k->tampilkanProfilKaryawan(); ?></td>
                            <td class="text-end fw-bold text-success">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4 border-info shadow-sm">
        <div class="card-header bg-info text-dark fw-bold">3. Kategori Karyawan Magang</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr><th>Nama</th><th>Departemen</th><th>Atribut Spesifik</th><th>Gaji Bersih</th></tr>
                </thead>
                <tbody>
                    <?php foreach($listMagang as $k): ?>
                        <tr>
                            <td><?= htmlspecialchars($k->getNamaKaryawan()); ?></td>
                            <td><?= $k->getDepartemen(); ?></td>
                            <td><?= $k->tampilkanProfilKaryawan(); ?></td>
                            <td class="text-end fw-bold text-success">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>