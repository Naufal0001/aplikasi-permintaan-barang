<?php  

require '../../../functions/connection.php';

if(isset($_POST['update'])) {
	
	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_barang'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$satuan = $_POST['satuan'];
	$stok = $_POST['volume'];

	

	$query = mysqli_query($conn, "UPDATE barang SET nama_barang = '$nama_brg', tgl_masuk = '$tgl_masuk', satuan = '$satuan', volume = '$stok', sisa = volume - keluar WHERE kode_brg = '$kode_brg' ");

	if ($query) {
		header("location:data-barang.php");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>