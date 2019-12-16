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

    <!-- <form action="tambahdata.php" method="POST"> -->
        <table class="table" id="tableAbsen">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">NIM</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Absen</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from mahasiswa");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td class="customerIDCell" style="text-align: center;"><?php echo $no++; ?></td>
                    <td style="text-align: center;"  ><?php echo $d['nim']; ?></td>
                    <td style="text-align: center;"><?php echo $d['nama']; ?></td>
                    <!-- <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                    </td> -->
                    <td><button class="btn">ABSEN</button></td>
                </tr>
                <?php 
		}
		?>
            </tbody>
        </table>


    <script type="text/javascript">
        $('.table tbody').on('click','.btn', function(){
            var currow = $(this).closest('tr');
            var col1= currow.find('td:eq(0)').text();
            var col2= currow.find('td:eq(1)').text();
            var col3= currow.find('td:eq(2)').text();

            var result = col1+'\n'+col2+'\n'+col3;
            alert(result);
        });
        
    </script>
</body>

</html>