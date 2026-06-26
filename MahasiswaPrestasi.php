<?php
// File: MahasiswaPrestasi.php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti tambahan spesifik Prestasi
    protected string $namaInstansiBeasiswa;
    protected float $minimalIpkSyarat;

    // Constructor Kelas Anak
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan, string $namaInstansiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal, $jenisPembiyaan);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // Implementasi Metode Abstrak Tahap 3 (Kembalikan nilai dasar ukt)
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Mahasiswa Prestasi: " . $this->namaMahasiswa . " (Instansi: " . $this->namaInstansiBeasiswa . ")";
    }

    // ==========================================================
    // METHOD QUERY (SELECT-WHERE) - TAHAP 4
    // ==========================================================
    public static function getByJalurPrestasi(PDO $dbConn): array {
        $query = "SELECT * FROM tabel_mahasiswa WHERE jenis_pembiyaan = 'Prestasi'";
        $stmt = $dbConn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}