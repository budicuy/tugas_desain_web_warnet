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
<div>
    <div class="overflow-hidden aspect-[6/2] relative rounded-xl ">
        <img class="object-cover w-full h-full" src="/assets/img/hero image.jpg" alt="" srcset="">
        <div class="absolute inset-0 w-full h-full text-center bg-black/80">
            <div class="flex items-center justify-center h-full">
                <div>
                    <h1 class="text-5xl font-bold text-white">Selamat Datang</h1>
                    <p class="text-white">Selamat datang di website kami, silahkan pilih menu yang tersedia</p>
                    <a href="?page=sewa" class="block px-4 py-2 mt-5 text-white bg-blue-500 rounded-lg">Rental Sekarang!</a>


                </div>

            </div>
        </div>
    </div>

    <div class="p-5 mt-2 bg-white rounded-lg shadow-lg">

        <p>Daftar Rental anda saat ini :</p>
        <ul>
            <?php
            $query = mysqli_query($koneksi, "SELECT rentals.id, jenis_sewa.nama , users.name, rentals.no_telp, rentals.tanggal_waktu, rentals.durasi, rentals.total_harga FROM rentals JOIN jenis_sewa ON rentals.jenis_sewa_id = jenis_sewa.id JOIN users ON rentals.user_id = users.id WHERE users.id = $_SESSION[id];  ");
            if (mysqli_num_rows($query) == 0) {
                echo "<li>Anda belum melakukan rental</li>";
            }
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <li class="px-5 ">
                    - Rental <?= $data['nama'] ?> dengan total harga Rp. <?= number_format($data['total_harga'], 0, ',', '.') ?> pada tanggal <?= $data['tanggal_waktu'] ?> dengan durasi <?= $data['durasi'] ?> jam
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>