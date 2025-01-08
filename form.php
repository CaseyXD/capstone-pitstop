<?php
include 'config.php'; // Koneksi ke database

// Menangkap parameter 'bengkel_id' dari URL jika ada
if (isset($_GET['bengkel_id'])) {
    $bengkel_id = $_GET['bengkel_id'];
}

// Memproses data form saat disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $customer_name = $_POST['nama']; // Nama pelanggan
    $vehicle_name = $_POST['jenisMotor']; // Nama kendaraan
    $vehicle_type = $_POST['tipeService']; // Tipe service
    $phone_number = $_POST['noTelp']; // No. Telepon
    $booking_date = date('Y-m-d'); // Tanggal booking (hari ini)
    $booking_time = date('H:i:s'); // Waktu booking (sekarang)

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO bookings (customer_name, vehicle_name, vehicle_type, booking_date, booking_time, status, bengkel_id) 
            VALUES (?, ?, ?, ?, ?, 'pending', ?)";
    
    // Persiapkan statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Binding parameter untuk query
        $stmt->bind_param("sssssi", $customer_name, $vehicle_name, $vehicle_type, $booking_date, $booking_time, $bengkel_id);
        
        // Eksekusi query
        if ($stmt->execute()) {
            echo "Booking berhasil disimpan untuk Bengkel ID: " . $bengkel_id;
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }
        } else {
            echo "Terjadi kesalahan dalam persiapan query: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section, .data-table {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            background-color: #ffffff;
        }
        .form-section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <!-- Form Booking -->
        <div class="form-section">
            <h5 class="mb-3">Form Booking</h5>
            <form method="POST" action="form.php?bengkel_id=<?= $bengkel_id ?>" id="bookingForm">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="noTelp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="noTelp" name="noTelp" required>
                </div>
                <div class="mb-3">
                    <label for="jenisMotor" class="form-label">Jenis Motor</label>
                    <input type="text" class="form-control" id="jenisMotor" name="jenisMotor" required>
                </div>
                <div class="mb-3">
                    <label for="tipeService" class="form-label">Tipe Service</label>
                    <input type="text" class="form-control" id="tipeService" name="tipeService" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    <script src="scripts/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
