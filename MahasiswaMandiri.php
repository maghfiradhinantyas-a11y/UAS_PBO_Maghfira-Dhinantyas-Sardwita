<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    protected string $golonganUkt;
    protected string $namaWali;

    public function __construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan, $golonganUkt, $namaWali) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->golonganUkt = $golonganUkt ?? '';
        $this->namaWali = $namaWali ?? '';
    }

    // OVERRIDING METHOD - TAHAP 5
    public function hitungTagihanSemester(): float {
        return (float)$this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Mandiri: " . $this->namaMahasiswa . " (Golongan: " . $this->golonganUkt . ")";
    }

    // =========================================================================
    // PERBAIKAN DI SINI: Hapus kunci 'PDO' agar tidak Fatal Error saat DB mati
    // =========================================================================
    public static function getByJalurMandiri($dbConn = null): array {
        // Jika koneksi database null atau gagal, kembalikan array kosong dengan aman
        if (!$dbConn) {
            return [];
        }
        
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Mandiri'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}