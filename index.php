<?php
// Memanggil semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'Mahasiswa.php';
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$dbConn = $database->getConnection();

// 2. Ambil data secara dinamis menggunakan method SELECT-WHERE dari masing-masing subclass
$dataMandiri = MahasiswaMandiri::getByJalurMandiri($dbConn);
$dataBidikmisi = MahasiswaBidikmisi::getByJalurBidikmisi($dbConn);
$dataPrestasi = MahasiswaPrestasi::getByJalurPrestasi($dbConn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pembiayaan Kuliah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
            
            /* Warna Aksen Cerah untuk Kategori */
            --primary-mandiri: #3b82f6;     /* Biru Cerah */
            --primary-bidikmisi: #f59e0b;  /* Amber/Oranye Cerah */
            --primary-prestasi: #10b981;   /* Hijau Cerah */
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 40px;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        header p {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* Pembungkus Grid untuk Kelompok Kategori */
        .category-section {
            margin-bottom: 50px;
        }

        /* Polimorfisme Judul Kategori */
        .category-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-mandiri { color: var(--primary-mandiri); border-color: #dbeafe; }
        .title-bidikmisi { color: var(--primary-bidikmisi); border-color: #fef3c7; }
        .title-prestasi { color: var(--primary-prestasi); border-color: #d1fae5; }

        /* Desain Grid untuk Kartu Mahasiswa */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 20px;
        }

        /* Desain Kartu UI/UX Cerah */
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
        }

        /* Indikator Atas Kartu */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }
        .card-mandiri::before { background-color: var(--primary-mandiri); }
        .card-bidikmisi::before { background-color: var(--primary-bidikmisi); }
        .card-prestasi::before { background-color: var(--primary-prestasi); }

        .card-header {
            margin-bottom: 16px;
        }

        .card-header h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .card-header p {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .card-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            font-size: 0.875rem;
            border-top: 1px dashed var(--border-color);
            padding-top: 16px;
            margin-bottom: 16px;
        }

        .info-label {
            color: var(--text-muted);
            font-weight: 500;
        }

        .info-value {
            color: var(--text-main);
            font-weight: 600;
            text-align: right;
        }

        /* Bagian Spesifikasi Akademik Khusus Turunan Objek */
        .spec-box {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 12px;
            font-size: 0.85rem;
            border: 1px solid var(--border-color);
        }

        .spec-box-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 700;
            margin-bottom: 6px;
        }

        /* Bagian Tagihan */
        .tagihan-box {
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tagihan-label {
            font-size: 0.875rem;
            font-weight: 500;
        }

        .tagihan-value {
            font-size: 1.1rem;
            font-weight: 700;
        }
        .text-mandiri { color: var(--primary-mandiri); }
        .text-bidikmisi { color: var(--primary-bidikmisi); }
        .text-prestasi { color: var(--primary-prestasi); }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Daftar Registrasi Pembiayaan Kuliah</h1>
        <p>Data Mahasiswa Berdasarkan Polimorfisme dan Skema Pembiayaan Kampus</p>
    </header>

    <section class="category-section">
        <h2 class="category-title title-mandiri">🔵 Jalur Mandiri (<?= count($dataMandiri) ?> Mahasiswa)</h2>
        <div class="cards-grid">
            <?php foreach ($dataMandiri as $row): 
                // Instansiasi Objek Konkrit MahasiswaMandiri (OOP)
                $mhs = new MahasiswaMandiri(
                    $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                    $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiyaan'],
                    $row['golongan_ukt'], $row['nama_wali']
                );
            ?>
                <div class="card card-mandiri">
                    <div class="card-header">
                        <h3><?= htmlspecialchars($mhs->getNamaMahasiswa()) ?></h3>
                        <p>NIM: <?= htmlspecialchars($mhs->getNim()) ?></p>
                    </div>
                    <div class="card-body">
                        <span class="info-label">Semester:</span>
                        <span class="info-value"><?= $mhs->getSemester() ?></span>
                        <span class="info-label">UKT Dasar:</span>
                        <span class="info-value">Rp <?= number_format($mhs->getTarifUktNominal(), 0, ',', '.') ?></span>
                    </div>
                    <div class="spec-box">
                        <div class="spec-box-title">Spesifikasi Akademik & Wali</div>
                        <p><strong>Golongan UKT:</strong> <?= htmlspecialchars($row['golongan_ukt']) ?></p>
                        <p><strong>Nama Wali:</strong> <?= htmlspecialchars($row['nama_wali']) ?></p>
                    </div>
                    <div class="tagihan-box">
                        <span class="tagihan-label">Total Tagihan (+Biaya Ops):</span>
                        <span class="tagihan-value text-mandiri">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.') ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="category-section">
        <h2 class="category-title title-bidikmisi">🟡 Jalur Bidikmisi / KIP-K (<?= count($dataBidikmisi) ?> Mahasiswa)</h2>
        <div class="cards-grid">
            <?php foreach ($dataBidikmisi as $row): 
                // Instansiasi Objek Konkrit MahasiswaBidikmisi (OOP)
                $mhs = new MahasiswaBidikmisi(
                    $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                    $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiyaan'],
                    $row['nomor_kip_kuliah'], $row['dana_saku_subsidi']
                );
            ?>
                <div class="card card-bidikmisi">
                    <div class="card-header">
                        <h3><?= htmlspecialchars($mhs->getNamaMahasiswa()) ?></h3>
                        <p>NIM: <?= htmlspecialchars($mhs->getNim()) ?></p>
                    </div>
                    <div class="card-body">
                        <span class="info-label">Semester:</span>
                        <span class="info-value"><?= $mhs->getSemester() ?></span>
                        <span class="info-label">UKT Kampus:</span>
                        <span class="info-value">Rp <?= number_format($mhs->getTarifUktNominal(), 0, ',', '.') ?></span>
                    </div>
                    <div class="spec-box">
                        <div class="spec-box-title">Spesifikasi Subsidi Negara</div>
                        <p><strong>No KIP Kuliah:</strong> <?= htmlspecialchars($row['nomor_kip_kuliah']) ?></p>
                        <p><strong>Subsidi Saku:</strong> Rp <?= number_format($row['dana_saku_subsidi'], 0, ',', '.') ?>/Bln</p>
                    </div>
                    <div class="tagihan-box">
                        <span class="tagihan-label">Total Tagihan (Subsidi):</span>
                        <span class="tagihan-value text-bidikmisi">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.') ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="category-section">
        <h2 class="category-title title-prestasi">🟢 Jalur Prestasi (<?= count($dataPrestasi) ?> Mahasiswa)</h2>
        <div class="cards-grid">
            <?php foreach ($dataPrestasi as $row): 
                // Instansiasi Objek Konkrit MahasiswaPrestasi (OOP)
                $mhs = new MahasiswaPrestasi(
                    $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                    $row['semester'], $row['tarif_ukt_nominal'], $row['jenis_pembiyaan'],
                    $row['nama_instansi_beasiswa'], $row['minimal_ipk_syarat']
                );
            ?>
                <div class="card card-prestasi">
                    <div class="card-header">
                        <h3><?= htmlspecialchars($mhs->getNamaMahasiswa()) ?></h3>
                        <p>NIM: <?= htmlspecialchars($mhs->getNim()) ?></p>
                    </div>
                    <div class="card-body">
                        <span class="info-label">Semester:</span>
                        <span class="info-value"><?= $mhs->getSemester() ?></span>
                        <span class="info-label">UKT Normal:</span>
                        <span class="info-value">Rp <?= number_format($mhs->getTarifUktNominal(), 0, ',', '.') ?></span>
                    </div>
                    <div class="spec-box">
                        <div class="spec-box-title">Spesifikasi Beasiswa</div>
                        <p><strong>Instansi:</strong> <?= htmlspecialchars($row['nama_instansi_beasiswa']) ?></p>
                        <p><strong>Syarat Min IPK:</strong> <?= htmlspecialchars($row['minimal_ipk_syarat']) ?></p>
                    </div>
                    <div class="tagihan-box">
                        <span class="tagihan-label">Total Tagihan (Diskon 75%):</span>
                        <span class="tagihan-value text-prestasi">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.') ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

</body>
</html>