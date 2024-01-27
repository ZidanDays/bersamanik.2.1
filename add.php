<?php

include "./conf/conf.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil input username dan password dari form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    // Persiapkan pernyataan SQL dengan parameter terikat
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    // Bind parameter ke pernyataan SQL
    $stmt->bind_param('ss', $input_username, $hashed_password);

    // Eksekusi pernyataan SQL
    if ($stmt->execute()) {
        // Registrasi berhasil, set session dan redirect ke halaman dashboard
        // $_SESSION['username'] = $input_username;
        header('Location: index.php');
        exit();
    } else {
        // Registrasi gagal, tampilkan pesan error
        echo "Registration failed. Please try again.";
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
}
?>
