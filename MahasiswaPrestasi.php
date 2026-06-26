<?php
// File: MahasiswaPrestasi.php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    protected string $namaInstansiBeasiswa;
    protected float $minimalIpkSyarat;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan, string $namaInstansiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // OVERRIDING METHOD - TAHAP 5
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Prestasi: " . $this->namaMahasiswa . " (Instansi: " . $this->namaInstansiBeasiswa . ")";
    }

    public static function getByJalurPrestasi(PDO $dbConn): array {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Prestasi'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}