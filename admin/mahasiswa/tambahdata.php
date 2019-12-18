<?php

include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$semester = $_POST['semester'];
$result['pesan']="";


if($nim==""){
    $result['pesan']="NIM Harus diisi!";
}elseif($nama==""){
    $result['pesan']="Nama Harus diisi!";
}elseif($kelas==""){
    $result['pesan']="Kelas Harus diisi!";
}elseif($email==""){
    $result['pesan']="Email Harus diisi!";
}elseif($no_hp==""){
    $result['pesan']="No HP Harus diisi!";
}elseif($alamat==""){
    $result['pesan']="Alamat Harus diisi!";
}elseif($semester==""){
    $result['pesan']="Semester Harus diisi!";
}else {
    $queryResult = $koneksi->query("INSERT INTO mahasiswa (nim,nama,kelas,email,no_hp,alamat,semester)VALUES ('".$nim."','".$nama."','".$kelas."',
    '".$email."','".$no_hp."','".$alamat."','".$semester."')");

    if($queryResult){
        $result['pesan'] = "Data Berhasil ditambahkan!";
    }else{
        $result['pesan'] = "Data Gagal ditambahkan!";
    }
}


echo json_encode($result);

?>