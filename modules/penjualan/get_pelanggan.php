<?php
    if (isset($_GET['id_pelanggan'])) {
        require_once '../../config/connect.php';
        $id_pelanggan = $_GET['id_pelanggan'];
        $qry = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
        $pelanggan = mysqli_fetch_assoc($qry);
        $data = array(
            'nama_pelanggan' => $pelanggan['nama_pelanggan'],
        );
        echo json_encode($data);
    }