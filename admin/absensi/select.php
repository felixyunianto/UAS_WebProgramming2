<?php

include "../../koneksi.php";
if(isset($_POST["id_absen"]))
{
    $output = '';
    $query = "SELECT * FROM absen WHERE id_absen = '".$_POST["id_absen"]."'";
    $result = mysqli_query($koneksi , $query);
    $output .= '
    <div class="table-responsive">
        <table class="table table-bordered"> ';
    
    while($row = mysqli_fetch_array($result))
    {
        $status;
        if($row['status']){
            $status = "Hadir";
        }else{
            $status = "Tidak Hadir";
        }
        $output .= '
            <tr>
                <td width="30%"><label>Tanggal</label></td>
                <td width="70%">'.$row['tanggal'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Status</label></td>
                <td width="70%">'.$status.'</td>
            </tr>';
    }
    $output .= "</table></div>";
    echo $output;

}

?>