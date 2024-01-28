<div class="row my-3">
    <div class="col-md-12">
        <h5>
            <i class="fas fa-user-lock me-1"></i> Data Pengguna
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
                    <th class="text-center">Nama Pengguna</th>
                    <th class="text-center">Username</th>
                    <th class="text-center" width="90">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $qry = $conn->query("SELECT * FROM user ORDER BY id_user DESC");
                foreach ($qry as $pgn) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $pgn['nama_pengguna'] ?></td>
                        <td><?= $pgn['username'] ?></td>
                        <!-- Tombol Trigger Ubah -->
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-info text-white mx-2" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $pgn['id_user'] ?>"><i class="far fa-edit"></i></a>

                            <!-- Tombol Trigger Hapus -->
                            <button class="btn btn-sm btn-danger" data-bs-target="#modalHapus<?= $pgn['id_user'] ?>" data-bs-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $pgn['id_user'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Data Pengguna</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="modules/pengguna/proses_update.php" method="post">
                                        <input type="hidden" name="id_user" value="<?= $pgn['id_user'] ?>">
                                        <div class="modal-body px-4">
                                            <div class="mb-2">
                                                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                                <input type="text" class="form-control shadow-none" name="nama_pengguna" id="nama_pengguna" value="<?= $pgn['nama_pengguna'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control shadow-none" name="username" id="username" value="<?= $pgn['username'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control shadow-none" name="password" id="password" placeholder="Masukkan Kata Sandi Baru" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="konfirmasi" class="form-label">Konfirmasi</label>
                                                <input type="password" class="form-control shadow-none" name="konfirmasi" id="konfirmasi" placeholder="Masukkan Ulang Password Anda" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" onclick="myFunction()" id="pw">
                                                <label for="pw" id="lb">Tampilkan Password</label>

                                                <script>
                                                    function myFunction(){
                                                        var pass = document.getElementById("password");
                                                        var konfir = document.getElementById("konfirmasi");
                                                        var label = document.getElementById("lb");
                                                        if (pass.type === "password") {
                                                            pass.type = "text";
                                                            konfir.type ="text";
                                                            label.innerHTML = "Sembunyikan Password";
                                                        } else {
                                                            pass.type = "password";
                                                            konfir.type = "password";
                                                            label.innerHTML = "Tampilkan Password";
                                                        }
                                                    }
                                                </script>
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
                    <div class="modal fade" id="modalHapus<?= $pgn['id_user'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Konfirmasi Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>Apakah Pengguna <strong class="text-danger"><?= $pgn['nama_pengguna'] ?></strong> dengan username <strong class="text-danger"><?= $pgn['username'] ?></strong> akan dihapus?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="modules/pengguna/proses_delete.php?id=<?= $pgn['id_user'] ?>&aksi=delete"><button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Ya Hapus aja</button></a>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Entry Data Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modules/pengguna/proses_tambah.php" method="post">
                <div class="modal-body px-4">
                    <div class="mb-2">
                        <label for="nama_pelanggan" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control shadow-none" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan Nama Anda" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control shadow-none" name="username" id="username" placeholder="Masukkan Password Anda" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control shadow-none" name="password" id="password1" placeholder="Masukkan Password Anda" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control shadow-none" name="konfirmasi" id="konfirmasi1" placeholder="Masukkan Ulang Password Anda" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <input type="checkbox" class="form-check-input shadow-none" onclick="hiddenPassword()" id="hidden">
                        <label for="hidden" class="form-check-label" id="label">Tampilkan Password</label>

                        <script>
                            function hiddenPassword() {
                                var password1 = document.getElementById("password1");
                                var konfirmasi1 = document.getElementById("konfirmasi1");
                                var label1 = document.getElementById("label");

                                if (password1.type === "password") {
                                    password1.type = "text";
                                    konfirmasi1.type = "text";
                                    label1.innerHTML = "Sembunyikan Password";

                                } else {
                                    password1.type = "password";
                                    konfirmasi1.type = "password";
                                    label1.innerHTML = "Tampilkan Password";
                                }
                            }
                        </script>
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