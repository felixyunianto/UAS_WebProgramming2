<?php

include "koneksi.php";
if(isset($_POST["nidn_dosen"]))
{
    $output = '';
    $query = "SELECT * FROM dosen WHERE nidn = '".$_POST["nidn_dosen"]."'";
    $result = mysqli_query($koneksi , $query);
    $output .= '
    <div class="table-responsive">
        <table class="table table-bordered"> ';
    
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td width="30%"><label>NIDN</label></td>
                <td width="70%">'.$row['nidn'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Nama</label></td>
                <td width="70%">'.$row['nama'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Email</label></td>
                <td width="70%">'.$row['email'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Password</label></td>
                <td width="70%">'.$row['password'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Mata Kuliah</label></td>
                <td width="70%">'.$row['Mata_kuliah'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Alamat</label></td>
                <td width="70%">'.$row['alamat'].'</td>
            </tr>';
    }
    $output .= "</table></div>";
    echo $output;

}

?>