<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    protected string $golonganUkt;
    protected string $namaWali;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan, string $golonganUkt, string $namaWali) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // OVERRIDING METHOD - TAHAP 5
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Mandiri: " . $this->namaMahasiswa . " (Golongan: " . $this->golonganUkt . ")";
    }

    public static function getByJalurMandiri(PDO $dbConn): array {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Mandiri'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}