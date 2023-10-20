<?php  

include '../../../functions/functions.php';
include '../../../functions/connection.php';

	if(isset($_POST['simpan'])) {

		$divisi = $_POST['divisi'];
		$perihal = $_POST['perihal'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];
		$tgl_pemesanan = date('Y-m-d');
		$keterangan = $_POST['keterangan'];
		$pengaju = $_POST['pengaju'];

		$hasil = mysqli_query($conn, "INSERT INTO sementara (divisi, perihal, kode_brg, jumlah, tgl_permintaan, keterangan, pengaju) VALUES ('$divisi', '$perihal', '$kode_brg', '$jumlah', '$tgl_pemesanan', '$keterangan', '$pengaju')");

		if ($hasil) {
			header("location:tambah-permintaan.php");
		} else {
			die("ada kesalahan : " . mysqli_error($conn));
		}
	}
