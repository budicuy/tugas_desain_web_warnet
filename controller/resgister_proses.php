<?php

include "../koneksi.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

// hash password
$password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', 'user')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "
    <script>
        confirm('Berhasil register');
        window.location.href = '../index.php?page=login';
    </script>";
} else {
    echo "
    <script>
        confirm('Gagal register username sudah ada');
        window.location.href = '../index.php?page=register';
    </script>";
}
