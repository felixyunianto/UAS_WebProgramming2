<?php
    include "koneksi.php";

    if(isset($_POST["nim_mahasiswa"])){
        $query = "SELECT * FROM mahasiswa WHERE nim='".$_POST["nim_mahasiswa"]."'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
?>