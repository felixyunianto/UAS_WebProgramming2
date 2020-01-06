<?php
    include "koneksi.php";

    if(!empty($_POST)){

        $output = '';
        $message = '';
        $id = mysqli_real_escape_string($koneksi, $_POST['id_matkul']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $nidn = mysqli_real_escape_string($koneksi, $_POST['nidn']);
        $semester = mysqli_real_escape_string($koneksi, $_POST['semester']);
        
        $undeleted = 'undeleted';

        if($id !== ""){
            $query = "UPDATE matkul 
            SET nama_matkul='$nama',
            nidn='$nidn',
            semester='$semester',
            status='$undeleted'
            WHERE id_matkul='$id'";
            $message = "Data telah diubah";
            $query_log = "INSERT INTO log_aktivitas VALUES('$time','Update Mata Kuliah $nama.','Administrator')";
        }else {
            $query = "INSERT INTO matkul (id_matkul, nama_matkul,nidn, semester, status) 
                VALUES (NULL,'$nama','$nidn','$semester','$undeleted')";
                $message = "Data telah ditambahkan!";
                $query_log = "INSERT INTO log_aktivitas VALUES('$time','Tambah Mata Kuliah $nama.','Administrator')";

                
        }
        

                if(mysqli_query($koneksi, $query))
                {
                    mysqli_query($koneksi, $query_log);
                    $output .= '<label class="text-success">'.$message.'</label>';
                    $select_query = "SELECT * FROM matkul WHERE status='undeleted' ORDER BY id_matkul DESC";
                    $result = mysqli_query($koneksi, $select_query);
                    $output .= '
                    <table class="table table-bordered">
                    <tr>
                        <th width="55%">Nama Dosen</th>
                        
                        <th width="15%">Lihat</th>
                    </tr>
                    '; 
                    while($row = mysqli_fetch_array($result)){
                        $output .= '
                            <tr>
                                <td>'.$row["nama_matkul"].'</td>
                                <td><input type="button" value="Lihat" name="view" id="'.$row['id_matkul'].'"
                                    class="btn btn-info btn-xs view_data"></td>
                            </tr>
                        ';
                    }
                    $output .= '</table>';
                }
                echo $output;
    }


?>