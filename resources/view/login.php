<?php
session_start();
require '../../functions/functions.php';
require '../../functions/connection.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION["level"] = $data["level"];
        if (password_verify($password, $data['password'])) {
            if ($data['level'] == "admin") {
                $_SESSION['login'] = $data['username'];
                $_SESSION["level"] = "admin";
                header("location: admin/index.php");
            } else if ($data['level'] == "pegawai") {
                $_SESSION['login'] = $data['username'];
                $_SESSION["level"] = "pegawai";
                header("location: pegawai/index.php");
            } else {
                $errorl = true;
            }
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded-lg px-8 py-6">
                <h2 class="text-2xl font-bold text-center mb-8">Log In</h2>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold" for="username">Username</label>
                        <input id="username" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="username" autofocus placeholder="Enter your username" required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold" for="password">Password</label>
                        <input id="password" type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="password" required placeholder="Enter your password" required>
                    </div>
                    <?php

                    if (isset($errorl) && $errorl == true) {
                        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-b mb-6" role="alert">
                                                <p class="font-bold">Level anda salah</p>
                                            </div>';
                    }

                    if (isset($error) && $error == true) {
                        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-b mb-6" role="alert">
                                                <p class="font-bold">Username atau Password salah</p>
                                            </div>';
                    }

                    ?>
                    <div class="flex items-center justify-between">
                        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors" type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>