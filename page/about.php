<?php

if (!isset($_SESSION['id'])) {
    echo "
    <script>
        confirm('Anda harus login terlebih dahulu');
        window.location.href = 'index.php?page=login';
    </script>";
}

// jika user Admin arahkan ke halaman admin 
if ($_SESSION['role'] == 'Admin') {
    echo "
    <script>
        window.location.href = 'index.php?page=admin';
    </script>";
}
?>
<div class="p-5 bg-white rounded-lg shadow-lg">
    <h1 class="mb-2 text-3xl font-bold">Tentang Aplikasi</h1>
    <p>
        Aplikasi ini adalah aplikasi rental Warnet dan Playstation yang di buat menggunakan bahasa pemrograman PHP dan database MySQL.
    </p>

    <h2 class="mt-5 text-2xl font-bold">Fitur</h2>
    <ul class="ml-5">
        <li>- Halaman Home</li>
        <li>- Halaman Rental</li>
        <li>- Halaman Admin</li>
        <li>- Halaman User</li>
        <li>- Halaman Login</li>
        <li>- Halaman Register</li>
        <li>- Halaman Logout</li>
    </ul>
    <h2 class="mt-5 text-2xl font-bold">Teknologi</h2>
    <ul class="ml-5">
        <li>- HTML</li>
        <li>- CSS</li>
        <li>- JavaScript</li>
        <li>- PHP</li>
        <li>- MySQL</li>
        <li>- Tailwind CSS</li>
        <li>- JQuery</li>
    </ul>
    <h2 class="mt-5 text-2xl font-bold">Developer</h2>
    <ul class="ml-5">
        <li>- Nama : BUDIANNOR</li>
        <li>- NIM : C030323012</li>
        <li>- Kelas : TI-3A</li>
        <li>
            - <a class="text-blue-500 underline" href="https://budiannor.tech" target="_blank">Portfofolio</a>
        </li>
    </ul>
</div>