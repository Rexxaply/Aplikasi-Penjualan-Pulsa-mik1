<?php 
require_once '../../config/config.php';

if (isset ($_POST['submit'])) {
    $id = $_POST['id_pelanggan'];
    $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);

    $no_hp = $_POST['no_hp'];
    // Menghilangkan titik pada harga
    $no_hp1 = str_replace("-", "", $no_hp);
    // Output : 0811 5214 446

    // Mengilangkan spasi pada nomor
    $no_hp2 = str_replace(" ", "", $no_hp1);
    // Output : 08115214446

    $qry = $conn->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_hp='$no_hp2' WHERE id_pelanggan = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Mengubah data pelanggan.';
        header('location:../../index.php?module=pelanggan');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Mengubah data pelanggan.';
        header('location:../../index.php?module=pelanggan');
    }
} else {
    header('location:../../index.php?module=pelanggan');
}