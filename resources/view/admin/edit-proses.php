<?php  
		
    require '../../../functions/connection.php';

	if(isset($_POST['update'])){
		$divisi = $_POST['divisi'];
		$tgl_permintaan = $_POST['tgl_permintaan'];
		$id = $_POST['id'];
		$jumlah = $_POST['jumlah'];
		
		$query = mysqli_query($conn, "UPDATE permintaan SET jumlah = '$jumlah' WHERE id_permintaan = '$id' ");

		if($query) {
			header("location:detail-permintaan.php?divisi=$divisi&tgl=$tgl_permintaan");
		} else {
			echo 'gagal';
		}
		
	}

?>