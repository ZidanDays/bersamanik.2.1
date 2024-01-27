<?php
include './conf/conf.php';

// Tangkap data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar = $_FILES["gambar"];
    $path_gambar = "uploads/konten1/" . basename($gambar["name"]);

    // Simpan data ke database
    $sql = "INSERT INTO konten1_beranda (path_gambar) VALUES ('$path_gambar')";
    if ($conn->query($sql) === TRUE) {
        // Pindahkan gambar ke folder uploads
        move_uploaded_file($gambar["tmp_name"], $path_gambar);

        // Tampilkan pesan sukses dengan SwalFire
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Gambar berhasil ditambahkan.',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.href='?q=pberanda';
                });
            </script>";
        exit();
    } else {
        // Tampilkan pesan error dengan SwalFire
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan. Silakan coba lagi.',
                });
            </script>";
    }
}
