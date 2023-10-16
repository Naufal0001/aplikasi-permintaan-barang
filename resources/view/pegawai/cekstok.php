<?php 

include '../../../functions/connection.php';

$kode_brg = $_GET['kode_brg'];
$jumlah = $_GET['jumlah'];
	
	$query = mysqli_query($conn,"SELECT * FROM barang WHERE kode_brg ='$kode_brg' ");
     
	 
    	$row = mysqli_fetch_assoc($query);
    	if ($jumlah > $row['volume']){
    	$data = array(
	            'hasil' =>  1,
	            'pesan' => 'Permintaan Melebihi Persediaan Stok'
	             );
	 			echo json_encode($data);
		}
