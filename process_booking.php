<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking_id = $_POST['booking_id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        // Update status booking menjadi accepted
        $sql = "UPDATE bookings SET status = 'accepted' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();

        // Ambil nama pelanggan dari booking
        $sqlBooking = "SELECT customer_name FROM bookings WHERE id = ?";
        $stmtBooking = $conn->prepare($sqlBooking);
        $stmtBooking->bind_param("i", $booking_id);
        $stmtBooking->execute();
        $resultBooking = $stmtBooking->get_result();
        $booking = $resultBooking->fetch_assoc();
        $customer_name = $booking['customer_name'];

        // Tambahkan ke antrian
        $sqlQueue = "INSERT INTO queue (queue_number, customer_name, booking_id, bengkel_id) VALUES (?, ?, ?, ?)";
        $stmtQueue = $conn->prepare($sqlQueue);

        // Hitung nomor antrian berdasarkan jumlah antrian yang ada
        $sqlCount = "SELECT COUNT(*) as count FROM queue WHERE bengkel_id = ?";
        $stmtCount = $conn->prepare($sqlCount);
        $stmtCount->bind_param("i", $_SESSION['bengkel_id']);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result();
        $count = $resultCount->fetch_assoc()['count'];

        $queue_number = $count + 1; // Nomor antrian baru

        $stmtQueue->bind_param("isii", $queue_number, $customer_name, $booking_id, $_SESSION['bengkel_id']);
        $stmtQueue->execute();
    } elseif ($action == 'reject') {
        // Update status booking menjadi rejected
        $sql = "UPDATE bookings SET status = 'rejected' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
    }

    header("Location: dashboard.php");
    exit();
}