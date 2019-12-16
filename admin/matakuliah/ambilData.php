<?php
    include "koneksi.php";

    $resultquery = $koneksi->query("SELECT * FROM matkul");
    $result=array();

    while($fetchData=$resultquery->fetch_assoc()){
        $result[]=$fetchData;
    }

    echo json_encode($result);

?>