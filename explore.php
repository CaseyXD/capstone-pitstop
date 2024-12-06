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
            <button>Antrian</button>
            <button>Panduan pengguna</button>
            <button style="color: #fc4848;" href="">Registrasi</button>
        </div>
    </div>
    <script src="scripts/script-navbar_animation.js"></script>

    <div class="container">
        <!-- Search Bar -->
        <div class="search-bar">
            <form action="explore.php" method="get">
                <input type="text" id="searchInput" name="q" placeholder="Cari bengkel...">
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Content -->
        <div class="content">

        <!-- Left Filter -->
        <div class="filter-kiri">
            <h3>Filter Kiri</h3>
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
            </form>
        </div>

    <!-- Results -->
    <div class="results" id="results">
        <?php
        include 'config.php'; // Menghubungkan file koneksi database

        // Cek apakah ada query pencarian
        if (isset($_GET['q'])) {
            $searchQuery = $_GET['q'];

            // Query untuk mencari data bengkel
            $sql = "SELECT nama FROM bengkel WHERE nama LIKE ?";
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
                    echo "<div class='grid-item-pencarian'>" . htmlspecialchars($row["nama"]) . "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>Tidak ada hasil ditemukan</p>";
            }

            // Tutup koneksi
            $stmt->close();
        } else {
            // Jika tidak ada pencarian, tampilkan semua bengkel
            $sql = "SELECT nama FROM bengkel";
            $result = $conn->query($sql);

            // Tampilkan semua bengkel dalam grid
            if ($result->num_rows > 0) {
                echo "<div class='grid-container-pencarian'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='grid-item-pencarian'>" . htmlspecialchars($row["nama"]) . "</div>";
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
            <h3>Filter Kanan</h3>
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
            </form>
        </div>

    <script src="scripts/script-navigasi_navbar.js"></script>
</body>
</html>