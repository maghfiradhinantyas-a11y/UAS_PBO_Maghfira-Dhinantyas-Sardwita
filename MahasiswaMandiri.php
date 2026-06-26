<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik Mandiri
    protected string $golonganUkt;
    protected string $namaWali;

    // Constructor Kelas Anak
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan, string $golonganUkt, string $namaWali) {
        // Memanggil constructor kelas induk (Mahasiswa)
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Implementasi Metode Abstrak Tahap 3 (Kembalikan nilai dasar ukt)
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Mandiri: " . $this->namaMahasiswa . " (Golongan: " . $this->golonganUkt . ")";
    }

    // ==========================================================
    // METHOD QUERY (SELECT-WHERE) - TAHAP 4
    // ==========================================================
    public static function getByJalurMandiri(PDO $dbConn): array {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Mandiri'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}