<!DOCTYPE html>
<html>

<head>
	<title>Absensi Mahasiswa || PHB</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
	<link href="./assets/css/themes/lite-purple.min.css" rel="stylesheet" />
	<link href="./assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
	<script src="./assets/js/plugins/jquery-3.3.1.min.js"></script>
	<link rel="shortcut icon" href="./assets/images/logo-poltek.png" type="image/x-icon">
</head>

<body style="background: url(./assets/images/background.jpg); background-size:cover; background-size: 100%">
	<br />
	<!-- cek pesan notifikasi -->
	
	<br />
	<br />
	<!--  -->
	<center>
		<div style="margin: 0 auto; width: 800px">
			<div class="card mb-3" style="max-width: 400px; height: 300px; margin-top: 120px; opacity: 80%">
				<div class="card-header" style="font-size: 25px"><b>Sign In</b></div>
				<div class="card-body">
				<?php 
				include "koneksi.php";
	if(isset($_GET['pesan'])){


		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "<p style='color:red' >Logout Berhasil!</p>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
					<form method="post" action="cek_login.php">

						<input class="form-control" style="height: 40px; margin-bottom: 10px" type="text"
							name="username" placeholder="Masukkan username">
						<input class="form-control" style="height: 40px; margin-bottom: 10px" type="password"
							name="password" placeholder="Masukkan password">
						<a style="color: blue; float: right" href="forget.php">Forgot Password ?</a><br>
						<input type="submit" value="LOGIN" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</center>




	<script src="./assets/js/plugins/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="./assets/js/scripts/script.min.js"></script>
	<script src="./assets/js/scripts/sidebar.large.script.min.js"></script>
	<script src="./assets/js/plugins/echarts.min.js"></script>
	<script src="./assets/js/scripts/echart.options.min.js"></script>
	<script src="./assets/js/scripts/dashboard.v1.script.min.js"></script>
	<script src="./assets/js/scripts/customizer.script.min.js"></script>
</body>

</html>