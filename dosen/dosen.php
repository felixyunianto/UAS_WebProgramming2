<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="row">
                    <?php 
                    include "../koneksi.php";

                    $nidn_dosen = $_SESSION['nidn'];
                    $query= $koneksi->query("SELECT * FROM matkul where nidn='$nidn_dosen'");
                    while($row=$query->fetch_assoc()){
                ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Absensi
                            </div>
                            <div class="card-body">

                                <h5 class="card-title">
                                    <?php
                                        echo $row['nama_matkul'];
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <?php
                                    echo 'Semester &nbsp;'.$row['semester'];
                            ?>
                                </p>
                                <a href="index.php?page=absensi" class="btn btn-primary">Absen</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
</body>
</html>