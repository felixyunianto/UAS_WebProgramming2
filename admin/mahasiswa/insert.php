<?php
    include "koneksi.php";

    if(!empty($_POST)){

        $output = '';
        $message = '';
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim_mahasiswa']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $semester = mysqli_real_escape_string($koneksi, $_POST['semester']);
        $undeleted = 'undeleted';

        if($nim !== ""){
            $query = "UPDATE mahasiswa 
            SET nama='$nama',
            kelas='$kelas',
            email='$email',
            password='$password',
            no_hp='$no_hp',
            alamat='$alamat',
            semester='$semester',
            deleted='$undeleted'
            WHERE nim='$nim'";
            $message = "Data telah diubah";
        }else {
            $query = "INSERT INTO mahasiswa (nim, nama,kelas, email, password, no_hp, alamat,semester, deleted) 
                VALUES (NULL,'$nama','$kelas','$email','$password','$no_hp','$alamat','$semester','$undeleted')";
                $message = "Data telah ditambahkan!";
        }
        

                if(mysqli_query($koneksi, $query))
                {
                    $output .= '<label class="text-success">'.$message.'</label>';
                    $select_query = "SELECT * FROM mahasiswa WHERE status='undeleted' ORDER BY nim DESC";
                    $result = mysqli_query($koneksi, $select_query);
                    $output .= '
                    <table class="table table-bordered">
                    <tr>
                        <th width="55%">Nama Dosen</th>
                        <th width="15%">Edit</th>
                        <th width="15%">Lihat</th>
                    </tr>
                    '; 
                    while($row = mysqli_fetch_array($result)){
                        $output .= '
                            <tr>
                                <td>'.$row["nama"].'</td>
                                <td><input type="button" value="Edit" name="edit" id="'.$row['nim'].'"
                            class="btn btn-info btn-xs edit_data"></td>
                                <td><input type="button" value="Lihat" name="view" id="'.$row['nim'].'"
                                    class="btn btn-info btn-xs view_data"></td>
                            </tr>
                        ';
                    }
                    $output .= '</table>';
                }
                echo $output;
    }


?>