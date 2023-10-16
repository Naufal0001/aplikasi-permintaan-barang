<?php
session_start();
require '../../../functions/functions.php';
require '../../../functions/connection.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
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
  <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>

<body class="bg-gray-100">
  <?php include '../../partials/sidebar.php'; ?>

  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">
      <div class="grid sm:grid-cols-3 gap-4">
        <div class="text-black bg-red-200 rounded-lg">
          <div class="p-4">
            <div class="text-2xl flex items-center gap-4">
              <i class="text-red-400 fa-solid fa-user"></i>
              <h2 class="font-semibold">Data user</h2>
            </div>
            <div class="mt-4">
              <h4 class="font-semibold text-xl uppercase">Olah data user</h4>
            </div>
          </div>
          <a href="data-user.php" class="flex gap-1 p-1 items-center justify-center bg-red-300 rounded-b-lg">
            <h5>Lihat Detail</h5>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
        <div class="text-black bg-blue-200 rounded-lg">
          <div class="p-4">
            <div class="text-2xl flex items-center gap-4">
              <i class="text-blue-400 fa-solid fa-box"></i>
              <h2 class="font-semibold">Data barang</h2>
            </div>
            <div class="mt-4">
              <h4 class="font-semibold text-xl uppercase">Olah data barang</h4>
            </div>
          </div>
          <a href="data-user.php" class="flex gap-1 p-1 items-center justify-center bg-blue-300 rounded-b-lg">
            <h5>Lihat Detail</h5>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
        <div class="text-black bg-green-200 rounded-lg">
          <div class="p-4">
            <div class="text-2xl flex items-center gap-4">
              <i class="text-green-400 fa-solid fa-envelope"></i>
              <h2 class="font-semibold">Data permintaan</h2>
            </div>
            <div class="mt-4">
              <h4 class="font-semibold text-xl uppercase">Data Permintaan</h4>
            </div>
          </div>
          <a href="data-user.php" class="flex gap-1 p-1 items-center justify-center bg-green-300 rounded-b-lg">
            <h5>Lihat Detail</h5>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>