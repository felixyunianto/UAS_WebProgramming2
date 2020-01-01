<?php
    include "koneksi.php";
    if(!empty($_POST))
    {
        $output = '';
        $nidn = $_POST['nidn'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mata_kuliah = $_POST['mata_kuliah'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO dosen (nidn,nama,email,password,mata_kuliah,alamat) VALUES ('$nidn','$nama','$email','$password','$mata_kuliah','$alamat')";

        if(mysqli_query($koneksi, $query)){
            $output .= '<label class="text-success">Data telah ditambahkan</label>';
            $select_query = "SELECT * FROM dosen ORDER BY nidn DESC";
            $result = mysqli_query($koneksi, $query);
            $output .= '
                <table class="table table-bordered">
                    <tr>
                        <td width="70%">Nama Dosen</td>
                        <td width="30%">Lihat</td>
                    </tr>
            ';
            while($row = mysqli_fetch_array($result)){
                $output = '
                <tr>
                    <td>'.$row["nama"].'</td>
                    <td>
                    <button type="button" name="view" value="'. $row['nidn'].'" id="nidn" class="btn btn-primary view_data">
                    Lihat
                    </button>
                    </td>
                </tr>
                ';
}
$output .= '</table>';
}
echo $output;

}
?>