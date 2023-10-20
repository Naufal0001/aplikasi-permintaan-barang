<?php
session_start();
require '../../../functions/functions.php';
require '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
} elseif ($_SESSION["level"] == "admin") {
    header("Location:../admin/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Permintaan Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-gray-100">

    <?php include '../../partials/sidebar.php' ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <section class="">
                <div class="mx-auto max-w-screen-xl">
                    <!-- Start coding here -->
                    <div class="bg-white relative shadow-md rounded-lg overflow-hidden">
                        <div class="overflow-x-auto p-4">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Volume</th>
                                        <th>Sisa</th>
                                        <th>Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    $datas = mysqli_query($conn, "SELECT * FROM barang");
                                    foreach ($datas as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= indoDate($data['tgl_masuk']) ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= $data['satuan'] ?></td>
                                        <td><?= $data['volume'] ?></td>
                                        <td><?= $data['sisa'] ?></td>
                                        <td><?= $data['keluar'] ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>