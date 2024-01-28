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