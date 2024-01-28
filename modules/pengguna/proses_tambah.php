<?php 
require_once '../../config/connect.php';

if (isset ($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama_pelanggan']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // cek username
    $cek_username = $conn->query("SELECT username FROM user WHERE username = '$username'");
    $data = mysqli_num_rows($cek_username);

    if ($data > 0) {
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

    $qry = $conn->query("INSERT INTO user (nama_pengguna, username, password) VALUES ('$nama', '$username', '$pwd')");

    if ($qry) {
        session_start();
        $_SESSION['alert'] = 'Menambahkan Pengguna baru.';
        header('location:../../index.php?module=pengguna');
    } else {
        session_start();
        $_SESSION['alert1'] = 'Menambahkan pengguna baru.';
        header('location:../../index.php?module=pengguna');
    }
} else {
    header('location:../../index.php?module=pengguna');
}