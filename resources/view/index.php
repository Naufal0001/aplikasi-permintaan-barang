<?php
session_start();
require '../../functions/functions.php';

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

$datas = mysqli_query($conn, "SELECT * FROM data_barang");

$no = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>

<body class="bg-gray-100">
  <?php include '../partials/sidebar.php'; ?>

  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg border-gray-700 mt-14">
      <div class="flex w-full">
        <div class="relative overflow-x-auto rounded-lg w-full">
          <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  NO.
                </th>
                <th scope="col" class="px-6 py-3">
                  Nama Barang
                </th>
                <th scope="col" class="px-6 py-3">
                  Volume
                </th>
                <th scope="col" class="px-6 py-3">
                  Satuan
                </th>
                <th scope="col" class="px-6 py-3">
                  Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                  Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datas as $data) { ?>
              <tr class="border-b bg-gray-800 border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                  <?= $no++; ?>
                </td>
                <td scope="row" class="px-6 py-4">
                  <?= $data['nama_barang'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $data['volume'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $data['satuan'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $data['keterangan'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $data['created_at']?>
                </td>
                <td class="px-6 py-4 uppercase font-semibold flex gap-2">
                  <a class="bg-gray-100 py-1 px-3 rounded-lg text-black hover:bg-gray-300 hover:text-gray-800" href="update.php?id_barang=<?= $data['id_barang']; ?>">Edit</a>
                  <a class="bg-gray-100 py-1 px-3 rounded-lg text-black hover:bg-gray-300 hover:text-gray-800" href="delete.php?id_barang=<?= $data['id_barang']; ?>">Hapus</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>