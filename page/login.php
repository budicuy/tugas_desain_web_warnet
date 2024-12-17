<?php

if (isset($_SESSION['id'])) {
    echo "
    <script>
        confirm('Anda sudah login');
        window.location.href = 'index.php?page=home';
    </script>";
}
?>

<div class="flex items-center justify-center">
    <div class="p-8 bg-white rounded-lg shadow-lg w-96">
        <img class="object-cover mx-auto mb-2 rounded-full w-28 h-28" src="/assets/img/logo.png" alt="" srcset="">
        <h1 class="mb-2 text-3xl font-bold text-center text-red-800">WARPES</h1>
        <h2 class="text-3xl font-bold text-center">Login</h2>

        <form action="../controller/login_proses.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-lg">Login</button>
        </form>

        <p class="mt-4 text-sm text-center">Don't have an account?
            <!-- buat page=register -->
            <a href="?page=register" class="text-blue-500">Register</a>
        </p>
    </div>
</div>