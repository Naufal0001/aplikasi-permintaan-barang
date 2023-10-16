<?php  

include '../../../functions/connection.php';
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($conn, "DELETE FROM sementara WHERE id_sementara='$id' ");

		if($query) {
			header("Location:tambah-permintaan.php");
		}
	}


?>