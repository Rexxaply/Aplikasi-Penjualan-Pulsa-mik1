<?php 
require_once '../../config/connect.php';

if (isset ($_POST['submit'])) {
    $operator = $_POST['operator'];
    
    $harga = htmlspecialchars($_POST['harga']);
    // Menghilangkan titik pada harga
    $harga1 = str_replace(".", "", $harga);
    // Menghilangkan Rp. pada angka
    $harga2 = str_replace("Rp ", "", $harga1);
    echo $harga2 . "<br>";

    $nominal = $_POST['nominal'];
    // Menghilangkan titik pada harga
    $nominal1 = str_replace(".", "", $nominal);
    // Menghilangkan Rp. pada angka
    $nominal2 = str_replace("Rp ", "", $nominal1);
    echo $nominal2 . "<br>";

    $qry = $conn->query("INSERT INTO pulsa (provider, nominal, harga) VALUES ('$operator', '$nominal2', '$harga2')");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menambahkan pulsa baru.';
        header('location:../../index.php?module=pulsa');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Mengubah data pulsa.';
        header('location:../../index.php?module=pulsa');
    }
} else {
    header('location:../../index.php?module=pulsa');
}