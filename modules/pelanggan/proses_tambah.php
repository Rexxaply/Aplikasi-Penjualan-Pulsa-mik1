<?php 
require_once '../../config/connect.php';

if (isset ($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama_pelanggan']);

    $no_hp = $_POST['no_hp'];
    // Menghilangkan titik pada harga
    $no_hp1 = str_replace("-", "", $no_hp);
    // Output : 0811 5214 446

    // Mengilangkan spasi pada nomor
    $no_hp2 = str_replace(" ", "", $no_hp1);
    // Output : 08115214446

    $qry = $conn->query("INSERT INTO pelanggan (nama_pelanggan, no_hp) VALUES ('$nama', '$no_hp2')");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menambahkan pelanggan baru.';
        header('location:../../index.php?module=pelanggan');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Menambahkan pelanggan baru.';
        header('location:../../index.php?module=pelanggan');
    }
} else {
    header('location:../../index.php?module=pelanggan');
}