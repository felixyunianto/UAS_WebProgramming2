<?php 
    include "../koneksi.php";
    $query = "SELECT * FROM absen ORDER BY id_absen DESC";
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
        <h3 align="center"> Absensi </h3>
        <br/>
        
        <br/><br/>
        <div class="table-responsive" id="">
            <table class="table table-bordered">
                <tr>
                    <th width="55%">Absensi</th>
                    <th width="15%">Lihat</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['nim'] ?></td>
                    
                    <td><input type="button" value="Lihat" name="view" id="<?php echo $row['id_absen'] ?>"
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
                <h4 class="modal-title">Detail Dosen</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="absen_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.view_data').click(function () {
            var id_absen = $(this).attr("id");

            $.ajax({
                url: "absensi/select.php",
                method: "post",
                data: {
                    id_absen: id_absen
                },
                success: function (data) {
                    $('#absen_detail').html(data);
                    $('#dataModal').modal('show');
                }

            })

        })
})
</script>