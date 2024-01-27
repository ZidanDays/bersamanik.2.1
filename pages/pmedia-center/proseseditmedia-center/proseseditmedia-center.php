<?php
include './conf/conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Periksa apakah file gambar baru dipilih
    if (isset($_FILES["editGambar"]) && $_FILES["editGambar"]["error"] == 0) {
        $editGambar = $_FILES["editGambar"];
        $judul = $_POST["Judul"];
        $deskripsi = $_POST["Deskripsi"];
        $path_gambar = "uploads/konten_news/" . basename($editGambar["name"]);

        // Update data termasuk gambar baru
        $sql = "UPDATE news SET path_gambar = '$path_gambar', link = '$judul', excerpt = '$deskripsi' WHERE id_news = $id";
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
                        window.location.href = '?q=pnews';
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
                        window.location.href = '?q=pnews';
                    });
                  </script>";
        }
    } else {
        // Jika file gambar tidak dipilih, hanya lakukan redirect
        header("Location: ?q=pnews");
        exit();
    }
} else {
    // Tampilkan pesan error jika tidak ada data POST
    echo "Invalid request.";
}
