<?php 

require '../../../functions/functions.php';
require '../../../functions/connection.php';

$id = $_GET["kode_brg"];

if ( deleteBarang($id) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'data-barang.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'data-barang.php';
        </script>";
}
