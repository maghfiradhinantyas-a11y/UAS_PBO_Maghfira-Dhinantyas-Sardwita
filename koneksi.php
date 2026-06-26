<?php
// File: koneksi.php

class Database {
    private string $host = "localhost";
    private string $username = "root";     // Default XAMPP adalah 'root'
    private string $password = "";         // Default XAMPP adalah kosong ''
    private string $dbName = "db_uas_pbo_trpl1a_maghfira_ds"; // Memakai huruf kecil sesuai deteksi MySQL Windows
    protected ?PDO $conn = null;

    // Metode untuk membuka koneksi ke database
    public function getConnection(): ?PDO {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Mengatur mode error PDO ke Exception agar jika ada salah langsung melempar pesan catch
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Mengatur default fetch mode menjadi ASSOC agar rapi
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $this->conn;
        } catch (PDOException $exception) {
            // JIKA GAGAL: Blok ini akan menghentikan program dan memunculkan kotak pesan error yang sangat jelas
            die("
                <div style='padding: 20px; background-color: #fee2e2; color: #ef4444; border: 1px solid #fca5a5; border-radius: 8px; margin: 20px; font-family: sans-serif;'>
                    <h3 style='margin-top: 0; font-size: 1.2rem; font-weight: 700;'>❌ Koneksi Database Gagal Terhubung!</h3>
                    <p style='margin-bottom: 10px; font-size: 0.95rem;'>Sistem PBO mendeteksi kesalahan pada konfigurasi basis data Anda.</p>
                    <div style='background-color: #ffffff; padding: 12px; border-radius: 6px; border-left: 4px solid #ef4444; font-family: monospace; font-size: 0.875rem;'>
                        <strong>Pesan Error MySQL:</strong> " . htmlspecialchars($exception->getMessage()) . "
                    </div>
                    <ul style='margin-top: 15px; padding-left: 20px; font-size: 0.9rem; color: #4b5563;'>
                        <li>Pastikan aplikasi <strong>XAMPP Control Panel</strong> Anda sudah dijalankan (tombol MySQL berwarna hijau/Running).</li>
                        <li>Pastikan Anda sudah membuat database bernama <code style='background:#f3f4f6; padding:2px 4px; border-radius:4px;'>db_uas_pbo_trpl1a_maghfira_ds</code> di dalam <strong>phpMyAdmin</strong>.</li>
                    </ul>
                </div>
            ");
        }
    }
}