<?php 
require_once '../../config/config.php';

if (isset ($_GET['aksi']) == 'delete') {
    $id = $_GET['id'];

    $qry = $conn->query("DELETE FROM user WHERE id_user = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menghapus data pengguna.';
        header('location:../../index.php?module=pengguna');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Menghapus data pengguna.';
        header('location:../../index.php?module=pengguna');
    }
} else {
    header('location:../../index.php?module=pengguna');
}