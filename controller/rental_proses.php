<?php

include "../koneksi.php";

var_dump($_POST);

$jenis_sewa_id = $_POST['jenis_sewa'];
$user_id = $_POST['user_id'];
$no_telp = $_POST['no_telp'];
$durasi = $_POST['duration'];
// ubah total harga menjadi integer
$total_harga = (int) str_replace(['Rp ', '.'], '', $_POST['total_price']);


$query = "INSERT INTO rentals (jenis_sewa_id, user_id, no_telp, durasi, total_harga) VALUES ('$jenis_sewa_id', '$user_id', '$no_telp', '$durasi', '$total_harga')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "
    <script>
        confirm('Berhasil menyewa');
        window.location.href = '../index.php?page=home';
    </script>";
} else {
    echo "
    <script>
        confirm('Gagal menyewa');
        window.location.href = '../index.php?page=sewa';
    </script>";
}
