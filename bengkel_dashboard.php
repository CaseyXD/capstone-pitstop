<?php
session_start();
require_once 'config.php';

// Cek jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Inisialisasi koneksi database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangani aksi Terima/Tolak booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingId = $_POST['booking_id'];
    $action = $_POST['action'];

    if ($action === 'accept') {
        // Terima booking
        $sql = "INSERT INTO queue (customer_name, booking_id, bengkel_id, created_at) 
                SELECT customer_name, id, bengkel_id, NOW() FROM bookings WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();

        $sql = "UPDATE bookings SET status = 'accepted' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
    } elseif ($action === 'reject') {
        // Tolak booking
        $sql = "UPDATE bookings SET status = 'rejected' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
    }
    header("Location: bengkel_dashboard.php");
    exit();
}

// Ambil permintaan booking dari database
$sql = "SELECT * FROM bookings WHERE status = 'pending' AND bengkel_id = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<style>
/* Reset dan Styling Global */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
}

/* Navbar */
.navbar {
    background-color: #2c7ede;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.navbar .logo {
    font-size: 24px;
    font-weight: bold;
}
.navbar .nav-links {
    list-style: none;
    display: flex;
    gap: 15px;
}
.navbar .nav-links li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
}
.navbar .nav-links li a:hover {
    text-decoration: underline;
}

/* Dashboard Layout */
.dashboard {
    display: flex;
    margin: 20px;
    gap: 20px;
}

/* Sidebar */
.sidebar {
    width: 20%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}
.sidebar .profile-picture {
    width: 100px;
    height: 100px;
    background-color: #ddd;
    border-radius: 50%;
    margin: 0 auto 15px;
}
.sidebar h3 {
    font-size: 18px;
    margin-bottom: 5px;
}
.sidebar p {
    font-size: 14px;
    margin-bottom: 15px;
    color: #777;
}
.sidebar .edit-profile {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}
.sidebar .edit-profile:hover {
    background-color: #0056b3;
}

/* Main Content */
.main-content {
    width: 80%;
}
.main-content .content-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}
.main-content .box {
    background-color: #fff;
    padding: 20px;
    flex: 1;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}
.main-content .large-box {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Footer */
.footer {
    text-align: center;
    padding: 15px;
    background-color: #2c7ede;
    color: white;
    margin-top: 20px;
}

/* Booking */
.booking {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
}
.booking h4 {
    font-size: 18px;
    margin-bottom: 5px;
}
.booking p {
    font-size: 14px;
    margin-bottom: 15px;
    color: #777;
}
.booking .btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.booking .btn-success {
    background-color: #2ecc71;
    color: white;
}
.booking .btn-danger {
    background-color: #e74c3c;
    color: white;
}

/* Tabel Queue */
.queue-table {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
}
.queue-table th {
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
.queue-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

</style>

<body>
    <header class="navbar">
        <div class="logo">BengkelKu</div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Pesanan</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>
    </header>

        <?php
        // Ambil data queue dari database
        $sql = "SELECT * FROM queue WHERE bengkel_id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $queues = $result->fetch_all(MYSQLI_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && $_POST['action'] === 'delete') {
                $queue_id = $_POST['queue_id'];
                $sql = "DELETE FROM queue WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $queue_id);
                $stmt->execute();
                header("Location: bengkel_dashboard.php");
                exit();
            }
        }

        ?>

        <div class="row">
            <div class="col-md-6">
                <h2>Booking</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Nama Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Tanggal Booking</th>
                            <th>Waktu Booking</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($bookings): ?>
                            <?php foreach ($bookings as $booking): ?>
                                <tr>
                                    <td><?= htmlspecialchars($booking['customer_name']); ?></td>
                                    <td><?= htmlspecialchars($booking['vehicle_name']); ?></td>
                                    <td><?= htmlspecialchars($booking['vehicle_type']); ?></td>
                                    <td><?= htmlspecialchars($booking['booking_date']); ?></td>
                                    <td><?= htmlspecialchars($booking['booking_time']); ?></td>
                                    <td>
                                        <form method="POST" class="booking-form">
                                            <input type="hidden" name="booking_id" value="<?= $booking['id']; ?>">
                                            <button type="submit" name="action" value="accept" class="btn btn-success">Terima</button>
                                            <button type="submit" name="action" value="reject" class="btn btn-danger">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Tidak ada booking yang menunggu konfirmasi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
    <h2>Queue</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Booking ID</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($queues): ?>
                <?php foreach ($queues as $queue): ?>
                    <tr>
                        <td><?= htmlspecialchars($queue['customer_name']); ?></td>
                        <td><?= htmlspecialchars($queue['booking_id']); ?></td>
                        <td><?= htmlspecialchars($queue['created_at']); ?></td>
                        <td>
                            <form method="POST" class="booking-form">
                                <input type="hidden" name="queue_id" value="<?= $queue['id']; ?>">
                                <button type="submit" name="action" value="delete" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada data queue.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
        </div>

    <!-- <footer class="footer">
        <p>Hak Cipta © 2025 BengkelKu. Semua Hak Dilindungi.</p>
    </footer> -->
</body>
</html>