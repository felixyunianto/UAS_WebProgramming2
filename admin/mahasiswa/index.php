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
        <button data-toggle="modal" data-target="#restore_modal">Restore</button>
        <h3 align="center"> Data Mahasiswa </h3>
        <br />
        <button style="float:right" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal"
            class="btn btn-info btn-xs"> Tambah </button>
        <br /><br />
        <div class="table-responsive" id="mahasiswa_table">
            <table class="table table-bordered">
                <tr>
                    <th width="55%">Nama Mahasiswa</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Hapus</th>
                    <th width="15%">Lihat</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <td><input type="button" value="Edit" name="edit" id="<?php echo $row['nim'] ?>"
                            class="btn btn-info btn-xs edit_data"></td>
                    <td><input type="button" value="Hapus" name="hapus" id="<?php echo $row['nim'] ?>"
                            class="btn btn-info btn-xs hapus_data"></td>
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
<div class="modal fade" id="restore_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Delete</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                 <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $deleted = 'deleted'; 
                        $query_delete = "SELECT * FROM mahasiswa WHERE deleted='deleted'";
                        $hasil = mysqli_query($koneksi,$query_delete);
                        while($h = mysqli_fetch_array($hasil))
                        {
                        ?>
                        <tr>
                            <td><?php echo $h['nama']; ?></td>
                            <td><button id="<?php echo $h['nim'] ?>"
                                    class="btn btn-info btn-xs btn_restore">RESTORE</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
<div class="modal fade" id="add_data_Modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="insert_form">

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">No Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="text" class="form-control" id="semester" name="semester">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nim_mahasiswa" id="nim_mahasiswa">
                        <input type="submit" style="float:right;" id="insert" name="insert" value="Tambah"
                            class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });

        $('.view_data').click(function () {
            var nim_mahasiswa = $(this).attr("id");

            $.ajax({
                url: "mahasiswa/select.php",
                method: "POST",
                data: {
                    nim_mahasiswa: nim_mahasiswa
                },
                success: function (data) {
                    $('#mahasiswa_detail').html(data)
                    $('#dataModal').modal('show')
                }
            })
        })

        $(document).on('click', '.edit_data', function () {
            var nim_mahasiswa = $(this).attr("id");

            $.ajax({
                url: "mahasiswa/fetch.php",
                method: "POST",
                data: {
                    nim_mahasiswa: nim_mahasiswa
                },
                dataType: "json",
                success: function (data) {
                    $('#nama').val(data.nama);
                    $('#kelas').val(data.kelas);
                    $('#email').val(data.email);
                    $('#password').val(data.password);
                    $('#no_hp').val(data.no_hp);
                    $('#alamat').val(data.alamat);
                    $('#semester').val(data.semester);
                    $('#nim_mahasiswa').val(data.nim);
                    $('#insert').val("EDIT");
                    $('#add_data_Modal').modal("show")
                }
            })
        })

        $('#insert_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#nama').val() == '') {
                alert("Nama tidak boleh kosong!")
            } else if ($('#kelas').val() == '') {
                alert("Kelas tidak boleh kosong!")
            } else if ($('#email').val() == '') {
                alert("Email tidak boleh kosong!")
            } else if ($('#password').val() == '') {
                alert("Password tidak boleh kosong!")
            } else if ($('#no_hp').val() == '') {
                alert("No Handphone tidak boleh kosong!")
            } else if ($('#alamat').val() == '') {
                alert("Alamat tidak boleh kosong!")
            } else if ($("#semester").val() == '') {
                alert("Semester tidak boleh kosong!")
            } else {
                $.ajax({
                    url: "mahasiswa/insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    success: function (data) {
                        $('#insert_form')[0].reset()
                        $('#add_data_Modal').modal('hide')
                        $('#mahasiswa_table').html(data)
                        location.reload(true)
                    }
                })
            }
        })
        $('.hapus_data').click(function () {
            var nim_mahasiswa = $(this).attr("id");

            $.ajax({
                url: "mahasiswa/soft_delete.php",
                method: "POST",
                data: {
                    nim_mahasiswa: nim_mahasiswa
                },
                success: function () {
                    alert("Data Berhasil dihapus")
                    location.reload(true)
                }
            })
        })

        $('.btn_restore').click(function () {
            var nim_mahasiswa = $(this).attr("id");

            $.ajax({
                url: "mahasiswa/restore.php",
                method: "POST",
                data: {
                    nim_mahasiswa: nim_mahasiswa
                },
                success: function () {
                    alert("Data Berhasil dikembalikan")
                    location.reload(true)
                }
            })
        })

    })
</script>