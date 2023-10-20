<?php
session_start();
require '../../../functions/functions.php';
require '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
} elseif ($_SESSION["level"] == "pegawai") {
    header("Location:../pegawai/index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT MAX(kode_brg) from barang");
    $kode_brg = mysqli_fetch_array($query);
    if ($kode_brg) {
            
            $nilaikode = substr($kode_brg[0], 2);
            
            $kode = (int) $nilaikode;

            //setiap kode ditambah 1
            $kode = $kode + 1;
            $kode_otomatis = "AK".str_pad($kode, 3, "0", STR_PAD_LEFT);                   
            
        
    } else {
         $kode_otomatis = "AK001";
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
</head>

<body class="bg-gray-100">

    <?php include '../../partials/sidebar.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14">
            <div class="flex w-full">
                <div class="w-full">
                    <div class="border text-gray-700 shadow-md rounded-lg">
                        <div class="w-full text-center text-white uppercase text-2xl font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Tambah Data Stok Barang</div>
                        <form method="post" action="tambah-proses.php" class="sm:px-40 sm:py-20 px-12 py-10">
                            <div class="grid sm:grid-cols-2 sm:gap-10 gap-5">
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="tanggal" class="block mb-2 font-semibold sm:text-end">Tanggal</label>
                                    <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" name="tgl_masuk" id="tanggal" type="text" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 sm:ml-10" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="kode_brg" class="block mb-2 font-semibold sm:text-end">Kode Barang</label>
                                    <input type="text" id="kode_brg" name="kode_brg" value="<?= $kode_otomatis; ?>" class="bg-gray-200 text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" readonly>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="barang" class="block mb-2 font-semibold sm:text-end">Nama barang</label>
                                    <input type="text" id="barang" name="nama_barang" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="satuan" class="block mb-2 font-semibold sm:text-end">Satuan</label>
                                    <input type="text" id="satuan" name="satuan" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="volume" class="block mb-2 font-semibold sm:text-end">Volume</label>
                                    <input type="number" id="volume" name="volume" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required>
                                </div>
                                <div class="flex gap-4 sm:justify-self-end">
                                    <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer" type="submit" name="submit" value="Simpan">
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