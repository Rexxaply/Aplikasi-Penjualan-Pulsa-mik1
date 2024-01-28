<?php 
require_once '../../config/config.php';

if (isset ($_GET['aksi']) == 'delete') {
    $id = $_GET['id'];

    $qry = $conn->query("DELETE FROM pulsa WHERE id_pulsa = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menghapus data pulsa.';
        header('location:../../index.php?module=pulsa');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Menghapus data pulsa.';
        header('location:../../index.php?module=pulsa');
    }
} else {
    header('location:../../index.php?module=pulsa');
}