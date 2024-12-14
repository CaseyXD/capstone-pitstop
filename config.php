<?php
// Membaca file .env
$env = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$config = [];
foreach ($env as $line) {
    list($key, $value) = explode('=', $line, 2);
    $config[trim($key)] = trim($value);
}

// Mengatur variabel koneksi database
$host = $config['DB_HOST'];
$user = $config['DB_USER'];
$password = $config['DB_PASS'];
$dbname = $config['DB_NAME'];

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>