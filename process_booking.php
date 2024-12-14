<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $customer_name = $_POST['customer_name'];
    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_type = $_POST['vehicle_type'];
    $bengkel_id = $_POST['bengkel_id']; // Ambil bengkel_id dari form

    // Insert data booking ke database
    $sql = "INSERT INTO bookings (customer_name, vehicle_name, vehicle_type, status, bengkel_id) VALUES (?, ?, ?, 'pending', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $customer_name, $vehicle_name, $vehicle_type, $bengkel_id);
    
    if ($stmt->execute()) {
        // Simpan data booking ke session untuk ditampilkan di dashboard
        $_SESSION['last_booking'] = [
            'customer_name' => $customer_name,
            'vehicle_name' => $vehicle_name,
            'vehicle_type' => $vehicle_type,
            'bengkel_id' => $bengkel_id,
            'status' => 'pending'
        ];
        
        // Redirect ke dashboard setelah booking berhasil
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat melakukan booking: " . $stmt->error;
    }
}
?>