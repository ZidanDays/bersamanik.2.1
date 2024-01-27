<!-- Main Content -->
<main class="content">
    <div class="d-flex justify-content-between ">
        <!-- Dashboard Title -->
        <div class="d-flex align-items-center">
            <div class="icon-box bg-primary text-white mr-3">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h5 class="mt-2">Landing Page walpaper</h5>
        </div>

        <!-- Overview Title -->
        <div>
            <p class="m-0">Overview</p>
        </div>
    </div>
    <div class="container-fluid">

        <!-- Table Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-center">Pengaturan Halaman walpaper</h5>

                        <!-- Button Tambah -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                Tambah
                            </button>
                        </div>
                        <div class="table-responsive text-center">
                            <?php
                            include './conf/conf.php';

                            // Query untuk mengambil data dari tabel gambar_carousel
                            $query = "SELECT * FROM walpaper";
                            $result = $conn->query($query);

                            ?>

                            <?php if ($result->num_rows > 0) : ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <!-- <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th> -->
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="<?= $row['path_gambar'] ?>" alt="Gambar Carousel" width="200">
                                        </td>
                                        <!-- <td> <?= $row['judul'] ?> </td> -->
                                        <!-- <td> <?= $row['deskripsi'] ?> </td> -->
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal<?= $row['id_walpaper'] ?>">
                                                Edit
                                            </button>
                                            <a href="?q=proseshapuswalpaper&id=<?= $row['id_walpaper'] ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $row['id_walpaper'] ?>" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulir Edit -->
                                                    <form action="?q=proseseditwalpaper" method="post"
                                                        enctype="multipart/form-data">
                                                        <!-- Input untuk ID -->
                                                        <input type="hidden" name="id" value="<?= $row['id_walpaper'] ?>">

                                                        <div class="mb-3">
                                                            <label for="Judul" class="form-label">Judul</label>
                                                            <input type="text" class="form-control" id="Judul" name="Judul"value="<?= $row['judul'] ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="Judul" class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control" id="Judul" name="Deskripsi" value="<?= $row['deskripsi'] ?>">
                                                        </div>

                                                        <!-- Input untuk gambar -->
                                                        <div class="mb-3">
                                                            <label for="editGambar" class="form-label">Pilih Gambar
                                                                Baru</label>
                                                            <input type="file" class="form-control" id="editGambar"
                                                                name="editGambar" accept="image/*">
                                                        </div>

                                                        <!-- Tampilkan gambar lama -->
                                                        <img src="<?= $row['path_gambar'] ?>" alt="Gambar Lama"
                                                            width="200" class="mb-3">

                                                        <!-- Tombol Simpan -->
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <?php else : ?>
                            <p>Tidak ada data gambar_carousel.</p>
                            <?php endif; ?>

                            <?php
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <form action="?q=prosestambahwalpaper" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>

                            <!-- Input untuk Judul -->
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="Judul" name="Judul">
                        </div>

                        <!-- Input untuk Deskripsi -->
                        <div class="mb-3">
                            <label for="Deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="Deskripsi" name="Deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</main>