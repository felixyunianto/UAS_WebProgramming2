<?php
    include "koneksi.php";

    if(isset($_POST["nidn_dosen"])){
        $query = "SELECT * FROM dosen WHERE nidn='".$_POST["nidn_dosen"]."'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
?>