<?php

$query = "SELECT * FROM users";
$result = mysqli_query($koneksi, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<div class="container p-5 bg-white rounded-lg shadow-lg">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-3xl font-bold text-center "> Daftar User</h1>
            <a href="index.php?page=register" class="inline-block px-5 py-2 text-xl font-bold text-white bg-blue-500 rounded">Tambah User</a>
            <table class="w-full mt-5 text-lg text-center table-auto">
                <thead>
                    <tr class="bg-yellow-200">
                        <th class="px-2 py-1 border-2 border-black">No</th>
                        <th class="px-5 py-1 border-2 border-black">Nama</th>
                        <th class="px-5 py-1 border-2 border-black">Username</th>
                        <th class="px-5 py-1 border-2 border-black">Role</th>
                        <th class="py-1 border-2 border-black">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $user) : ?>
                        <tr>
                            <td class="px-2 py-1 border-2 border-black"><?= $key + 1 ?></td>
                            <td class="px-5 py-1 border-2 border-black"><?= $user['name'] ?></td>
                            <td class="px-5 py-1 border-2 border-black"><?= $user['username'] ?></td>
                            <td class="px-5 py-1 border-2 border-black"><?= $user['role'] ?></td>
                            <td class="py-1 border-2 border-black ">
                                <form action="controller/delete_user.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="px-3 py-2 font-semibold text-white bg-red-600 rounded-lg">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>