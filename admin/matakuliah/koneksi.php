<?php
    $koneksi = new mysqli("localhost","root","","utsweb2");

    if(!$koneksi){
        echo "Koneksi Error!";
    }
?>