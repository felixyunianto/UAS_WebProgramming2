<?php

$id_matkul = $_POST['id_matkul'];
$nim = $_POST['nim'];
// $tanggal = $_POST['tanggal'];
$status = $_POST['status'];

include "koneksi.php";
$result['pesan']="";
    

    $queryResult = $koneksi->query("INSERT INTO absen (id_matkul,nim,status) VALUES ('".$id_matkul."','".$nim."','".$status."')");

    if($queryResult){
        $result['pesan'] = "Data Berhasil ditambahkan!";
    }else{
        $result['pesan'] = "Data Gagal ditambahkan!";
    }



echo json_encode($result);

?>