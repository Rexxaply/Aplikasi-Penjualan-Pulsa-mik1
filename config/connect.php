<?php
$conn = mysqli_connect("localhost", "root", "", "db_penjualan_pulsa_mik1");

// check connection
if ($conn->connect_errno) {
    echo "Gagal tersambung ke database :" . $conn->connect_error;
    exit();
}