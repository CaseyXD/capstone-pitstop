<?php
session_start(); // Memulai session

// Menghubungkan file koneksi database
include 'config.php'; // Pastikan ini ada di bagian atas

// Cek jika pengguna sudah login, redirect ke halaman sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'bengkel') {
        header("Location: bengkel_dashboard.php");
        exit();
    } elseif ($_SESSION['role'] === 'pengguna') {
        header("Location: customer_dashboard.php");
        exit();
    }
}

$error = ''; // Inisialisasi variabel error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil username dan password dari form
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password'])); // Hash password menggunakan MD5

    // Query untuk cek username dan password
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username']; // Simpan username di session
            $_SESSION['role'] = $user['role']; // Simpan role di session

            // Redirect berdasarkan role
            if ($user['role'] === 'bengkel') {
                header("Location: bengkel_dashboard.php");
            } elseif ($user['role'] === 'pengguna') {
                header("Location: customer_dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Terjadi kesalahan pada sistem. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        </div>
    </div>

    <h2 class="center-text">Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="" class="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p class="center-text">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>
