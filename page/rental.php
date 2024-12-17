<?php

if (!isset($_SESSION['id'])) {
    echo "
    <script>
        confirm('Anda harus login terlebih dahulu');
        window.location.href = 'index.php?page=login';
    </script>";
}

// jika user Admin arahkan ke halaman admin 
if ($_SESSION['role'] == 'User') {
    echo "
    <script>
        window.location.href = 'index.php?page=home';
    </script>";
}

?>
<div class="p-5 bg-white rounded-lg shadow-lg">
    <h1 class="mb-4 text-3xl font-bold text-center uppercase">Daftar rental pengguna</h1>
    <table class="w-full text-center table-auto">
        <tr class="bg-gray-200">
            <th class="px-5 py-1 border-2 border-black">No</th>
            <th class="px-5 py-1 border-2 border-black">Jenis Sewa</th>
            <th class="px-5 py-1 border-2 border-black">Nama</th>
            <th class="px-5 py-1 border-2 border-black">Nomor Handphone</th>
            <th class="px-5 py-1 border-2 border-black">Tanggal</th>
            <th class="px-5 py-1 border-2 border-black">Durasi</th>
            <th class="px-5 py-1 border-2 border-black">Total Harga</th>
            <th class="px-5 py-1 border-2 border-black">Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT rentals.id, jenis_sewa.nama , users.name, rentals.no_telp, rentals.tanggal_waktu, rentals.durasi, rentals.total_harga FROM rentals JOIN jenis_sewa ON rentals.jenis_sewa_id = jenis_sewa.id JOIN users ON rentals.user_id = users.id;  ");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td class="p-5 border-2 border-black"><?= $no++ ?></td>
                <td class="p-5 border-2 border-black"><?= $data['nama'] ?></td>
                <td class="p-5 border-2 border-black"><?= $data['name'] ?></td>
                <!-- jika ada no telepohone tampilkan jika tidak ada tampilkan teks tidak ada -->
                <td class="p-5 border-2 border-black">
                    <?php
                    if ($data['no_telp'] == null) {
                        echo "Tidak ada";
                    } else {
                        echo $data['no_telp'];
                    }
                    ?>
                </td>
                <!-- buat format tanggal berbahasa indonesia -->
                <td class="p-5 border-2 border-black">
                    <?php
                    $tanggal = $data['tanggal_waktu'];
                    $tanggal = date('d F Y', strtotime($tanggal));
                    echo $tanggal;
                    ?>
                </td>
                <td class="p-5 border-2 border-black"><?= $data['durasi'] ?> Jam</td>
                <!-- format uang -->
                <td class="p-5 border-2 border-black">
                    Rp.<?= number_format($data['total_harga'], 0, ',', '.') ?>
                </td>
                <td class="p-5 border-2 border-black">
                    <div class="flex justify-center gap-2">
                        <form action="../controller/delete_rental.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <button type="submit" class="px-3 py-2 text-white bg-red-500 rounded">Hapus</button>
                        </form>
                        <a href="index.php?page=edit_rental&id_sewa=<?= $data['id'] ?>" class="px-3 py-2 text-white bg-blue-500 rounded">Edit</a>
                    </div>
                </td>
            </tr>
        <?php }
        ?>
    </table>
</div>