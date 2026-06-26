<?php
// File: koneksi.php

class Database {
    private string $host = "localhost";
    private string $username = "root";     // Sesuaikan dengan username MySQL Anda
    private string $password = "";         // Sesuaikan dengan password MySQL Anda
    private string $dbName = "DB_UAS_PBO_TRPL1A_MAGHFIRA_DS"; // Sesuaikan dengan Nama Lengkap Anda di Tahap 1
    protected ?PDO $conn = null;

    // Metode untuk membuka koneksi ke database
    public function getConnection(): ?PDO {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Mengatur mode error PDO ke Exception untuk mempermudah debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}