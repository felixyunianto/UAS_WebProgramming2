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
                    <input type="hidden" value="<?php echo $row['id_matkul']; ?>" name="id_matkul">
                    <a href="index.php?page=absensi&id_matkul=<?php echo $row['id_matkul']; ?>" class="btn btn-primary" id="absen" value="<?php echo $row['id_matkul'] ?>" name="absen">Absen</a>

                    
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <script>
            $(document).ready(function(e){
                $('#id_matkul').on('click', function(e){
                    $.ajax({
                        type: "POST",
                        url: "index.php",
                        data: ('#id_matkul').serialize(),
                        success: function(data){
                            $('#absen').html(data); 
                        }
                    })
                    e.preventDefault();
                })
            })
    </script>
</body>

</html>