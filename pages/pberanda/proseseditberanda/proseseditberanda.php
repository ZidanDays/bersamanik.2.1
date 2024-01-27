<?php
include './conf/conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Periksa apakah file gambar baru dipilih
    if (isset($_FILES["editGambar"]) && $_FILES["editGambar"]["error"] == 0) {
        $editGambar = $_FILES["editGambar"];
        $path_gambar = "uploads/konten1/" . basename($editGambar["name"]);

        // Update data termasuk gambar baru
        $sql = "UPDATE konten1_beranda SET path_gambar = '$path_gambar' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // Pindahkan gambar ke folder uploads
            move_uploaded_file($editGambar["tmp_name"], $path_gambar);

            // Tampilkan pesan sukses dengan SwalFire
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data berhasil diubah.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        // Redirect ke halaman pberanda atau sesuai kebutuhan Anda
                        window.location.href = '?q=pberanda';
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
                    }).then(function() {
                        // Redirect ke halaman pberanda atau sesuai kebutuhan Anda
                        window.location.href = '?q=pberanda';
                    });
                  </script>";
        }
    } else {
        // Jika file gambar tidak dipilih, hanya lakukan redirect
        header("Location: ?q=pberanda");
        exit();
    }
} else {
    // Tampilkan pesan error jika tidak ada data POST
    echo "Invalid request.";
}
