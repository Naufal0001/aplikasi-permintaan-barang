<?php  

require '../../../functions/connection.php';

if (isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['divisi'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];
	$divisi = $_GET['divisi'];

	$query = mysqli_query($conn, "UPDATE permintaan SET status = 2 WHERE id_permintaan = '$id' ");

	if($query) {
		header("location:detail-permintaan.php?tgl=$tgl&divisi=$divisi");
	} else {
		echo "error : " . mysqli_error($conn);
	}
}


?>