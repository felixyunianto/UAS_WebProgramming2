<?php
    include "koneksi.php";

    if(isset($_POST["nim_mahasiswa"]))
{
    $output = '';
    $query = "SELECT * FROM mahasiswa WHERE nim = '".$_POST["nim_mahasiswa"]."'";
    $result = mysqli_query($koneksi , $query);
    $output .= '
    <div class="table-responsive">
        <table class="table table-bordered"> ';
    
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td width="30%"><label>NIM</label></td>
                <td width="70%">'.$row['nim'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Nama</label></td>
                <td width="70%">'.$row['nama'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Kelas</label></td>
                <td width="70%">'.$row['kelas'].'</td>
            </tr>
            
            <tr>
                <td width="30%"><label>Email</label></td>
                <td width="70%">'.$row['email'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>No Handphone</label></td>
                <td width="70%">'.$row['no_hp'].'</td>
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