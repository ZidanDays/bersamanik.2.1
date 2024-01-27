<?php
include './conf/conf.php';

// Tangkap data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar = $_FILES["gambar"];
    $judul = $_POST["Judul"];
    $deskripsi = $_POST["Deskripsi"];
    $path_gambar = "uploads/konten_biodata/" . basename($gambar["name"]);

    // Simpan data ke database
    $sql = "INSERT INTO biodata (path_gambar,judul,deskripsi) VALUES ('$path_gambar','$judul','$deskripsi')";
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
                    window.location.href='?q=pbiodata';
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
