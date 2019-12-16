<?php
    include "koneksi.php";

    $resultquery = $koneksi->query("SELECT * FROM mahasiswa WHERE kelas='B'");
    $result=array();

    while($fetchData=$resultquery->fetch_assoc()){
        $result[]=$fetchData;
    }

    echo json_encode($result);

?>