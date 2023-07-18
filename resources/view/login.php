<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded-lg px-8 py-6">
                <h2 class="text-2xl font-bold text-center mb-8">Log In</h2>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold" for="email">Email</label>
                        <input id="email" type="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            name="email" autocomplete="email" autofocus
                            placeholder="Enter your email address" required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold" for="password">Password</label>
                        <input id="password" type="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            name="password" required autocomplete="current-password" placeholder="Enter your password"
                            required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors"
                            type="submit">Login</button>
                            <a class="text-sm text-blue-500 hover:text-blue-600"
                                href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <p class="mt-4 text-center text-md tracking-wide">Belum punya akun?<a class="underline text-blue-500"
                    href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>
</html>