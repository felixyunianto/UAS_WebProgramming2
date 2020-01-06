<?php
    include "koneksi.php";

    if(isset($_POST["id_matkul"])){
        $query = "SELECT * FROM matkul WHERE id_matkul='".$_POST["id_matkul"]."'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
?>