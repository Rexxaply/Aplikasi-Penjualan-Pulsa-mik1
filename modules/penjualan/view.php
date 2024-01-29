<div class="row my-3">
    <div class="col-md-12">
        <h5>
            <i class="fas fa-shopping-cart me-1"></i> Data Penjualan
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
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Provider</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center" width="90">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $qry = $conn->query("SELECT * FROM penjualan pjl INNER JOIN pelanggan pgn ON pjl.pelanggan_id = pgn.id_pelanggan INNER JOIN pulsa pls ON pjl.pulsa_id = pls.id_pulsa ORDER BY tanggal DESC");
                foreach ($qry as $pjl) :
                    include 'config/bulan.php'
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= ("$tanggal $nama_bulan $tahun"); ?></td>
                        <td><?= $pjl['nama_pelanggan'] . "<small> - </small><small class='text-muted no_hp'>" . $pjl['no_hp'] . "</small>" ?></td>
                        <td><?= $pjl['provider'] . "<small> - </small><small class='text-muted nominal-update'>" . $pjl['nominal'] . "</small>" ?></td>
                        <td>Rp. <?= number_format($pjl['harga_jual'], 0, ",", ".") ?></td>
                        <!-- Tombol Trigger Ubah -->
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-info text-white mx-2" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $pjl['id_penjualan'] ?>"><i class="far fa-edit"></i></a>

                            <!-- Tombol Trigger Hapus -->
                            <button class="btn btn-sm btn-danger" data-bs-target="#modalHapus<?= $pjl['id_penjualan'] ?>" data-bs-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $pjl['id_user'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Data Pengguna</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="modules/pengguna/proses_update.php" method="post">
                                        <input type="hidden" name="id_user" value="<?= $pjl['id_user'] ?>">
                                        <div class="modal-body px-4">
                                            <div class="mb-2">
                                                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                                <input type="text" class="form-control shadow-none" name="nama_pengguna" id="nama_pengguna" value="<?= $pjl['nama_pengguna'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control shadow-none" name="username" id="username" value="<?= $pjl['username'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control shadow-none" name="password" id="password" placeholder="Masukkan Kata Sandi Baru" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="konfirmasi" class="form-label">Konfirmasi</label>
                                                <input type="password" class="form-control shadow-none" name="konfirmasi" id="konfirmasi" placeholder="Masukkan Ulang Password Anda" autocomplete="off" required>
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
                    <div class="modal fade" id="modalHapus<?= $pjl['id_user'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Konfirmasi Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>Apakah Pengguna <strong class="text-danger"><?= $pjl['nama_pengguna'] ?></strong> dengan username <strong class="text-danger"><?= $pjl['username'] ?></strong> akan dihapus?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="modules/pengguna/proses_delete.php?id=<?= $pjl['id_user'] ?>&aksi=delete"><button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Ya Hapus aja</button></a>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-cart-plus"></i> Entry Data Penjualan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modules/penjualan/proses_tambah.php" method="post">
                <div class="modal-body px-4">
                    <div class="mb-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control shadow-none" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="pelanggan" class="form-label">Nomor Handphone</label>
                        <select name="pelanggan" id="pelanggan" class="select" onchange="getPelanggan()">
                            <option value="" selected disabled>Pilih Nomor Anda</option>
                            <?php
                            $pelanggan = $conn->query("SELECT * FROM pelanggan");
                            foreach ($pelanggan as $plg) :
                            ?>
                                <option class="no_hp" value="<?= $plg['id_pelanggan'] ?>"><?= $plg['no_hp'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="pulsa" class="form-label">Pulsa</label>
                        <select name="no_hp" id="no_hp" class="select" onchange="getPulsa()">
                            <option value="" selected disabled>Pilih Operator Anda</option>
                            <?php
                            $pulsa = $conn->query("SELECT * FROM pulsa");
                            foreach ($pulsa as $pls) :
                            ?>
                                <option value="<?= $pls['id_pulsa'] ?>"><?= $pls['provider'] . ' - ' . number_format($pls['nominal'], 0, ",", ".") ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" id="harga" name="harga" class="form-control harga">
                        </div>
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