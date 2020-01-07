<?php

include "koneksi.php";
if(isset($_POST["nidn_dosen"]))
{
    $output = '';
    $deleted = 'deleted';
    $query = "UPDATE dosen SET status='$deleted' WHERE nidn = '".$_POST["nidn_dosen"]."'";
    $result = mysqli_query($koneksi , $query);
    date_default_timezone_set("Asia/Jakarta");
    $time = date('Y-m-d H:i:s');
    $query_log = "INSERT INTO log_aktivitas VALUES('$time','Hapus Dosen $nim.','Administrator')";
    if($result){
        mysqli_query($koneksi, $query_log);
        $output .= '<label class="text-success">'.$message.'</label>';
            $select_query = "SELECT * FROM dosen ORDER BY nidn DESC";
            $result = mysqli_query($koneksi, $select_query);
            $output .= '
            <table class="table table-bordered">
            <tr>
                <th width="55%">Nama Dosen</th>
                <th width="15%">Edit</th>
                <th width="15%">Hapus</th>
                <th width="15%">Lihat</th>
            </tr>
            '; 
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td>'.$row["nama"].'</td>
                        <td><input type="button" value="Edit" name="edit" id="'.$row['nidn'].'"
                            class="btn btn-info btn-xs edit_data"></td>
                        <td><input type="button" value="Hapus" name="hapus" id="'.$row['nidn'].'"
                            class="btn btn-info btn-xs hapus_data"></td>
                        <td><input type="button" value="Lihat" name="view" id="'.$row['nidn'].'"
                            class="btn btn-info btn-xs view_data"></td>
                    </tr>
                ';
            }
            $output .= '</table>';
    }

}

?>