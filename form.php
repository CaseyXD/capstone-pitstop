<!DOCTYPE html>
<html lang="en">
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
            <form id="bookingForm">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="noTelp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="noTelp" required>
                </div>
                <div class="mb-3">
                    <label for="jenisMotor" class="form-label">Jenis Motor</label>
                    <input type="text" class="form-control" id="jenisMotor" required>
                </div>
                <div class="mb-3">
                    <label for="tipeService" class="form-label">Tipe Service</label>
                    <input type="text" class="form-control" id="tipeService" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Hasil Input User -->
        <div class="data-table">
            <h5 class="mb-3">Hasil Input User</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Jenis Motor</th>
                        <th>Tipe Service</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Data akan ditambahkan di sini secara dinamis -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="scripts/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $noTelp = $_POST['noTelp'];
    $jenisMotor = $_POST['jenisMotor'];
    $tipeService = $_POST['tipeService'];

    // Proses data (misalnya, simpan ke database)
}
?>
