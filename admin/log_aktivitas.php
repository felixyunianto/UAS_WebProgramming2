<?php 
    include "../koneksi.php";
    $query = "SELECT * FROM log_aktivitas";
    $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<div class="container" style="width: 700px">
        <!-- <button data-toggle="modal" data-target="#restore_modal">Restore</button> -->
        <h3 align="center"> Log Aktivitas </h3>
        <br/>
        <!-- <button style="float:right" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs"> Tambah </button> -->
        <br/><br/>
        <div class="table-responsive" id="mahasiswa_table">
        
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama Matkul</th>
                    <th width="30%">Proses</th>
                    <th width="40%">Nama User</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['waktu'] ?></td>
                    <td><?php echo $row['proses'] ?></td>
                    <td><?php echo $row['nama_user'] ?></td>
                    

                </tr>
                <?php        
                    }
                ?>
            </table>
        </div>
    </div>


</body>

</html>