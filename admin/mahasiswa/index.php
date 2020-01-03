<?php 
    include "koneksi.php";
    $query = "SELECT * FROM mahasiswa WHERE deleted='undeleted' ORDER BY nim DESC";
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
        <h3 align="center"> Data Mahasiswa </h3>
        <br/>
        <button style="float:right" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs"> Tambah </button>
        <br/><br/>
        <div class="table-responsive" id="mahasiswa_table">
            <table class="table table-bordered">
                <tr>
                    <th width="55%">Nama Mahasiswa</th>
                    <!-- <th width="15%">Edit</th>
                    <th width="15%">Hapus</th> -->
                    <th width="15%">Lihat</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <!-- <td><input type="button" value="Edit" name="edit" id="<?php echo $row['nidn'] ?>"
                            class="btn btn-info btn-xs edit_data"></td>
                    <td><input type="button" value="Hapus" name="hapus" id="<?php echo $row['nidn'] ?>"
                            class="btn btn-info btn-xs hapus_data"></td> -->
                    <td><input type="button" value="Lihat" name="view" id="<?php echo $row['nim'] ?>"
                            class="btn btn-info btn-xs view_data"></td>

                </tr>
                <?php        
                    }
                ?>
            </table>
        </div>
    </div>


</body>

</html>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Mahasiswa</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="mahasiswa_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('.view_data').click(function(){
            var nim_mahasiswa = $(this).attr("id");

            $.ajax({
                url: "mahasiswa/select.php",
                method: "POST",
                data:{nim_mahasiswa:nim_mahasiswa},
                success: function(data){
                    $('#mahasiswa_detail').html(data)
                    $('#dataModal').modal('show')
                }
            })
        })

    })
</script>