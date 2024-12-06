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
            <button>Beranda</button>
            <button id="cariBengkelButton">Cari Bengkel</button>
            <button>Antrian</button>
            <button>Panduan pengguna</button>
            <button style="color: #fc4848;" href="">Registrasi</button>
            <!-- <button class="profile-button">👤</button> -->
        </div>
    </div>
    <script src="scripts/script-navbar_animation.js"></script>



    <div class="container">
    <!-- Search Bar -->
    <div class="search-bar">
      <input type="text" placeholder="Cari bengkel...">
      <button>Filter</button>
    </div>

    <!-- Content -->
    <div class="content">
      <!-- Left Filter -->
      <div class="filter">
        <p>Filter Kiri</p>
      </div>

      <!-- Results -->
      <div class="results">
        <div class="result-item">Bengkel 1</div>
        <div class="result-item">Bengkel 2</div>
        <div class="result-item">Bengkel 3</div>
        <div class="result-item">Bengkel 4</div>
        <div class="result-item">Bengkel 5</div>
        <div class="result-item">Bengkel 6</div>
        <div class="result-item">Bengkel 7</div>
        <div class="result-item">Bengkel 8</div>
      </div>

      <!-- Right Filter -->
      <div class="right-filter">
        <p>Filter Kanan</p>
      </div>
    </div>
  </div>

    <script src="scripts/script-navigasi_navbar.js"></script>


</body>