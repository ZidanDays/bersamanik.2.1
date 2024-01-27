<?php
include './conf/conf.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database sesuai dengan ID
    global $conn;

    // Gunakan parameter binding atau sanitasi input untuk melindungi dari SQL Injection
    $deleteQuery = $conn->prepare("DELETE FROM media_center WHERE id_media-center = ?");
    $deleteQuery->bind_param("i", $id);

    if ($deleteQuery->execute()) {
        // Tampilkan pesan sukses dengan SwalFire
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data berhasil dihapus.',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    // Redirect ke halaman pberanda atau sesuai kebutuhan Anda
                    window.location.href = '?q=pnews';
                });
              </script>";
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

    $deleteQuery->close();
} else {
    // Tampilkan pesan error jika tidak ada ID yang diterima
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Invalid request.',
            }).then(function() {
                // Redirect ke halaman pberanda atau sesuai kebutuhan Anda
                window.location.href = '?q=pberanda';
            });
          </script>";
}