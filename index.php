<!doctype html>
<html class="dark">

<?php

session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "db_warnet";


$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>


<head>
    <title>Warpes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

</head>

<body style="background-image: url('assets/img/bg.jpg');" class="bg-cover">

    <!-- ketika halamana bukan login dan register maka tampilkan navbar -->
    <?php

    // jika tidak ada page maka ke halaman home
    if (!isset($_GET['page'])) {
        echo "<script>window.location.href = 'index.php?page=home';</script>";
    }


    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page != 'login' && $page != 'register') {
            include "components/navbar.php";
        }
    } else {
        include "components/navbar.php";
    }
    ?>
    <div class="p-20 min-h-dvh">
        <main class="container p-10 mx-auto rounded-lg shadow-lg isolate bg-white/20 ring-1 ring-white">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                        include "page/home.php";
                        break;
                    case 'admin':
                        include "page/admin.php";
                        break;
                    case 'sewa':
                        include "page/sewa.php";
                        break;
                    case 'register':
                        include "page/register.php";
                        break;
                    case 'about':
                        include "page/about.php";
                        break;
                    case 'users':
                        include "page/users.php";
                        break;
                    case 'edit_rental':
                        include "page/edit_rental.php";
                        break;
                    case 'login':
                        include "page/login.php";
                        break;
                    case 'rental':
                        include "page/rental.php";
                        break;
                    case 'logout':
                        // hapus session
                        session_destroy();
                        echo "
                    <script>
                        confirm('Berhasil logout');
                        window.location.href = 'index.php?page=login';
                    </script>";
                        break;
                    default:
                        include "page/login.php";
                        break;
                }
            }
            ?>
        </main>
    </div>
</body>

</html>