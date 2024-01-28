<?php 
require_once '../../config/config.php';

if (isset ($_POST['proses'])) {
    $id = $_POST['id_pulsa'];
    $operator = htmlspecialchars($_POST['operator']);
    
    $harga = $_POST['harga'];
    // Menghilangkan titik pada harga
    $harga1 = str_replace(".", "", $harga);

    $nominal = $_POST['nominal'];
    // Menghilangkan titik pada harga
    $nominal1 = str_replace(".", "", $nominal);

    $qry = $conn->query("UPDATE pulsa SET provider='$operator', harga='$harga1', nominal='$nominal1' WHERE id_pulsa = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Mengubah data pulsa.';
        header('location:../../index.php?module=pulsa');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Mengubah data pulsa.';
        header('location:../../index.php?module=pulsa');
    }
} else {
    header('location:../../index.php?module=pulsa');
}