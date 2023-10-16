<?php  

include '../../../functions/functions.php';
include '../../../functions/connection.php';

	$tgl = date('Y-m-d');

	if(mysqli_query($conn, "INSERT INTO permintaan SELECT * FROM sementara")){
		mysqli_query($conn, "DELETE FROM sementara WHERE tgl_permintaan='$tgl'");
		header("Location:data-permintaan.php");
	} else {
		echo "gagal wir" . mysqli_error($conn);
	}


?>