<?php

// File: Mahasiswa.php

abstract class Mahasiswa {
    // Properti terenkapsulasi (protected) sesuai kolom DB
    protected int $idMahasiswa;
    protected string $namaMahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal; // float digunakan untuk menyimpan desimal/nominal uang
    protected string $jenisPembiyaan;

    // Constructor untuk inisialisasi properti global
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $jenisPembiyaan) {
        $this->idMahasiswa = $idMahasiswa;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
        $this->jenisPembiyaan = $jenisPembiyaan;
    }

    // ==========================================
    // METODE ABSTRAK (Tanpa Isi / Body)
    // ==========================================
    
    // Wajib diimplementasikan oleh kelas anak untuk menghitung tagihan
    abstract public function hitungTagihanSemester(): float;

    // Wajib diimplementasikan oleh kelas anak untuk menampilkan info akademik
    abstract public function tampilkanSpesifikasiAkademik(): void;
}