<?php
	require '../../../functions/connection.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
	    $query = mysqli_query($conn,"DELETE FROM permintaan WHERE id_permintaan = '$id' AND divisi = '$_SESSION[login]'");
	    if ($query) {
	    	header("location:data-permintaan.php");
	    } else {
	    	echo 'gagal wir';
	    }
	
	}
?>