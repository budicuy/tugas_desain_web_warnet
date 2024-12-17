<?php

include "../koneksi.php";
$id_rentals = $_POST['id'];


$query = "DELETE FROM rentals WHERE id = '$id_rentals'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "
    <script>
        confirm('Berhasil menghapus data');
        window.location.href = '../index.php?page=rental';
    </script>";
} else {
    echo "
    <script>
        confirm('Gagal menghapus data');
        window.location.href = '../index.php?page=rental';
    </script>";
}
