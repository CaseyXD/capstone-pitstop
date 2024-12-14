<?php
session_start(); // Memulai session

// Cek jika pengguna belum login atau bukan role bengkel/admin
if (!isset($_SESSION['username']) || !in_array($_SESSION['role'], ['bengkel', 'admin'])) {
    header("Location: login.php");
    exit();
}

// Menghubungkan file koneksi database
require_once 'config.php';
require_once 'process_booking.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil permintaan booking dari database
$sql = "SELECT * FROM bookings WHERE status = 'pending' AND bengkel_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['bengkel_id']); // Asumsikan bengkel_id disimpan di session
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);

// Ambil data antrian yang sudah ada
$sqlQueue = "SELECT * FROM queue WHERE bengkel_id = ? ORDER BY queue_number ASC";
$stmtQueue = $conn->prepare($sqlQueue);
$stmtQueue->bind_param("i", $_SESSION['bengkel_id']);
$stmtQueue->execute();
$resultQueue = $stmtQueue->get_result();
$queue = $resultQueue->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bengkel</title>
    <link rel="stylesheet" href="style.css">
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

    <div class="dashboard">
        <h2 class="center-text">Dashboard Bengkel</h2>

        <div class="container">
            <div class="notification">
                <h3>Permintaan Booking</h3>
                <?php if (!empty($bookings)): ?>
                    <ul>
                        <?php foreach ($bookings as $booking): ?>
                            <li>
                                <strong>Nama Pelanggan:</strong> <?= htmlspecialchars($booking['customer_name']) ?><br>
                                <strong>Hari:</strong> <?= htmlspecialchars($booking['booking_date']) ?><br>
                                < strong>Nama Kendaraan:</strong> <?= htmlspecialchars($booking['vehicle_name']) ?><br>
                                <strong>Tipe Kendaraan:</strong> <?= htmlspecialchars($booking['vehicle_type']) ?><br>
                                <strong>Status:</strong> <?= htmlspecialchars($booking['status']) ?><br>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Tidak ada permintaan booking saat ini.</p>
                <?php endif; ?>
            </div>

            <div class="queue">
                <h3>Antrian</h3>
                <?php if (!empty($queue)): ?>
                    <ul>
                        <?php foreach ($queue as $item): ?>
                            <li>
                                <strong>Nomor Antrian:</strong> <?= htmlspecialchars($item['queue_number']) ?><br>
                                <strong>Nama Pelanggan:</strong> <?= htmlspecialchars($item['customer_name']) ?><br>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Tidak ada antrian saat ini.</p>
                <?php endif; ?>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 Bengkel Management System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>