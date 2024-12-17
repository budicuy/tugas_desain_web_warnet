<?php

include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // verifikasi password
    if (!password_verify($password, $data['password'])) {
        echo "
        <script>
            confirm('Gagal login username atau password salah');
            window.location.href = '../index.php?page=login';
        </script>";
        exit;
    }

    session_start();
    $_SESSION['id'] = $data['id'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    echo "
    <script>
        confirm('Berhasil login');
        window.location.href = '../index.php?page=home';
    </script>";
} else {
    echo "
    <script>
        confirm('Gagal login username atau password salah');
        window.location.href = '../index.php?page=login';
    </script>";
}
