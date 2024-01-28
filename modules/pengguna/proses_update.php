<?php 
require_once '../../config/connect.php';

if (isset ($_POST['submit'])) {
    $id = $_POST['id_user'];
    $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // cek username
    $cek_username = $conn->query("SELECT username FROM user WHERE username = '$username'");
    $data = mysqli_num_rows($cek_username);

    if ($data > 1) {
        session_start();
        $_SESSION['alert1'] = 'Username sudah ada, silahkan gunakan username yang lain!';
        header('location:../../index.php?module=pengguna');
        exit();
    }
    
    // cek password
    if ($password != $konfirmasi) {
        session_start();
        $_SESSION['alert1'] = 'Password yang anda masukkan berbeda.';
        header('location:../../index.php?module=pengguna');
        exit();
    }

    // enksripsi password
    $pwd = md5($password);

    $qry = $conn->query("UPDATE user SET nama_pengguna = '$nama_pengguna', username = '$username', password = '$password' WHERE id_user = '$id'");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Mengubah data pengguna.';
        header('location:../../index.php?module=pengguna');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Mengubah data pengguna.';
        header('location:../../index.php?module=pengguna');
    }
} else {
    header('location:../../index.php?module=pengguna');
}