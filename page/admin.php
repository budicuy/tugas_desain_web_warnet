<?php

if (!isset($_SESSION['id'])) {
    echo "
    <script>
        confirm('Anda harus login terlebih dahulu');
        window.location.href = 'index.php?page=login';
    </script>";
}

if ($_SESSION['role'] != 'Admin') {
    echo "
    <script>
        confirm('Anda tidak memiliki akses ke halaman ini');
        window.location.href = 'index.php?page=home';
    </script>";
}
?>
<div class="p-2 rounded-lg bg-gradient-to-tl from-red-900 to-purple-700">

    <div class="text-white bg-black rounded-lg">

        <main class="p-6">
            <div class="grid grid-cols-5 grid-rows-2 gap-4">
                <!-- Profile Section -->
                <div class="row-span-3 p-4 rounded shadow bg-gradient-to-t from-blue-300 to-purple-800">
                    <h2 class="mb-4 text-xl font-semibold">Profile</h2>
                    <img src="https://i.ytimg.com/vi/-vyQ9ci87ac/maxresdefault.jpg" alt="Profile Picture" class="object-cover w-32 h-32 mx-auto border-2 border-white rounded-full">
                    <div class="mt-5">
                        <div>
                            <p class="text-2xl font-bold">
                                <?php
                                echo $_SESSION['name'];
                                ?>
                            </p>
                            <p class="text-gray-400">
                                <?php
                                echo $_SESSION['role'];
                                ?>
                            </p>
                        </div>
                    </div>

                    <p class="text-sm">
                        Mahasiswa Teknik Informatika Universitas Politeknik Negeri banjarmasin, Memiliki Keahlian sebagai seorang web Web Develover & UI/UX Designer.
                    </p>
                    <div>
                        <div class="flex mt-3 space-x-2">
                            <a href="https://www.facebook.com/Budddx" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 text-black/80">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                </svg>
                            </a>

                            <a href="https://www.github.com/budicuy" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 text-black/80">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
                                </svg>
                            </a>

                            <a href="https://www.instagram.com/budi_nnr" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 text-black/80">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M16.5 7.5l0 .01"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <button class="w-full py-2 mt-4 text-white bg-blue-600 rounded hover:bg-blue-700">
                        Edit Profile
                    </button>
                </div>

                <!-- Chart and Data Section -->
                <div class="col-span-2 row-span-3 p-4 rounded shadow bg-gradient-to-t from-red-300 to-green-500">
                    <h2 class="mb-4 text-xl font-semibold">Statistics</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-700 rounded">
                            <h3 class="text-lg font-bold">Total Users</h3>
                            <?php
                            $query = "SELECT COUNT(*) as total FROM users";
                            $result = mysqli_query($koneksi, $query);
                            $total = mysqli_fetch_assoc($result);
                            ?>
                            <p class="text-2xl font-semibold">
                                <?php
                                echo $total['total'];
                                ?>
                            </p>
                        </div>
                        <div class="p-4 bg-gray-700 rounded">
                            <h3 class="text-lg font-bold">Active Rentals</h3>
                            <p class="text-2xl font-semibold">
                                <?php
                                $query = "SELECT COUNT(*) as total FROM rentals";
                                $result = mysqli_query($koneksi, $query);
                                $total = mysqli_fetch_assoc($result);
                                echo $total['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h3 class="mb-2 text-lg font-bold">Revenue Chart</h3>
                        <div class="flex items-center justify-center h-40 bg-gray-700 rounded">
                            <p>
                                Cooming soon
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Additional Sections (e.g., Recent Activity, Notifications) -->
                <div class="col-span-2 p-4 rounded shadow bg-gradient-to-r from-blue-300 to-purple-800">
                    <h2 class="mb-4 text-xl font-semibold">Notifications</h2>
                    <ul class="space-y-2">
                        <?php
                        // maksimal 5 notifikasi yang belum dibaca dan urutkan berdasarkan id terbaru
                        $query = "SELECT * FROM notifikasi WHERE is_read = 0 ORDER BY id DESC LIMIT 3";
                        $result = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="p-3 bg-gray-700 rounded">
                                <div class="flex justify-between items center">
                                    <p><?= $data['message']; ?></p>
                                    <form action="../controller/notification.php" method="post">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                </div>
                                <button type="submit" name="read" class="px-2 py-2 mt-4 text-white bg-blue-600 rounded hover:bg-blue-700">
                                    Mark as Read
                                </button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-span-2 p-4 rounded shadow bg-gradient-to-r from-blue-300 to-pink-800">
                    <h2 class="mb-4 text-xl font-semibold">History Notification</h2>
                    <ul class="space-y-2">
                        <?php
                        $query = "SELECT * FROM notifikasi WHERE is_read = 1 ORDER BY id DESC LIMIT 3";
                        $result = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="p-3 bg-gray-700 rounded">
                                <?= $data['message']; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </main>
    </div>

</div>