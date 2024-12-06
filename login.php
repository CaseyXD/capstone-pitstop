<?php
session_start(); // Memulai session

// Cek jika pengguna sudah login, redirect ke halaman explore
if (isset($_SESSION['username'])) {
    header("Location: explore.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ganti dengan logika autentikasi yang sesuai
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Contoh: Cek username dan password
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username; // Simpan username di session
        header("Location: explore.php"); // Redirect ke halaman explore
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>