<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bengkel</title>
    <link rel="stylesheet" href="">
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
    background-color: #333;
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
    background-color: #333;
    color: white;
    margin-top: 20px;
}

</style>

<body>
    <header class="navbar">
        <div class="logo">BengkelKu</div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Pesanan</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">Keluar</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-picture"></div>
            <h3>Nama Bengkel</h3>
            <p>Lokasi Bengkel</p>
            <button class="edit-profile">Edit Profil</button>
        </aside>

        <!-- Konten Utama -->
        <section class="main-content">
            <div class="content-row">
                <div class="box">Informasi 1</div>
                <div class="box">Informasi 2</div>
                <div class="box">Informasi 3</div>
            </div>
            <div class="large-box">Grafik atau Data Utama</div>
        </section>
    </main>

    <footer class="footer">
        <p>Hak Cipta © 2025 BengkelKu. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
