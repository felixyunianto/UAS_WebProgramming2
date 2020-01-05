<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];




// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
$admin = mysqli_fetch_array($data);

$data2 = mysqli_query($koneksi, "select * from mahasiswa where nim='$username' and nim='$password'" );
$mahasiswa = mysqli_fetch_array($data2);
$data3 = mysqli_query($koneksi, "select * from dosen where nidn='$username'and password='$password'");
$dosen = mysqli_fetch_array($data3);
$data4 = mysqli_query($koneksi, "select * from matkul");
$matkul = mysqli_fetch_array($data4);
// menghitung jumlah data yang ditemukan

if(mysqli_num_rows($data) == 1 ){
	date_default_timezone_set("Asia/Jakarta");
	$time = date('Y-m-d H:i:s');
	$query_admin = "INSERT INTO log_aktivitas VALUES('.$time.','Login','".$_SESSION['nama']."')";
	$_SESSION['id']= $admin['id'];
	$_SESSION['username'] = $admin['username'];
	$_SESSION['password'] = $admin['password'];
	$_SESSION['nama'] = $admin['nama'];
	$_SESSION['status'] = "login";
	$masuk1 = header('location:admin/index.php');
	if($masuk1){
		while($record = mysqli_fetch_array($admin)){
			
		}
	}
	
}else{
	if(mysqli_num_rows($data2)==1){
			$_SESSION['nim']= $mahasiswa['nim'];
			$_SESSION['nama'] = $mahasiswa['nama'];
			$_SESSION['kelas'] = $mahasiswa['kelas'];
			$_SESSION['email'] = $mahasiswa['email'];
			$_SESSION['no_hp'] = $mahasiswa['no_hp'];
			$_SESSION['alamat'] = $mahasiswa['alamat']; 
			$_SESSION['nama_matkul']= $matkul['nama_matkul'];
			$_SESSION['semester'] = $mahasiswa['semester'];
			$_SESSION['status'] = "login";
			header('location:mahasiswa/index.php');
		}else if(mysqli_num_rows($data3) == 1){
			$_SESSION['nim'] = $mahasiswa['nim'];
			$_SESSION['nidn'] = $dosen['nidn'];
			$_SESSION['nama'] = $dosen['nama'];
			$_SESSION['status'] = "login";
			header('location:dosen/index.php');
		}else{
			header("location:index.php?pesan=gagal");
		}
}

?>