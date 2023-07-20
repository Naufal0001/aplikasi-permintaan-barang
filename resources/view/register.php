<?php 

require 'functions.php';

if( isset($_POST["register"]) ) {
    if( register($_POST) > 0 ) {
        echo "<script>alert('User berhasil ditambahkan')</script>";
        header("location: login.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="https://dprd.jabarprov.go.id/assets/img/favicon.png">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded-lg px-8 py-6">
                <h2 class="text-2xl font-bold text-center mb-8">Regitser</h2>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold" for="nama">Nama</label>
                        <input id="nama" type="text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="nama" autofocus required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold" for="username">Username</label>
                        <input id="username" type="text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="username" autofocus required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold" for="password">Password</label>
                        <input id="password" type="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="password" required required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold" for="confirm-password">Confirm Password</label>
                        <input id="confirm-password" type="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="confirm-password" required required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors"
                            type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
            <p class="mt-4 text-center text-md tracking-wide">Sudah punya akun?<a class="underline text-blue-500"
                    href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>