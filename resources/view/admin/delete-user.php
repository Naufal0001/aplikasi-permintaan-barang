<?php 

require '../../../functions/functions.php';
require '../../../functions/connection.php';

$id = $_GET["id"];

if ( deleteUser($id) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'data-user.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'data-user.php';
        </script>";
}
