<?php
    include "koneksi.php";

    if(isset($_POST["id_matkul"]))
{
    $output = '';
    $query = "SELECT * FROM matkul WHERE id_matkul = '".$_POST["id_matkul"]."'";
    $result = mysqli_query($koneksi , $query);
    $output .= '
    <div class="table-responsive">
        <table class="table table-bordered"> ';
    
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td width="30%"><label>ID</label></td>
                <td width="70%">'.$row['id_matkul'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>Nama</label></td>
                <td width="70%">'.$row['nama_matkul'].'</td>
            </tr>
            <tr>
                <td width="30%"><label>NIDN</label></td>
                <td width="70%">'.$row['nidn'].'</td>
            </tr>
            
            <tr>
                <td width="30%"><label>Semester</label></td>
                <td width="70%">'.$row['semester'].'</td>
            </tr>';
    }
    $output .= "</table></div>";
    echo $output;

}

?>