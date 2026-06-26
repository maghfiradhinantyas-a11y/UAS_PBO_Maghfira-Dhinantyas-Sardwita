<?php
// File: koneksi.php

class Database {
    private string $host = "127.0.0.1"; 
    private string $username = "root";     
    private string $password = "";         
    
    // PERBAIKAN UTAMA: Menggunakan SPASI sesuai dengan struktur SQL asli Anda!
    private string $dbName = "db_uas_pbo_trpl1a_maghfira dhinantyas sardwita"; 
    
    protected ?PDO $conn = null;

    public function getConnection(): ?PDO {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $exception) {
            die("
                <div style='padding: 20px; background-color: #fee2e2; color: #ef4444; border: 1px solid #fca5a5; border-radius: 8px; margin: 20px; font-family: sans-serif;'>
                    <h3 style='margin-top: 0;'>❌ Koneksi Database Gagal Terhubung!</h3>
                    <p><strong>Pesan Error MySQL:</strong> " . htmlspecialchars($exception->getMessage()) . "</p>
                </div>
            ");
        }
    }
}