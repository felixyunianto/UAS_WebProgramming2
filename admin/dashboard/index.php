<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="breadcrumb">
        <h1 class="mr-2">Dashboard</h1>
        
        <h1 id="time" style="margin-left:  1040px"></h1>
    </div>

    <script type="text/javascript">
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
    </script>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <!-- ICON BG-->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Boy"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Mahasiswa</p>
                        <p class="text-primary text-24 line-height-1 mb-2">
                            <?php
                                include "../koneksi.php";

                                $sql = "SELECT count(*) AS jumlah FROM mahasiswa";
                                $query = mysqli_query($koneksi, $sql);
                                $result = mysqli_fetch_array($query);
                                echo "{$result['jumlah']}";
                                

                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Business-Man"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Dosen</p>
                        <p class="text-primary text-24 line-height-1 mb-2"><?php
                                include "../koneksi.php";

                                $sql = "SELECT count(*) AS jumlah FROM dosen";
                                $query = mysqli_query($koneksi, $sql);
                                $result = mysqli_fetch_array($query);
                                echo "{$result['jumlah']}";
                                

                            ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Orders</p>
                        <p class="text-primary text-24 line-height-1 mb-2">80</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Money-2"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Expense</p>
                        <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>