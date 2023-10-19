<?php
session_start();
require '../../../functions/functions.php';
require '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$data = query("SELECT * FROM users WHERE id = '$id'")[0];

if (isset($_POST["submit"])) {

    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>";
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
                        <div class="w-full text-center text-white uppercase text-2xl font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Edit User</div>
                        <form method="post" action="" class="sm:px-40 sm:py-20 px-12 py-10">
                            <input type="hidden" name="id" value="<?= $data["id"] ?>">
                            <div class="grid sm:grid-cols-2 sm:gap-10 gap-5">
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="nama" class="block mb-2 font-semibold sm:text-end">Nama</label>
                                    <input type="text" id="nama" name="nama" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" value="<?= $data['nama']  ?>" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="username" class="block mb-2 font-semibold sm:text-end">Username</label>
                                    <input type="text" id="username" name="username" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" value="<?= $data['username']  ?>" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="level" class="block mb-2 font-semibold sm:text-end">Level</label>
                                    <select id="level" name="level" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10">
                                        <option <?php if ($data['level'] == "admin") echo "selected"; ?> value="admin">Admin</option>
                                        <option <?php if ($data['level'] == "pegawai") echo "selected"; ?> value="pegawai">Pegawai</option>
                                    </select>
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