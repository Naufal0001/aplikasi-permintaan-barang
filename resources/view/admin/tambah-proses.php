<?php  

require '../../../functions/connection.php';

	if(isset($_POST['submit'])) {

		$kode_brg = $_POST['kode_brg'];
		$nama_brg = $_POST['nama_barang'];
		$stok = $_POST['volume'];
		$satuan = $_POST['satuan'];
		$tgl_masuk = $_POST["tgl_masuk"];	

		//die($stok);
		$hasil = mysqli_query($conn, "INSERT INTO barang (kode_brg, nama_barang, volume, tgl_masuk, satuan, sisa) VALUES ('$kode_brg', '$nama_brg', '$stok', '$tgl_masuk', '$satuan', '$stok')");

		if ($hasil) {
			header("location:data-barang.php");
		} else {
			die("ada kesalahan : " . mysqli_error($conn));
		}

	}

?>