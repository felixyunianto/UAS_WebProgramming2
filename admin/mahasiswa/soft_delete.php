<?php

include "koneksi.php";
if(isset($_POST["nim_mahasiswa"]))
{
    $output = '';
    $deleted = 'deleted';
    $query = "UPDATE mahasiswa SET deleted='$deleted' WHERE nim = '".$_POST["nim_mahasiswa"]."'";
    $nim = $_POST['nim_mahasiswa'];
    $result = mysqli_query($koneksi , $query);
    date_default_timezone_set("Asia/Jakarta");
    $time = date('Y-m-d H:i:s');
    $query_log = "INSERT INTO log_aktivitas VALUES('$time','Hapus Mahasiswa $nim','Administrator')";
    if($result){
        mysqli_query($koneksi, $query_log);
        $output .= '<label class="text-success">'.$message.'</label>';
            $select_query = "SELECT * FROM mahasiswa ORDER BY nim DESC";
            $result = mysqli_query($koneksi, $select_query);
            $output .= '
            <table class="table table-bordered">
            <tr>
                <th width="55%">Nama Mahasiswa</th>
                <th width="15%">Edit</th>
                <th width="15%">Hapus</th>
                <th width="15%">Lihat</th>
            </tr>
            '; 
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td>'.$row["nama"].'</td>
                        <td><input type="button" value="Edit" name="edit" id="'.$row['nim'].'"
                            class="btn btn-info btn-xs edit_data"></td>
                        <td><input type="button" value="Hapus" name="hapus" id="'.$row['nim'].'"
                            class="btn btn-info btn-xs hapus_data"></td>
                        <td><input type="button" value="Lihat" name="view" id="'.$row['nim'].'"
                            class="btn btn-info btn-xs view_data"></td>
                    </tr>
                ';
            }
            $output .= '</table>';
    }

}

?>