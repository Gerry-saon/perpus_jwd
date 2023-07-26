<?php

session_start();
if (isset($_SESSION['sesi'])) {

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Sistem Perpustakaan</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="nama-alamat-perpus-container">
                <div class="nama-alamat-perpus">
                    <h1>PERPUSTAKAAN UMUM</h1>
                </div>
                <div class="nama-alamat-perpus">
                    <h5>Jl. Jendral Sudirman No.45 Jakarta, Telp : 243214</h5>
                </div>
            </div>
        </div>
        <div id="header2">
            <div id="nama-user">Hai, Saya adalah admin</div>
        </div>
        <div id="sidebar">
            <a href="index.php?p=beranda">Beranda</a>
            <p class="label-navigasi">Data Master</p>
            <ul>
                <li><a href="anggota.php?p=listmember">Data Anggota</a></li>
                <li><a href="index.php?p=listbook">Data Buku</a></li>
            </ul>
            <p class="label-navigasi">Data Transaksi</p>
            <ul>
                <li><a href="index.php?p=listborrow">Data Peminjaman</a></li>
                <li><a href="index.php?p=listbook">Data Pengembalian</a></li>
            </ul>
            <p class="label-navigasi">Laporan Transaksi</p>
            <a href="login.php">Logout</a>
        </div>
        <div id="content-container">
            <!-- Isi content web perpus -->
            <?php
                $p_dir = 'views';
                if (!empty($_GET['p'])) {
                    $pages = scandir($p_dir, 0);
                    unset($pages[0], $pages[1]);
                    $view = $_GET['p'];

                    if (in_array($view . '.php', $pages)) {
                        include($p_dir . '/' . $view . '.php');
                    } else {
                        echo 'filenya tidak ada bro';
                    }
                } else {
                    include($p_dir . '/beranda.php');
                }
                ?>
        </div>

        <div id="footer">
            <h3>Sistem Informasi Perpustakaan </h3>
        </div>
    </div>
</body>

</html>

<?php
} else {
    echo "<script>alert('Login dulu bro!');</script>";
    header('localtion:login.php');
}
?>