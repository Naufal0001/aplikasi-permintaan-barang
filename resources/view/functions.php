<?php 

$conn = mysqli_connect('localhost', 'root', '', 'permintaan_barang');


function register() {
    global $conn;

    $nama = stripslashes($_POST['nama']);
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
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

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (`nama`, `username`, `password`) VALUES ('$nama', '$username', '$hashed_password')");

    return mysqli_affected_rows($conn);

}

?>