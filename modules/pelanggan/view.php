<div class="row my-3">
    <div class="col-md-12">
        <h5>
            <i class="fas fa-user-alt me-1"></i> Data Pelanggan
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="fas fa-plus"></i> Tambah
            </button>
        </h5>
    </div>
</div>
<hr>
<div class="row">
    <?php
    include 'alert.php';
    ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr class="text-center">
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">No. Handphone</th>
                    <th class="text-center" width="90">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $qry = $conn->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
                foreach ($qry as $plg) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $plg['nama_pelanggan'] ?></td>
                        <td class="no_hp"><?= $plg['no_hp'] ?></td>
                        <!-- Tombol Trigger Ubah -->
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-info text-white mx-2" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $plg['id_pelanggan'] ?>"><i class="far fa-edit"></i></a>

                            <!-- Tombol Trigger Hapus -->
                            <button class="btn btn-sm btn-danger" data-bs-target="#modalHapus<?= $plg['id_pelanggan'] ?>" data-bs-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $plg['id_pelanggan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Data Pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="modules/pelanggan/proses_update.php" method="post">
                                        <input type="hidden" name="id_pelanggan" value="<?= $plg['id_pelanggan'] ?>">
                                        <div class="modal-body px-4">
                                            <div class="mb-2">
                                                <label for="nama_pelanggan" class="form-label">Provider</label>
                                                <input type="text" class="form-control shadow-none" name="nama_pelanggan" id="nama_pelanggan" value="<?= $plg['nama_pelanggan'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="no_hp" class="form-label">No. Handphone</label>
                                                <input type="text" class="form-control shadow-none no_hp" name="no_hp" id="no_hp" value="<?= $plg['no_hp'] ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                            <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Akhir Modal Ubah -->
                            </div>
                        </div>
                    </div>
                    <!-- Awal Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $plg['id_pelanggan'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Konfirmasi Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>Apakah Pelanggan <strong class="text-danger"><?= $plg['nama_pelanggan'] ?></strong> dengan nomor handphone <strong class="text-danger no_hp"><?= $plg['no_hp'] ?></strong> akan dihapus?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="modules/pelanggan/proses_delete.php?id=<?= $plg['id_pelanggan'] ?>&aksi=delete"><button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Ya Hapus aja</button></a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Gak Jadi Ah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Hapus -->
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-edit"></i> Entry Data Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modules/pelanggan/proses_tambah.php" method="post">
                <div class="modal-body px-4">
                    <div class="mb-2">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control shadow-none" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan Nama Anda" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="no_hp" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control shadow-none no_hp" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone Anda" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>