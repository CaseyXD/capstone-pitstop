<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Banner</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo-container">
            <img src="images/logo.png" alt="Logo" class="logo"> <!-- Logo di sini -->
        </div>
        <div class="navbar-buttons">
            <button>Home</button>
            <button>Tombol 2</button>
            <button>Tombol 3</button>
            <button>Tombol 4</button>
            <button class="profile-button">👤</button>
        </div>
    </div>
    <script src="scripts/script-navbar_animation.js"></script>

    <!-- Hero banner -->
    <section class="hero-banner">
        <div class="text-content">
            <h1>Selamat Datang di Website Kami!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

            </p>
            <a href="#register-banner" class="cta-button">Daftar sekarang</a>
        </div>
        <div class="image-content">
            <img src="images/hero_image.png" alt="Gambar Stock" />
        </div>
    </section>

    <!-- Banner Baru -->
    <section class="new-banner">
        <div class="grid-container">
            <div class="grid-item">
                <img src="images/icon1.png" alt="Icon 1" class="grid-icon">
                <h3>Judul 1</h3>
                <p>Deskripsi singkat tentang fitur atau layanan 1.</p>
            </div>
            <div class="grid-item">
                <img src="images/icon2.png" alt="Icon 2" class="grid-icon">
                <h3>Judul 2</h3>
                <p>Deskripsi singkat tentang fitur atau layanan 2.</p>
            </div>
            <div class="grid-item">
                <img src="images/icon3.png" alt="Icon 3" class="grid-icon">
                <h3>Judul 3</h3>
                <p>Deskripsi singkat tentang fitur atau layanan 3.</p>
            </div>
            <div class="grid-item">
                <img src="images/icon4.png" alt="Icon 4" class="grid-icon">
                <h3>Judul 4</h3>
                <p>Deskripsi singkat tentang fitur atau layanan 4.</p>
            </div>
        </div>
    </section>

    <!-- Hero Banner 2 -->
    <section class="hero-banner-2">
        <div class="image-content">
            <img src="images/hero_image_2.png" alt="Gambar Hero Banner 2" />
        </div>
        <div class="text-content">
            <h1>Selamat Datang di Hero Banner 2!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#register-banner" class="cta-button">Bergabung</a>
        </div>
    </section>

    <!-- Tulisan Pembuka untuk Slider -->
    <div class="slider-header">
        <h2>Lainnya dari Kami</h2>
    </div>

    <!-- Slider Gambar -->
    <div class="slider">
        <div class="slides">
            <div class="slide active">
                <img src="images/slide1.png" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="images/slide2.png" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="images/slide3.png" alt="Slide 3">
            </div>
        </div>
        <div class="navigation">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    <script src="scripts/script-image_slider.js"></script>

</body>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: info@example.com</p>
            <p>Phone: +123 456 7890</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </div>
</footer>

</html>