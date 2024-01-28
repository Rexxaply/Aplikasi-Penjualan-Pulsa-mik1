<div class="row my-3">
    <div class="col-md-12">
        <h5>
            <i class="fas fa-mobile"></i> Data Pulsa
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="fas fa-plus"></i> Tambah
            </button>
        </h5>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php
        include 'alert.php';
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Operator</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Harga</th>
                        <th width="90" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $qry = $conn->query("SELECT * FROM pulsa ORDER BY id_pulsa DESC");
                    foreach ($qry as $pls) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $pls['provider'] ?></td>
                            <td class="text-center"><?= number_format($pls['nominal'], 0, ",", ".") ?></td>
                            <td class="text-center">Rp. <?= number_format($pls['harga'], 0, ",", ".") ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-info text-white mx-2" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $pls['id_pulsa'] ?>"><i class="far fa-edit"></i></a>

                                <!-- Tombol Trigger Hapus -->
                                <button class="btn btn-sm btn-danger" data-bs-target="#modalHapus<?= $pls['id_pulsa'] ?>" data-bs-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>

                        <!-- Awal Modal Ubah -->
                        <div class="modal fade" id="modalUbah<?= $pls['id_pulsa'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Data Pelanggan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="modules/pulsa/proses_update.php" method="post">
                                            <input type="hidden" name="id_pulsa" value="<?= $pls['id_pulsa'] ?>">
                                            <div class="modal-body px-4">
                                                <div class="mb-2">
                                                    <label for="operator" class="form-label">Provider</label>
                                                    <input type="text" class="form-control shadow-none" name="operator" id="operator" value="<?= $pls['provider'] ?>" autocomplete="off" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="nominal" class="form-label">Nominal</label>
                                                    <input type="text" class="form-control shadow-none nominal-update" name="nominal" id="nominal" value="<?= $pls['nominal'] ?>" autocomplete="off" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" class="form-control shadow-none harga-update" name="harga" id="harga" value="<?= $pls['harga'] ?>" autocomplete="off" required>
                                                    <!-- Format Angka JS -->
                                                    <script src="asset/js/format-angka-update.js"></script>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                                <button type="submit" class="btn btn-sm btn-primary" name="proses"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Akhir Modal Ubah -->
                                </div>
                            </div>
                        </div>
                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $pls['id_pulsa'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>Apakah Pelanggan <strong class="text-danger"><?= $pls['provider'] ?></strong> dengan nominal <strong class="text-danger"><?= number_format($pls['nominal'], 0, ",", ".") ?></strong> akan dihapus?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="modules/pulsa/proses_delete.php?id=<?= $pls['id_pulsa'] ?>&aksi=delete"><button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Ya Hapus aja</button></a>
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

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-edit text-success"></i> Entry Data Pulsa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modules/pulsa/proses_tambah.php" method="post">
                <div class="modal-body px-4">
                    <div class="mb-2">
                        <label for="operator" class="form-label">Operator</label>
                        <input type="text" class="form-control shadow-none" name="operator" id="operator" placeholder="Masukkan Jenis Operator" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="nominalPulsa" class="form-label">Nominal</label>
                        <input type="text" class="form-control shadow-none" name="nominal" id="nominalPulsa" placeholder="Masukkan Nominal" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="hargaPulsa" class="form-label">Harga</label>
                        <input type="text" class="form-control shadow-none" name="harga" id="hargaPulsa" placeholder="Masukkan Harga" autocomplete="off" required>
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