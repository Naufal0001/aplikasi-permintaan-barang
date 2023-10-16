<?php 

include '../../../functions/connection.php';

$kode_brg = $_POST["kode_brg"];

$query = mysqli_query($conn, "SELECT * FROM barang WHERE kode_brg = '$kode_brg'");

if (mysqli_num_rows($query)) {
    $row = mysqli_fetch_assoc($query);
    echo $row['volume'];
}

?>