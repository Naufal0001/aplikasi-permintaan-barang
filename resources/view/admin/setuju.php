<?php  

require '../../../functions/connection.php';

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$tanggal = date('Y-m-d');
		
		$query1 = mysqli_query($conn, "UPDATE permintaan SET status = 1 WHERE id_permintaan = '$id'");		

		$query2 = mysqli_query($conn, "SELECT * FROM permintaan WHERE id_permintaan = '$id'");
		
		$row = mysqli_fetch_assoc($query2);

		$query3 = mysqli_query($conn, "INSERT INTO pengeluaran (divisi, kode_brg, jumlah, tgl_keluar)
											VALUES ('$row[divisi]', '$row[kode_brg]', '$row[jumlah]', '$tanggal' ) ");

		if($query3) {
			// header("location:detail-permintaan.php?tgl=$tgl&divisi=$divisi");
			header("location:data-permintaan.php");
		} else {
			echo "ada yang salah" . mysqli_error($conn);
		}
	}


?>