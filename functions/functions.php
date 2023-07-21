<?php 

$conn = mysqli_connect('localhost', 'root', '', 'permintaan_barang');

function register() {
    global $conn;

    $nama = stripslashes($_POST['nama']);
    $username = strtolower(stripslashes($_POST['username']));
    $password = $_POST['password'];
    $password2 = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE `username` = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>alert('Username sudah digunakan');</script>";
        return false;
    }

    if( $password !== $password2 ) {
        echo '<script>alert("Password tidak sama");</script>';
        return false;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    mysqli_query($conn, "INSERT INTO users (`nama`, `username`, `password`) VALUES ('$nama', '$username', '$hashed_password')");

    return mysqli_affected_rows($conn);

}

function create($data) {
    global $conn;

    date_default_timezone_set('Asia/Jakarta');

    $barang = htmlspecialchars($data["nama_barang"]);
    $volume = htmlspecialchars($data["volume"]);
    $satuan = htmlspecialchars($data["satuan"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $date = date("Y-m-d H:i:s");

    $query = mysqli_query($conn, "INSERT INTO data_barang (nama_barang, volume, satuan, keterangan, created_at) VALUES ('$barang', '$volume', '$satuan', '$keterangan', '$date')");

    return mysqli_affected_rows($conn);

}

function delete($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang = '$id'");
    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;

    $id = $data["id_barang"];
    $barang = htmlspecialchars($data["nama_barang"]);
    $volume = htmlspecialchars($data["volume"]);
    $satuan = htmlspecialchars($data["satuan"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = mysqli_query($conn, "UPDATE data_barang SET nama_barang = '$barang', volume = '$volume', satuan = '$satuan', keterangan = '$keterangan' WHERE id_barang = $id");

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

?>