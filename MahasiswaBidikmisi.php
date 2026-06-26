<?php
// File: MahasiswaBidikmisi.php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti tambahan spesifik Bidikmisi
    protected string $nomorKipKuliah;
    protected float $danaSakuSubsidi;

    // Constructor Kelas Anak
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Implementasi Metode Abstrak Tahap 3 (Kembalikan nilai dasar ukt)
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Bidikmisi: " . $this->namaMahasiswa . " (No KIP: " . $this->nomorKipKuliah . ")";
    }

    // ==========================================================
    // METHOD QUERY (SELECT-WHERE) - TAHAP 4
    // ==========================================================
    public static function getByJalurBidikmisi(PDO $dbConn): array {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Bidikmisi'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}