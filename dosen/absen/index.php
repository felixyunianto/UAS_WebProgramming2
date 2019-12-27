<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h2>Kelas B</h2>

    <?php 
    include '../koneksi.php';
    $nim = intval($_GET['id_matkul']);
    $data_matkul = mysqli_query($koneksi,"SELECT * from matkul where id_matkul=$nim");
    while($row_matkul = mysqli_fetch_array($data_matkul)){
    ?>
   <?php echo "<input type='hidden' value='$nim' id='id_matkul'/>";
   echo "<p style='float:right;' id='tanggal'>" . date("d/m/Y") . "</p>"; ?>
    <?php    
    }
    ?>

    <!-- <form action="tambahdata.php" method="POST"> -->
    <table class="table" id="tableAbsen">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Hadir</th>
                <!-- <th style="text-align: center;">Sakit</th>
                <th style="text-align: center;">Izin</th>
                <th style="text-align: center;">Alpha</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
                    
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from mahasiswa");
                    while($d = mysqli_fetch_array($data)){
                ?>
            <tr>
                <td class="customerIDCell" style="text-align: center;"><?php echo $no++; ?></td>
                <td style="text-align: center;"><?php echo $d['nim']; ?></td>
                <td style="text-align: center;"><?php echo $d['nama']; ?></td>
                <!-- <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                    </td> -->
                <!-- <td></td> -->
                <td style="text-align: center;">
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="Hadir">
                    </div> -->
                    <input type="button" value="Masuk" class="btn btn-warning">
                </td>
                <!-- <td style="text-align: center;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="Sakit">
                    </div>
                </td> -->
                <!-- <td style="text-align: center;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                            value="Ijin">
                    </div>
                </td> -->
                <!-- <td style="text-align: center;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4"
                            value="Alpha">
                    </div>
                </td> -->
            </tr>
            <?php 
		}
		?>
        </tbody>
    </table>
    <!-- <button class="btn">ABSEN</button> -->

    <script type="text/javascript">
        $('.table tbody').on('click', '.btn', function () {
            var id_matkul= $('#id_matkul').val();
            var currow = $(this).closest('tr');
            var col1 = currow.find('td:eq(0)').text();
            var col2 = currow.find('td:eq(1)').text();
            var col3 = currow.find('td:eq(2)').text();
            var absen = 1;
            var tanggal = $('#tanggal').text();

            var result = id_matkul + '\n' + col2 + '\n' + tanggal + "\n" + absen ;
            alert(result);

            $.ajax({
                type: "POST",
                data: "id_matkul=" + id_matkul + "&nim=" + col2 +"&status=" + absen,
                url: "absen/tambahdata.php",
                success: function(result){
                    console.log(result);
                }
            })
        });
    </script>
</body>

</html>