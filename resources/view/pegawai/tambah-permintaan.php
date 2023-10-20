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
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/b-2.4.2/b-print-2.4.2/date-1.5.1/fc-4.3.0/r-2.5.0/sc-2.2.0/datatables.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
</head>

<body class="bg-gray-100">

    <?php include '../../partials/sidebar.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14">
            <div class="flex flex-col sm:grid sm:grid-cols-2 w-full gap-10">
                <div class="w-full">
                    <div class="border text-gray-700 shadow-md rounded-lg">
                        <div class="w-full text-center text-white uppercase text-2xl font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Form Permintaan Barang</div>
                        <form method="post" id="tes" action="tambah-proses.php" class="px-12 py-10">
                            <div class="grid sm:grid-cols-2 sm:gap-10 gap-5">
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="divisi" class="block mb-2 font-semibold sm:text-end">Divisi</label>
                                    <input type="text" id="divisi" name="divisi" value="<?= $_SESSION['login'] ?>" class="bg-gray-200 text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required readonly>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="Perihal" class="block mb-2 font-semibold sm:text-end">Perihal</label>
                                    <input type="text" id="Perihal" name="perihal" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-2 sm:mb-0">
                                    <label for="barang" class="block mb-2 font-semibold sm:text-end">Nama barang</label>
                                    <select id="barang" name="kode_brg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 sm:ml-10">
                                        <option selected hidden>Pilih Barang</option>
                                        <?php
                                        $queryBarang = mysqli_query($conn, "SELECT * FROM barang");
                                        if (mysqli_num_rows($queryBarang)) {
                                            while ($row = mysqli_fetch_assoc($queryBarang)) :
                                        ?>
                                                <option value="<?= $row['kode_brg']; ?>"><?= $row['nama_barang']; ?></option>
                                        <?php endwhile;
                                        } ?>
                                    </select>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="stok" class="block mb-2 font-semibold sm:text-end">Stok Tersedia</label>
                                    <input type="number" id="stok" name="sisa" class="bg-gray-200 text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 cursor-not-allowed sm:ml-10" required disabled>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="jumlah" class="block mb-2 font-semibold sm:text-end">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required onkeyup="sendAjax()">
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="keterangan" class="block mb-2 font-semibold sm:text-end">Keterangan</label>
                                    <textarea id="keterangan" name="keterangan" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required></textarea>
                                </div>
                                <div class="grid sm:grid-cols-3 sm:col-span-2 items-center mb-6 sm:mb-0">
                                    <label for="nama_pengaju" class="block mb-2 font-semibold sm:text-end">Nama Pemohon</label>
                                    <input type="text" id="nama_pengaju" name="pengaju" class="text-black w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 sm:ml-10" required>
                                </div>
                                <div class="flex gap-4 sm:justify-self-end">
                                    <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer" type="submit" name="simpan" value="Simpan">
                                    <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer" type="reset" value="Batal">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="w-full">
                    <div class="border text-gray-700 shadow-md rounded-lg">
                        <div class="w-full text-center text-white uppercase text-2xl font-bold bg-gray-700 px-8 py-6 rounded-t-lg">Data Permintaan Hari ini </div>
                        <div class="bg-white relative shadow-md rounded-lg overflow-hidden">
                            <div class="overflow-x-auto p-2">
                                <table class="w-full text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3">No</th>
                                            <th class="px-6 py-3">Perihal</th>
                                            <th class="px-6 py-3">Nama Barang</th>
                                            <th class="px-6 py-3">Jumlah</th>
                                            <th class="px-6 py-3">Satuan</th>
                                            <th class="px-6 py-3">Keterangan</th>
                                            <th class="px-6 py-3">Nama Pemohon</th>
                                            <th class="px-6 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $now = date("Y-m-d");
                                        $queryTampil = mysqli_query($conn, "SELECT sementara.divisi, sementara.pengaju, sementara.id_sementara, barang.nama_barang, barang.satuan, jumlah, perihal, keterangan FROM sementara INNER JOIN barang ON sementara.kode_brg = barang.kode_brg WHERE tgl_permintaan = '$now' AND sementara.divisi = '$_SESSION[login]'");
                                        $no = 1;
                                        if (mysqli_num_rows($queryTampil) > 0) :
                                            while ($row = mysqli_fetch_assoc($queryTampil)) :
                                        ?>
                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4"><?= $no; ?></td>
                                                    <td class="px-6 py-4"><?= $row['perihal'] ?></td>
                                                    <td class="px-6 py-4"><?= $row['nama_barang'] ?></td>
                                                    <td class="px-6 py-4"><?= $row['jumlah'] ?></td>
                                                    <td class="px-6 py-4"><?= $row['satuan'] ?></td>
                                                    <td class="px-6 py-4"><?= $row['keterangan'] ?></td>
                                                    <td class="px-6 py-4"><?= $row['pengaju'] ?></td>
                                                    <td><a href="deletep.php?id=<?php echo $row['id_sementara']; ?>" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center cursor-pointer">Hapus</a></td>
                                                </tr>
                                            <?php $no++;
                                            endwhile;
                                        else : ?>
                                            <tr class="text-center">
                                                <td colspan="8" class="text-black text-lg">Tidak ada permintaan barang hari ini</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if (mysqli_num_rows($queryTampil) > 0) : ?>
                                    <div class="flex p-2">
                                        <a class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2" href="permintaan-proses.php">Minta Barang</a>
                                    </div>
                                <?php else : ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#barang").change(function() {
                var kode = $(this).val();
                var dataString = 'kode_brg=' + kode;
                $.ajax({
                    type: "POST",
                    url: "getkode.php",
                    data: dataString,
                    success: function(html) {
                        $("#stok").val(html);
                    }
                });
            });

        });



        function cek_stok() {
            var jumlah = $("#jumlah").val();
            var kode = $("#barang").val();
            $.ajax({
                url: 'cekstok.php',
                data: "jumlah=" + jumlah + "&kode_brg=" + kode,
                dataType: 'json',
            }).success(function(data) {


                if (data.hasil == 1) {
                    $("#tes").submit(function(e) {
                        e.preventDefault();
                        alert(data.pesan);
                    });
                }



            });
        }

        function sendAjax() {
            setTimeout(
                function() {
                    var jumlah = $("#jumlah").val();
                    var kode = $("#barang").val();
                    $.ajax({
                        url: 'cekstok.php',
                        data: "jumlah=" + jumlah + "&kode_brg=" + kode,
                        dataType: 'json',
                    }).success(function(data) {


                        if (data.hasil == 1) {

                            alert(data.pesan);
                            $("#jumlah").val("");

                        }



                    });
                }, 1000);
        }
    </script>
</body>

</html>