<?php

include "../koneksi.php";

$notif_id = $_POST['id'];

$query = "UPDATE notifikasi SET is_read = 1 WHERE id = '$notif_id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "
    <script>
        confirm('Berhasil membaca notifikasi');
        // refresh halaman
        window.location.href = '../index.php?page=admin';
    </script>";
} else {
    echo "
    <script>
        confirm('Gagal membaca notifikasi');
        window.location.href = '../index.php?page=admin';
    </script>";
}
