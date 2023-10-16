<?php  

include '../../../functions/functions.php';
include '../../../functions/connection.php';

	if(isset($_POST['simpan'])) {

		$divisi = $_POST['divisi'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];
		$tgl_pemesanan = date('Y-m-d');
		$pengaju = $_POST['pengaju'];

		$hasil = mysqli_query($conn, "INSERT INTO sementara (divisi, kode_brg, jumlah, tgl_permintaan, pengaju) VALUES ('$divisi', '$kode_brg', '$jumlah', '$tgl_pemesanan', '$pengaju')");

		if ($hasil) {
			header("location:tambah-permintaan.php");
		} else {
			die("ada kesalahan : " . mysqli_error($conn));
		}
	}
