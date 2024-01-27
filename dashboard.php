<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BersamaNik</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/boostrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/adminstyle3.css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-3">
            <div class="d-flex align-items-center">
                <img src="assets/img/bmanik2.png" alt="Admin Logo" class="img-fluid rounded-circle default-image-size mr-3">
                <div class="d-flex flex-column">
                    <h6 class="m-1">Administrator</h6>
                    <p class="tagp">Admin</p>
                </div>
            </div>
        </div>
        <div class="list-group">
            <!-- <a href="?q=pberanda" class="d-flex justify-content-between align-items-center">
                Beranda
                <i class="menu-icon fas fa-chart-bar"></i>
            </a> -->
            <!-- <a href="?q=pwalpaper" class="d-flex justify-content-between align-items-center">
                Walpaper
                <i class="menu-icon fas fa-chart-bar"></i>
            </a> -->
            <a href="?q=pnews" class="d-flex justify-content-between align-items-center">
                News
                <i class="menu-icon fa-solid fa-newspaper" style="color: #f5f5f5;"></i>
            </a>
            <!-- <a href="?q=pmedia-center" class="d-flex justify-content-between align-items-center">
                Media Center
                <i class="menu-icon fa-solid fa-newspaper" style="color: #f5f5f5;"></i>
            </a> -->
            <a href="?q=pbantu-manik" class="d-flex justify-content-between align-items-center">
                Donasi
                <i class=" menu-icon fa-solid fa-hand-holding-dollar" style="color: #ffffff;"></i>
            </a>
            <!-- <a href="?q=pbiodata" class="d-flex justify-content-between align-items-center">
                Biodata
                <i class="menu-icon fas fa-users"></i>
            </a> -->
            <!-- <a href="?q=pgaleri" class="d-flex justify-content-between align-items-center">
                Galeri
                <i class=" menu-icon fa-solid fa-folder-open" style="color: #ffffff;"></i>
            </a> -->
            <a href="?q=aduan" class="d-flex justify-content-between align-items-center">
                Lapornik
                <i class="menu-icon fas fa-cogs"></i>
            </a>
            <a href="?q=logout" class="d-flex justify-content-between align-items-center">
                Logout
                <i class="menu-icon fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar shadow">
        <div class="container-fluid">
            <div class="sidebar-btn" onclick="toggleSidebar()">
                <i id="sidebarIcon" class="fas fa-bars"></i>
            </div>
            <div class="navbar-title">Admin Dashboard</div>
            <div class="navbar-user">
                <img src="assets/img/bmanik2.png" alt="Admin Logo" class="" style="border-radius: 100%; width:15%;"> <span style="margin-left: 15px;">
                    Nama Pengguna</span>
            </div>
        </div>
    </div>


    <?php
    include 'linkadmin.php';
    ?>


    <!-- Footer -->
    <div class="footer">
        &copy; 2023 Admin Dashboard Manik Marganamahendra
    </div>

    <!-- Bootstrap JS (optional, if you need it) -->
    <script src="assets/boostrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/mainx.js"></script>

    <!-- Font Awesome JS (optional, if you need it) -->
    <script src="assets/fontawesome/js/all.min.js"></script>


</body>

</html>