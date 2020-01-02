<?php
    include "koneksi.php";

    if(!empty($_POST))
    {
        $output = '';
        $message = '';
        $nidn = mysqli_real_escape_string($koneksi, $_POST['nidn_dosen']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $mata_kuliah = mysqli_real_escape_string($koneksi, $_POST['mata_kuliah']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        
        if($_nidn !== ""){
            $query = "UPDATE dosen 
            SET nama='$nama',
            email='$email',
            password='$password',
            mata_kuliah='$mata_kuliah',
            alamat='$alamat'
            WHERE nidn='$nidn'";
            $message = "Data telah diubah";
        }else {
            $query = "INSERT INTO dosen (nidn, nama, email, password, mata_kuliah, alamat) 
                VALUES (NULL,'$nama','$email','$password','$mata_kuliah','$alamat')";
                $message = "Data telah ditambahkan!";
        }
        
        
        

        if(mysqli_query($koneksi, $query))
        {
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
        echo $output;
    }
?>