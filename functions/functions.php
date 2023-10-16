<?php 
date_default_timezone_set('Asia/Jakarta');

function register() {
    global $conn;

    $nama = stripslashes($_POST['nama']);
    $username = strtolower(stripslashes($_POST['username']));
    $password = $_POST['password'];
    $level = $_POST["level"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (`nama`, `username`, `password`, `level`) VALUES ('$nama', '$username', '$hashed_password', '$level')");

    return mysqli_affected_rows($conn);

}

function create($data) {
    global $conn;


    $barang = htmlspecialchars($data["nama_barang"]);
    $volume = htmlspecialchars($data["volume"]);
    $satuan = htmlspecialchars($data["satuan"]);
    $date = date("d-m-Y");

    $query = mysqli_query($conn, "INSERT INTO barang (nama_barang, volume, satuan, tgl_masuk) VALUES ('$barang', '$volume', '$satuan', '$date')");

    return mysqli_affected_rows($conn);

}

function deleteBarang($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM barang WHERE kode_brg = '$id'");
    return mysqli_affected_rows($conn);
}

function deleteUser($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;

    $kode_brg = $data["kode_brg"];
    $barang = htmlspecialchars($data["nama_barang"]);
    $satuan = htmlspecialchars($data["satuan"]);
    $volume = htmlspecialchars($data["volume"]);
    $tanggal = htmlspecialchars($data["tgl_masuk"]);

    $query = mysqli_query($conn, "UPDATE barang SET nama_barang = '$barang', volume = '$volume', satuan = '$satuan', tgl_masuk = '$tanggal' WHERE kode_brg = $kode_brg");

    return mysqli_affected_rows($conn);
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function indoDate($date)
{
    $exp = explode("-", substr($date,0,10));
    return $exp[2] . ' ' . month($exp[1]) . ' ' . $exp[0];
}

/**
 * Fungsi untuk mengkonversi format bulan angka menjadi nama bulan.
 */
function month($kode)
{
    $month = '';
    switch ($kode) {
        case '01':
            $month = 'Januari';
            break;
        case '02':
            $month = 'Februari';
            break;
        case '03':
            $month = 'Maret';
            break;
        case '04':
            $month = 'April';
            break;
        case '05':
            $month = 'Mei';
            break;
        case '06':
            $month = 'Juni';
            break;
        case '07':
            $month = 'Juli';
            break;
        case '08':
            $month = 'Agustus';
            break;
        case '09':
            $month = 'September';
            break;
        case '10':
            $month = 'Oktober';
            break;
        case '11':
            $month = 'November';
            break;
        case '12':
            $month = 'Desember';
            break;
    }
    return $month;
}

?>