<?php

include "koneksi.php";
if(isset($_POST["id_matkul"]))
{
    $output = '';
    $deleted = 'deleted';
    $query = "UPDATE matkul SET status='$deleted' WHERE id_matkul = '".$_POST["id_matkul"]."'";
    $result = mysqli_query($koneksi , $query);
    date_default_timezone_set("Asia/Jakarta");
    $time = date('Y-m-d H:i:s');
    $query_log = "INSERT INTO log_aktivitas VALUES('$time','Hapus Mata Kuliah $nim.','Administrator')";
    
    if($result){
        mysqli_query($koneksi, $query_log);
        $output .= '<label class="text-success">'.$message.'</label>';
            $select_query = "SELECT * FROM matkul ORDER BY id_matkul DESC";
            $result = mysqli_query($koneksi, $select_query);
            $output .= '
            <table class="table table-bordered">
            <tr>
                <th width="55%">Nama Matkul</th>
                <th width="15%">Edit</th>
                <th width="15%">Hapus</th>
                <th width="15%">Lihat</th>
            </tr>
            '; 
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td>'.$row["nama"].'</td>
                        <td><input type="button" value="Edit" name="edit" id="'.$row['id_matkul'].'"
                            class="btn btn-info btn-xs edit_data"></td>
                        <td><input type="button" value="Hapus" name="hapus" id="'.$row['id_matkul'].'"
                            class="btn btn-info btn-xs hapus_data"></td>
                        <td><input type="button" value="Lihat" name="view" id="'.$row['id_matkul'].'"
                            class="btn btn-info btn-xs view_data"></td>
                    </tr>
                ';
            }
            $output .= '</table>';
    }

}

?>