<?php
session_start();
require '../../functions/functions.php';

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }

if( isset($_POST["submit"]) ) {

    if( create($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan')</script>";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Permintaan Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>

<body class="bg-gray-100">

    <?php include '../partials/sidebar.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            <div class="flex w-full">
                <div class="w-full">
                    <div class="bg-gray-800 text-gray-400 shadow-md rounded-lg">
                        <div class="w-full text-center text-gray-400 uppercase text-2xl mb-10 font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Form Permintaan Barang</div>
                        <form method="post" action="" class="px-8 pb-6">
                            <input type="datetime" hidden name="created_at">
                            <div class="mb-6">
                                <label for="barang" class="block mb-2 font-semibold">Nama barang</label>
                                <input type="text" id="barang" name="nama_barang" class="text-black w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            </div>
                            <div class="mb-6">
                                <label for="volume" class="block mb-2 font-semibold">Volume</label>
                                <input type="number" id="volume" name="volume" class="text-black w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            </div>
                            <div class="mb-6">
                                <label for="satuan" class="block mb-2 font-semibold">Satuan</label>
                                <input type="text" id="satuan" name="satuan" class="text-black w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></input>
                            </div>
                            <div class="mb-6">
                                <label for="keterangan" class="block mb-2 font-semibold">Keterangan</label>
                                <textarea type="text" id="keterangan" name="keterangan" class="text-black w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                            </div>
                            <input class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors cursor-pointer" type="submit" name="submit" value="Ajukan Permintaan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>