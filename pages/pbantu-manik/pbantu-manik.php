<!-- Main Content -->
<main class="content">
    <div class="d-flex justify-content-between ">
        <!-- Dashboard Title -->
        <div class="d-flex align-items-center">
            <div class="icon-box bg-primary text-white mr-3">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h5 class="mt-2">Landing Page Donasi</h5>
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
                        <h5 class="card-title mb-4 text-center">Pengaturan Halaman Donasi</h5>

                        <!-- Button Tambah -->
                        <!-- <div class="mb-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                Tambah
                            </button>
                        </div> -->
                        <div class="table-responsive text-center">
                            <?php
                            include './conf/conf.php';

                            // Query untuk mengambil data dari tabel gambar_carousel
                            $query = "SELECT * FROM donasi ORDER by id_donasi DESC";
                            $result = $conn->query($query);

                            ?>

                            <?php if ($result->num_rows > 0) : ?>
                            <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Organisasi</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nomor Telp</th>
                                        <th scope="col">Jumlah Donasi</th>
                                        <th scope="col">Bukti Donasi</th>
                                        <th scope="col">Tanggal Donasi</th>
                                        <th scope="col">Pesan</th>
                                        <!-- <th scope="col">Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td><?= $row['organisasi'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['nomor_telepon'] ?></td>
                                        <td>Rp.<?= $row['jumlah_donasi'] ?></td>
                                        <td><img src="../<?= $row['bukti_donasi'] ?>" alt="" width="200"></td>
                                        <td><?= $row['waktu_donasi'] ?></td>
                                        <td><?= $row['keterangan'] ?></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal<?= $row['id_donasi'] ?>">
                                                Edit
                                            </button>
                                            <a href="?q=proseshapusdonasi&id=<?= $row['id_donasi'] ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td> -->
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $row['id_donasi'] ?>" tabindex="-1"
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
                                                    <form action="?q=proseseditdonasi" method="post"
                                                        enctype="multipart/form-data">
                                                        <!-- Input untuk ID -->
                                                        <input type="hidden" name="id" value="<?= $row['id_donasi'] ?>">

                                                        <!-- Input untuk gambar -->
                                                        <div class="mb-3">
                                                            <label for="editGambar" class="form-label">Pilih Gambar
                                                                Baru</label>
                                                            <input type="file" class="form-control" id="editGambar"
                                                                name="editGambar" accept="image/*">
                                                        </div>

                                                        <!-- Tampilkan gambar lama -->
                                                        <img src="<?= $row['upload_bukti'] ?>" alt="Bukti Donasi"
                                                            width="200" class="mb-3">

                                                        <!-- Input untuk Nama -->
                                                        <div class="mb-3">
                                                            <label for="Nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="Nama" name="Nama"
                                                                value="<?= $row['nama'] ?>">
                                                        </div>

                                                        <!-- Input untuk Organisasi -->
                                                        <div class="mb-3">
                                                            <label for="Organisasi" class="form-label">Organisasi</label>
                                                            <input type="text" class="form-control" id="Organisasi"
                                                                name="Organisasi" value="<?= $row['organisasi'] ?>">
                                                        </div>

                                                        <!-- Input untuk Email -->
                                                        <div class="mb-3">
                                                            <label for="Email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="Email"
                                                                name="Email" value="<?= $row['email'] ?>">
                                                        </div>

                                                        <!-- Input untuk Nomor Telepon -->
                                                        <div class="mb-3">
                                                            <label for="NomorTelepon" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text" class="form-control" id="NomorTelepon"
                                                                name="NomorTelepon" value="<?= $row['nomor_telpon'] ?>">
                                                        </div>

                                                        <!-- Input untuk Jumlah Donasi -->
                                                        <div class="mb-3">
                                                            <label for="JumlahDonasi" class="form-label">Jumlah
                                                                Donasi</label>
                                                            <input type="text" class="form-control" id="JumlahDonasi"
                                                                name="JumlahDonasi" value="<?= $row['jumlah_donasi'] ?>">
                                                        </div>

                                                        <!-- Input untuk Pesan Donasi -->
                                                        <div class="mb-3">
                                                            <label for="PesanDonasi" class="form-label">Pesan
                                                                Donasi</label>
                                                            <textarea class="form-control" id="PesanDonasi"
                                                                name="PesanDonasi"><?= $row['pesan_donasi'] ?></textarea>
                                                        </div>

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
                    <form action="?q=prosestambahbiodata" method="post" enctype="multipart/form-data">
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