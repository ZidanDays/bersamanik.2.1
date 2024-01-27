<!-- Main Content -->
<main class="content">
    <div class="d-flex justify-content-between ">
        <!-- Dashboard Title -->
        <div class="d-flex align-items-center">
            <div class="icon-box bg-primary text-white mr-3">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h5 class="mt-2">Landing Page Beranda</h5>
        </div>

        <!-- Overview Title -->
        <div>
            <p class="m-0">Overview</p>
        </div>
    </div>
    <div class="container-fluid">

    <?php
include "./conf/conf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-4 mb-4">Admin Page - Aduan Data</h2>

    <?php
    // Query to select all records from the "aduan" table
    $sql = "SELECT * FROM aduan ORDER by id_aduan DESC";
    $result = mysqli_query($conn, $sql);

    // Check if there are records
    if (mysqli_num_rows($result) > 0) {
        // Output table header
        echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ID Aduan</th>
                        <th>Judul Laporan</th>
                        <th>Nama Pelapor</th>
                        <th>Email Pelapor</th>
                        <th>Lokasi Aduan</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>";
                $i = 1;
        // Output data from each row
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['judul_laporan']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['Email']}</td>
                    <td>{$row['lokasi']}</td>
                    <td>{$row['pesan']}</td>
                </tr>";
                $i++;
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>No records found</div>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="?q=prosestambahberanda" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</main>