<?php

// Ambil data berdasarkan ID
if (isset($_GET['id_sewa'])) {
    $id = $_GET['id_sewa'];
    $result = $koneksi->query("SELECT rentals.id, jenis_sewa.nama , 
    rentals.jenis_sewa_id,
     users.name, rentals.no_telp, rentals.tanggal_waktu, rentals.durasi, rentals.total_harga FROM rentals JOIN jenis_sewa ON rentals.jenis_sewa_id = jenis_sewa.id JOIN users ON rentals.user_id = users.id WHERE rentals.id = $id");
    if ($result->num_rows > 0) {
        $rental = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan!");
    }
}

$jenis_penyewaan = mysqli_fetch_all(mysqli_query($koneksi, "SELECT * FROM jenis_sewa"), MYSQLI_ASSOC);

if (isset($_POST['update_rental'])) {
    $id = $_POST['id'];
    $no_telp = $_POST['no_telp'];
    $jenis_sewa_id = $_POST['jenis_sewa_id'];
    $durasi = $_POST['duration'];
    // ubah total harga menjadi integer
    $total_harga = (int) str_replace(['Rp ', '.'], '', $_POST['total_price']);

    $query = "UPDATE rentals SET no_telp = '$no_telp', jenis_sewa_id = '$jenis_sewa_id', durasi = '$durasi', total_harga = '$total_harga' WHERE id = $id";
    $result = $koneksi->query($query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate');window.location.href = 'index.php?page=rental';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rental</title>
    <link href="tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="mb-6 text-2xl font-bold text-center">Edit Rental</h1>
        <form action="" method="POST" class="p-6 bg-white rounded shadow">
            <input type="hidden" name="id" value="<?php echo $rental['id']; ?>">

            <!-- Nama Pelanggan -->
            <label class="block mb-2 font-semibold">Nama Pelanggan</label>
            <input type="text" name="name" value="<?php echo $rental['name']; ?>" class="w-full p-2 mb-4 bg-gray-200 border rounded" disabled>

            <!-- Nomor Telepon -->
            <label class="block mb-2 font-semibold">Nomor Telepon</label>
            <input type="text" name="no_telp" value="<?php echo $rental['no_telp']; ?>" class="w-full p-2 mb-4 border rounded">

            <!-- Jenis Penyewaan -->
            <label class="block mb-2 font-semibold">Jenis Penyewaan</label>
            <select name="jenis_sewa_id" id="jenis_sewa" class="w-full p-2 mb-4 border rounded" required>
                <?php foreach ($jenis_penyewaan as $jenis) : ?>
                    <option value="<?= $jenis['id'] ?>" <?= $jenis['id'] == $rental['jenis_sewa_id'] ? 'selected' : '' ?>>
                        <?= $jenis['nama'] ?> - Rp. <?= number_format($jenis['harga'], 0, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- tanggal -->
            <label class="block mb-2 font-semibold">Tanggal Waktu</label>
            <input type="datetime-local" id="tanggal_waktu" name="tanggal_waktu" class="w-full p-2 mb-4 border rounded" disabled>

            <!-- Durasi -->
            <label class="block mb-2 font-semibold">Durasi (jam)</label>
            <input type="number" name="duration" id="duration" value="<?php echo $rental['durasi']; ?>" class="w-full p-2 mb-4 border rounded">

            <!-- total harga -->
            <label class="block mb-2 font-semibold">Total Harga</label>
            <input type="text" name="total_price" id="total_price" value="<?php echo $rental['total_harga']; ?>" class="w-full p-2 mb-4 border rounded">

            <!-- Submit -->
            <button type="submit" name="update_rental" class="px-4 py-2 text-white bg-blue-500 rounded">Update</button>
            <a href="index.php" class="px-4 py-2 ml-2 text-black bg-gray-300 rounded">Kembali</a>
        </form>
    </div>
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

</body>

</html>