<?php
if (!isset($_SESSION['id'])) {
    echo "<script>confirm('Anda harus login terlebih dahulu');window.location.href = '../index.php?page=login';</script>";
    exit;
}

$jenis_penyewaan = mysqli_fetch_all(mysqli_query($koneksi, "SELECT * FROM jenis_sewa"), MYSQLI_ASSOC);
?>

<section>
    <form action="../controller/rental_proses.php" method="POST" class="p-6 bg-white rounded shadow">
        <h2 class="mb-4 text-lg font-bold">Form Sewa PS / Warnet</h2>

        <label class="block mb-2 font-semibold" for="name">Nama Pelanggan</label>
        <input type="text" name="name" id="name" class="w-full p-2 mb-4 bg-gray-200 border rounded" value="<?= $_SESSION['name'] ?>" disabled>

        <label class="block mb-2 font-semibold" for="no_telp">Nomor Telepon (opsional)</label>
        <input type="number" name="no_telp" id="no_telp" class="w-full p-2 mb-4 border rounded"
            placeholder="Masukkan nomor telepon (opsional)">

        <label class="block mb-2 font-semibold" for="jenis_sewa">Jenis Penyewaan</label>
        <select name="jenis_sewa" id="jenis_sewa" class="w-full p-2 mb-4 border rounded" required>
            <?php foreach ($jenis_penyewaan as $jenis) : ?>
                <option value="<?= $jenis['id'] ?>">
                    <?= $jenis['nama'] ?> - Rp. <?= number_format($jenis['harga'], 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label class="block mb-2 font-semibold" for="tanggal_waktu">Tanggal Waktu</label>
        <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="w-full p-2 mb-4 bg-gray-200 border rounded" disabled>

        <label class="block mb-2 font-semibold" for="duration">Estimasi Durasi (jam)</label>
        <input type="number" name="duration" value="1" id="duration" class="w-full p-2 mb-4 border rounded" min="1">

        <label class="block mb-2 font-semibold" for="total_price">Total Harga</label>
        <input type="text" name="total_price" id="total_price" class="w-full p-2 mb-4 border rounded">

        <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            const now = new Date().toISOString().slice(0, 16);
            $("#tanggal_waktu").val(now);

            function formatRupiah(angka) {
                return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            function updateTotalHarga() {
                const hargaSewa = $("#jenis_sewa :selected").text().split(' - ')[1].replace(/Rp\. |\./g, '');
                const durasi = $("#duration").val();
                $("#total_price").val(formatRupiah(hargaSewa * durasi));
            }

            updateTotalHarga();
            $("#jenis_sewa, #duration").change(updateTotalHarga);
        });
    </script>
</section>