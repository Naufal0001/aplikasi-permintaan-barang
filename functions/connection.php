<?php 

$conn = mysqli_connect('localhost', 'root', '', 'permintaan_barang');

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

?>