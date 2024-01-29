<?php

// Set TimeZone (WIB)
date_default_timezone_set("ASIA/JAKARTA");
// Koneksi Database
include 'connect.php';

// Pelanggan
$pelanggan = $conn->query("SELECT COUNT(id_pelanggan) as plg FROM pelanggan");
$data_pelanggan = mysqli_fetch_assoc($pelanggan);
$get_pelanggan = $data_pelanggan['plg'];

// Pulsa
$pulsa = $conn->query("SELECT COUNT(id_pulsa) as pls FROM pulsa");
$data_pulsa = mysqli_fetch_assoc($pulsa);
$get_pulsa = $data_pulsa['pls'];

// Penjualan
$penjualan = $conn->query("SELECT COUNT(id_penjualan) as pjl FROM penjualan");
$data_penjualan = mysqli_fetch_assoc($penjualan);
$get_penjualan = $data_penjualan['pjl'];

// Pendapatan
$pendapatan = $conn->query("SELECT SUM(harga_jual) as pdt FROM penjualan");
$data_pendapatan = mysqli_fetch_assoc($pendapatan);
$get_pendapatan = $data_pendapatan['pdt'];