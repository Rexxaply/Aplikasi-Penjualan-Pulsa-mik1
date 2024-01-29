<?php
    $date = $pjl['tanggal'];
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    $tgl_lahir = $datetime->format('d-m-Y');

    $tanggal = substr($tgl_lahir,0,2);
    $bulan = substr($tgl_lahir,3,2);
    $tahun = substr($tgl_lahir,6,4);

    if ($bulan == "01") {
        $nama_bulan = "Januari";
    } elseif ($bulan == "02") {
        $nama_bulan = "Februari";
    } elseif ($bulan == "03") {
        $nama_bulan = "Maret";
    } elseif ($bulan == "04") {
        $nama_bulan = "April";
    } elseif ($bulan == "05") {
        $nama_bulan = "Mei";
    } elseif ($bulan == "06") {
        $nama_bulan = "Juni";
    } elseif ($bulan == "07") {
        $nama_bulan = "Juli";
    } elseif ($bulan == "08") {
        $nama_bulan = "Agustus";
    } elseif ($bulan == "09") {
        $nama_bulan = "September";
    } elseif ($bulan == "10") {
        $nama_bulan = "Oktober";
    } elseif ($bulan == "11") {
        $nama_bulan = "November";
    } elseif ($bulan == "12") {
        $nama_bulan = "Desember";
    } else {
        $nama_bulan = "NULL";
    }