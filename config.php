<?php
$host = "localhost"; // Nama host
$user = "root";      // Nama pengguna database
$password = "";      // Password database
$dbname = "pitstop"; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
