<?php 
require_once '../../config/config.php';

if (isset ($_GET['aksi']) == 'delete') {
    $id = $_GET['id'];

    $qry = $conn->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menghapus data pelanggan.';
        header('location:../../index.php?module=pelanggan');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Menghapus data pelanggan.';
        header('location:../../index.php?module=pelanggan');
    }
} else {
    header('location:../../index.php?module=pelanggan');
}