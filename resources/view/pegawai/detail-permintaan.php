<?php  
session_start();
include '../../../functions/functions.php';
include '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
} elseif ($_SESSION["level"] == "admin") {
    header("Location:../admin/index.php");
    exit;
}

    if (isset($_GET['tgl'])) {
        $tgl = $_GET['tgl'];
        $query = mysqli_query($conn, "SELECT permintaan.id_permintaan, permintaan.kode_brg, nama_barang, jumlah, satuan, status, perihal, keterangan FROM permintaan INNER JOIN barang ON permintaan.kode_brg = barang.kode_brg  WHERE tgl_permintaan = '$tgl' AND divisi = '$_SESSION[login]'");
               
    }

    if(isset($_GET['aksi']) && isset($_GET['id'])) {
        $aksi = $_GET['aksi'];
        $id = $_GET['id'];
        if ($aksi == 'hapus') {
            $query2 = mysqli_query($conn, "DELETE FROM permintaan WHERE id_permintaan='$id' ");
            if ($query2) {
                header("location:detail-permintaan.php?tgl=".$tgl);
            } else {
                echo 'gagal wir';
            }
        }
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
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-gray-100">

    <?php include '../../partials/sidebar.php' ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="mx-auto max-w-screen-xl">
                <!-- Start coding here -->
                <div class="bg-white relative shadow-md rounded-lg overflow-hidden">
                    <h2 class="text-2xl text-center font-medium my-4">Data Permintaan Barang Tanggal <?= indoDate($tgl) ?></h2>
                    <div class="overflow-x-auto p-4">
                        <div class="flex mb-4">
                            <a href="data-permintaan.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2"><i class='fa fa-backward mr-2'></i>Kembali</a>
                        </div>
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Perihal</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($query)) :
                                    while ($row = mysqli_fetch_assoc($query)) :
                                ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['kode_brg'] ?></td>
                                            <td><?= $row['perihal'] ?></td>
                                            <td><?= $row['nama_barang'] ?></td>
                                            <td><?= $row['satuan'] ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?php
                                                if ($row['status'] == 0) : ?>
                                                    <span class="text-[#FFA200]">Menunggu Persetujuan</span>
                                                <?php elseif ($row['status'] == 1) : ?>
                                                    <span class="text-[#4000FF]">Telah Disetujui</span>
                                                <?php else : ?>
                                                    <span class='text-[#FF0000]'>Tidak Disetujui</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="detail-permintaan.php?aksi=hapus&id=<?= $row['id_permintaan']; ?>&tgl=<?= $tgl; ?>"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button></span></a></td>
                                        </tr>
                                    <?php $no++;
                                    endwhile;
                                else : ?>

                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
