<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitstop</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<!-- Testing -->
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
            <button style="color: #fc4848;" id="">Registrasi</button>
            <!-- <button class="profile-button">👤</button> -->
        </div>
    </div>
    <script src="scripts/script-navigasi_navbar.js"></script>
    <script src="scripts/script-navbar_animation.js"></script>

    <!-- Hero banner -->
    <section class="hero-banner">
        <div class="text-content">
            <h1>Selamat Datang di Pitstop!</h1>
         <p>Pitstop adalah solusi buat Kamu yang ga mau ribet buat servis kendaraan Kamu. Cukup buka website Pitstop, Kamu bisa cari mekanik pakai gadget Kamu, kapan saja dan dimana saja. Cocok buat kamu yang sayang sama kendaraan Kamu. Cukup booking servis dan hubungi bengkel, Kamu ga perlu susah-susah datang ke lokasi, tinggal antri lalu dilayani.

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
                <h3>1. Cari bengkel</h3>
                <p>Mencari mekanik pilihan dengan melihat profil mereka</p>
            </div>
            <div class="grid-item">
                <img src="images/icon2.png" alt="Icon 2" class="grid-icon">
                <h3>2. Booking</h3>
                <p>Isi formulir singkat untuk booking servis</p>
            </div>
            <div class="grid-item">
                <img src="images/icon3.png" alt="Icon 3" class="grid-icon">
                <h3>3. Antri</h3>
                <p>Jangan lupa antri sesuai nomor ya!</p>
            </div>
            <div class="grid-item">
                <img src="images/icon4.png" alt="Icon 4" class="grid-icon">
                <h3>4. Dilayani</h3>
                <p>Datang langsung ke bengkel pilihan</p>
            </div>
        </div>
    </section>

    <!-- Hero Banner 2 -->
    <section class="hero-banner-2">
        <div class="image-content">
            <img src="images/hero_image_2.png" alt="Gambar Hero Banner 2" />
        </div>
        <div class="text-content">
            <h1>Apa saja benefit Pitstop?</h1>
            <p>
                Mencari bengkel itu ga mudah. Seringkali udah dapat yang bagus, ternyata diporotin. Tenang, dengan Pitstop, Kamu bisa membandingkan mekanik 1 dengan yang lainnya. Lewat fitur profile bengkel dan review pelanggan, Kamu bisa jadiin referensi sebelum memesan. Ga hanya itu, fitur booking online nya juga mudah. Cukup cari bengkel, klik booking, lalu isi form singkat booking deh! Kamu ga perlu datang kesana untuk menunggu, tinggal datang saja kalo sudah giliranmu.
            </p>
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
            <p> 
            Pitstop hadir sebagai platform manajemen bengkel yang inovatif dan terpercaya. Kami menawarkan solusi digital lengkap untuk mempermudah pengelolaan operasional bengkel, mulai dari layanan pelanggan hingga pengelolaan inventaris. Dengan teknologi modern dan antarmuka yang ramah pengguna, kami berkomitmen membantu bisnis bengkel Anda berkembang lebih cepat dan efisien.
            </p>
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

