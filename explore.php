<?php
session_start(); // Memulai session

// Cek jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Bengkel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo-container">
            <img src="images/logo.png" alt="Logo" class="logo"> <!-- Logo di sini -->
        </div>
        <div class="navbar-buttons">
            <button onclick="window.location.href='index.php'">Beranda</button>
            <button id="cariBengkelButton">Cari Bengkel</button>
            <?php if (isset($_SESSION['username'])): ?>
                <button onclick="window.location.href='logout.php'">Logout</button>
            <?php else: ?>
                <button style="color: #fc4848;" onclick="window.location.href='register.php'">Registrasi</button>
                <button onclick="window.location.href='login.php'">Login</button>
            <?php endif; ?>
        </div>
    </div>
    <script src="scripts/script-navbar_animation.js"></script>



    <!-- Search Bar -->
    <div class="search-bar">
        <form action="explore.php" method="get" style="width: 100%;">
            <input type="text" id="searchInput" name="q" placeholder="Cari bengkel...">
            <button type="submit">Cari</button>
        </form>
    </div>

    <div class="container">

        <!-- Content -->
        <div class="content">

        <!-- Left Filter -->
        <div class="filter-kiri">
            <!-- <h3>Filter Kiri</h3>
            <form action="explore.php" method="get">
                <label for="filter1">Filter 1:</label>
                <select id="filter1" name="filter1">
                    <option value="">Pilih Filter 1</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>

                <label for="filter2">Filter 2:</label>
                <select id="filter2" name="filter2">
                    <option value="">Pilih Filter 2</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>

                <button type="submit">Terapkan Filter</button>
            </form> -->
        </div>

    <!-- Results -->
        <div class="results" id="results">
        <?php
        include 'config.php'; // Menghubungkan file koneksi database

        // Cek apakah ada query pencarian
        if (isset($_GET['q'])) {
            $searchQuery = $_GET['q'];

            // Query untuk mencari data bengkel
            $sql = "SELECT id, nama FROM bengkel WHERE nama LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchQuery = "%" . $searchQuery . "%";
            $stmt->bind_param("s", $searchQuery);

            // Jalankan query
            $stmt->execute();
            $result = $stmt->get_result();

            // Tampilkan hasil pencarian dalam grid
            if ($result->num_rows > 0) {
                echo "<div class='grid-container-pencarian'>";
                while ($row = $result->fetch_assoc()) {
                    // Tambahkan link ke booking.php dengan bengkel_id sebagai parameter
                    echo "<div class='grid-item-pencarian'>";
                    echo "<a href='form.php?bengkel_id=" . htmlspecialchars($row["id"]) . "'>" . htmlspecialchars($row["nama"]) . "</a>";
                    echo "<br><strong>Bengkel ID:</strong> <a href='form.php?bengkel_id=" . htmlspecialchars($row["id"]) . "'>" . htmlspecialchars($row["id"]) . "</a>";
                    echo "</div>";
                    
                }
                echo "</div>";
            } else {
                echo "<p>Tidak ada hasil ditemukan</p>";
            }

            // Tutup koneksi
            $stmt->close();
        } else {
            // Jika tidak ada pencarian, tampilkan semua bengkel
            $sql = "SELECT id, nama FROM bengkel";
            $result = $conn->query($sql);

            // Tampilkan semua bengkel dalam grid
            if ($result->num_rows > 0) {
                echo "<div class='grid-container-pencarian'>";
                while ($row = $result->fetch_assoc()) {
                    // Tambahkan link ke booking.php dengan bengkel_id sebagai parameter
                    echo "<div class='grid-item-pencarian'>";
                    echo "<a href='form.php?bengkel_id=" . htmlspecialchars($row["id"]) . "'>" . htmlspecialchars($row["nama"]) . "</a>";
                    echo "<br><strong>Bengkel ID:</strong> <a href='form.php?bengkel_id=" . htmlspecialchars($row["id"]) . "'>" . htmlspecialchars($row["id"]) . "</a>";
                    echo "</div>";
                    
                }
                echo "</div>";
            } else {
                echo "<p>Tidak ada bengkel tersedia</p>";
            }
        }
        ?>
    </div>

        <!-- Right Filter -->
        <div class="right-filter">
            <!-- <h3>Filter Kanan</h3>
            <form action="explore.php" method="get">
                <label for="filter1">Filter 1:</label>
                <select id="filter1" name="filter1">
                    <option value="">Pilih Filter 1</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>

                <label for="filter2">Filter 2:</label>
                <select id="filter2" name="filter2">
                    <option value="">Pilih Filter 2</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>

                <button type="submit">Terapkan Filter</button>
            </form> -->
        </div>

    <script src="scripts/script-navigasi_navbar.js"></script>
</body>
</html>