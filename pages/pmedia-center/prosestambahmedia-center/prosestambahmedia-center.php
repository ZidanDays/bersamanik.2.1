<?php
include './conf/conf.php';

// Tangkap data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar = $_FILES["gambar"];
    $judul = $_POST["Judul"];
    $deskripsi = $_POST["Deskripsi"];
    $path_gambar = "uploads/media_center/" . basename($gambar["name"]);

    // Simpan data ke database
    $sql = "INSERT INTO media_center (path_gambar,judul,tahun) VALUES ('$path_gambar','$judul','$tahun')";
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
                    window.location.href='?q=pnews';
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
