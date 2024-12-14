<?php
session_start(); // Memulai session

// Cek jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Pastikan bengkel_id ada di session atau dari parameter URL
if (isset($_GET['bengkel_id'])) {
    $_SESSION['bengkel_id'] = $_GET['bengkel_id']; // Simpan bengkel_id ke session
} elseif (!isset($_SESSION['b engkel_id'])) {
    die("Error: Bengkel ID tidak ditemukan. Pastikan Anda sudah login.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan CSS -->
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo-container">
            <img src="images/logo.png" alt="Logo" class="logo">
        </div>
        <div class="navbar-buttons">
            <button onclick="window.location.href='index.php'">Beranda</button>
            <button onclick="window.location.href='explore.php'">Cari Bengkel</button>
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <h2 class="center-text">Form Booking</h2>
    <form method="POST" action="process_booking.php" class="booking-form">
        <label for="customer_name">Nama Pelanggan:</label>
        <input type="text" id="customer_name" name="customer_name" required>

        <label for="vehicle_name">Nama Kendaraan:</label>
        <input type="text" id="vehicle_name" name="vehicle_name" required>

        <label for="vehicle_type">Tipe Motor:</label>
        <select id="vehicle_type" name="vehicle_type" required>
            <option value="">Pilih Tipe Motor</option>
            <option value="Manual">Manual</option>
            <option value="Matic">Matic</option>
        </select>

        <!-- Input tersembunyi untuk bengkel_id -->
        <input type="hidden" name="bengkel_id" value="<?= htmlspecialchars($_SESSION['bengkel_id']) ?>">

        <!-- Menampilkan bengkel_id untuk debugging -->
        <label for="bengkel_id">Bengkel ID:</label>
        <input type="text" id="bengkel_id" name="bengkel_id_display" value="<?= htmlspecialchars($_SESSION['bengkel_id']) ?>" readonly>

        <button type="submit">Booking</button>
    </form>

    <footer>
        <p>&copy; 2024 Bengkel Management System. All rights reserved.</p>
    </footer>
</body>
</html>