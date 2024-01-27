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

    // Persiapkan pernyataan SQL dengan parameter terikat
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);

    // Bind parameter ke pernyataan SQL
    $stmt->bind_param('s', $input_username);

    // Eksekusi pernyataan SQL
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->get_result();

    // Periksa apakah hasil query mengembalikan baris data
    if ($result->num_rows > 0) {
        // Ambil data password dari hasil query
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($input_password, $hashed_password)) {
            // Login berhasil, set session dan redirect ke halaman dashboard
            $_SESSION['username'] = $input_username;
            header('Location: dashboard.php');
            exit();
        } else {
            header('Location: index.php?gagal=true');
            echo "<script>alert('Login failed. Please check your username and password.');</script>";

        }
    } else {
        echo "<script>alert('Login failed. Please check your username and password.');</script>";
        header('Location: index.php?gagal=true');
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
}
?>
