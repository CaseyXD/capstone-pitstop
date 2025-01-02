<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        .profile-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #e9ecef;
            margin: 0 auto;
        }
        .service-box {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: #ffffff;
        }
        .data-table {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="profile-section">
                    <div class="profile-logo"></div>
                    <h5 class="mt-3">Profile Bengkel</h5>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Service Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="service-box">
                            <h6>Service 1</h6>
                            <button class="btn btn-primary btn-sm mt-2">Edit Service</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <h6>Service 2</h6>
                            <button class="btn btn-primary btn-sm mt-2">Edit Service</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <h6>Service 3</h6>
                            <button class="btn btn-primary btn-sm mt-2">Edit Service</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <h6>Service 4</h6>
                            <button class="btn btn-primary btn-sm mt-2">Edit Service</button>
                        </div>
                    </div>
                </div>

                <!-- Data Section -->
                <div class="data-table">
                    <h6 class="mb-3">Hasil Input User</h6>
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
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>081234567890</td>
                                <td>Motor A</td>
                                <td>Service B</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Terima</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>082112345678</td>
                                <td>Motor C</td>
                                <td>Service D</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Terima</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
