<?php
    include "koneksi.php";

    $resultquery = $koneksi->query("SELECT * FROM dosen");
    $result=array();

    while($fetchData=$resultquery->fetch_assoc()){
        $result[]=$fetchData;
    }

    echo json_encode($result);

?>