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
        <table class="table table-striped table-hover" id="table-mahasiswa">
            <thead class="thead-dark">
                <th style="text-align:center">ID Mata Kuliah</th>
                <th style="text-align:center">Nama Mata Kuliah</th>
                <th style="text-align:center">NIDN</th>
                <th style="text-align:center">Semester</th>
            </thead>
            <tbody id="barisData">

            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $.ajax({
            type: "GET",
            data: "",
            url: "./matakuliah/ambilData.php",
            success: function (result) {
                var objResult = JSON.parse(result);
                $.each(objResult, function (key, val) {
                    var barisBaru = $("<tr>");
                    barisBaru.html("<td style='text-align: center'>" + val.id_matkul +
                        "</td><td style='text-align: center'>" + val.nama_matkul +
                        "</td><td style='text-align: center'>" + val.nidn +
                        "</td><td style='text-align: center'>" + val.semester +
                        "</td>");
                    var dataHandler = $("#barisData");
                    dataHandler.append(barisBaru);
                })
            }
        });
    </script>

</body>

</html>