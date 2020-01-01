<?php 
    include "koneksi.php";
    $query = "SELECT * FROM dosen";
    $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>

<head>

    <title>Document</title>
</head>

<body>
    <br /> <br />
    <div class="container" style="width: 700px">
        <h3 align="center"> Data Dosen </h3>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="70%">Nama Dosen</th>
                    <th width="30%">Lihat</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <td><input type="button" value="Lihat" name="view" id="<?php echo $row['nidn'] ?>" class="btn btn-info btn-xs view_data"></td>
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
                <h4 class="modal-title">Detail Dosen</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="dosen_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="modal fade" id="add_data_Modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="insert_form">
                    <div class="form-group">
                        <label>NIDN</label>
                        <input type="text" class="form-control" id="nidn" name="nidn">
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah </label>
                        <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" style="float: right" id="insert" name="insert" Value="Insert">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</div>


<script>
    $(document).ready(function () {
        $('.view_data').click(function(){
            var nidn_dosen = $(this).attr("id");
            
            $.ajax({
                url: "dosen/select.php",
                method: "post",
                data:{nidn_dosen:nidn_dosen},
                success:function(data){
                    $('#dosen_detail').html(data);
                    $('#dataModal').modal('show');
                }

            })
            
        })
    })
</script>