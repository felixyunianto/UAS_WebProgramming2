<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="jumbotron">
            <h1 class="display-7" style="text-align:center">Tambah Data</h1>
            <hr>
            <center><strong><p style="color: red; font-size:20px" id="pesan"></p></strong></center>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <label for="">NIM</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nim">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-1">
                    <label for="">No.Hp</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="no_hp">
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <label for="">Nama</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-1">
                    <label for="">Alamat</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <label for="">Kelas</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-1">
                    <label for="">Semester </label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="semester">
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <label for="">Email</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- <center>
                <table>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" style="width: 250px" name="nim"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td></td>
                        <td>No Handphone</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" style="width: 250px" name="no_hp"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="nama"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="alamat"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="kelas"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="semester"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="emails"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><button style="margin:5px; width: 180px" onclick="tambahData()" class="btn btn-primary">SIMPAN</button></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </center> -->
            <center><button onclick="tambahData()" class="btn btn-primary">SIMPAN</button></center>

        </div>

        <!-- Form TAMBAH DATA -->


        <!-- END Form TAMBAH DATA -->

        <table class="table table-striped table-hover" id="table-mahasiswa">
            <thead class="thead-dark">
                <th style="text-align:center">NIM</th>
                <th style="text-align:center">Nama</th>
                <th style="text-align:center">Kelas</th>
                <th style="text-align:center">Email</th>
                <th style="text-align:center">No handphone</th>
                <th style="text-align:center">Alamat</th>
                <th style="text-align:center">Semester</th>
            </thead>
            <tbody id="barisData">

            </tbody>
        </table>

    </div>

    <script type="text/javascript">
        function tambahData() {
            var nim = $("[name='nim']").val();
            var nama = $("[name='nama']").val();
            var kelas = $("[name='kelas']").val();
            var email = $("[name='email']").val();
            var no_hp = $("[name='no_hp']").val();
            var alamat = $("[name='alamat']").val();
            var semester = $("[name='semester']").val();

            $.ajax({
                type: "POST",
                data: "nim=" + nim + "&nama=" + nama + "&kelas=" + kelas + "&email=" + email + "&no_hp=" +
                    no_hp + "&alamat=" + alamat + "&semester=" + semester,
                url: "./mahasiswa/tambahdata.php",
                success: function (result) {
                    var objResult=JSON.parse(result);
                    $("#pesan").html(objResult.pesan);
                }
            });
        }


        $.ajax({
            type: "GET",
            data: "",
            url: "./mahasiswa/ambilData.php",
            success: function (result) {
                var objResult = JSON.parse(result);
                $.each(objResult, function (key, val) {
                    var barisBaru = $("<tr>");
                    barisBaru.html("<td style='text-align: center'>" + val.nim +
                        "</td><td style='text-align: center'>" + val.nama +
                        "</td><td style='text-align: center'>" + val
                        .kelas + "</td><td style='text-align: center'>" + val.email +
                        "</td><td style='text-align: center'>" + val.no_hp +
                        "</td><td style='text-align: center'>" + val.alamat +
                        "</td><td style='text-align: center'>" + val.semester + "</td>");
                    var dataHandler = $("#barisData");
                    dataHandler.append(barisBaru);
                })
            }
        });
    </script>

</body>

</html>