<?php
session_start();
require '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT permintaan.id_permintaan, permintaan.tgl_permintaan, permintaan.status, permintaan.kode_brg, permintaan.jumlah, barang.nama_barang, divisi FROM permintaan INNER JOIN barang ON permintaan.kode_brg = barang.kode_brg WHERE id_permintaan = $id ");
    if (mysqli_num_rows($query)) {
        $row2 = mysqli_fetch_assoc($query);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>

<body class="bg-gray-100">

    <?php include '../../partials/sidebar.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14">
            <div class="flex w-full">
                <div class="w-full">
                    <div class="border text-gray-700 shadow-md rounded-lg">
                        <div class="w-full text-center text-white uppercase text-2xl font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Edit Data Permintaan</div>
                        <form method="post" action="edit-proses.php" class="sm:px-40 sm:py-20 px-12 py-10">
                            <input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">
                            <input type="hidden" name="tgl_permintaan" value="<?= $row2['tgl_permintaan']; ?>">
                            <div class="grid sm:grid-cols-2 sm:gap-10 gap-5">
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="divisi" class="block mb-2 font-semibold sm:text-end">Divisi</label>
                                    <input type="text" id="divisi" name="divisi" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10 bg-gray-200" value="<?= $row2['divisi'] ?>" readonly>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="nama_barang" class="block mb-2 font-semibold sm:text-end">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10 bg-gray-200" value="<?= $row2['nama_barang']  ?>" readonly>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="jumlah" class="block mb-2 font-semibold sm:text-end">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" value="<?= $row2['jumlah']  ?>" required>
                                </div>
                                <div class="flex gap-4 sm:justify-self-end">
                                    <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer" type="submit" name="update" value="Update">
                                    <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer" type="reset" value="Batal">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>