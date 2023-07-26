<?php

session_start();

$_SESSION['sesi'] = null;

if (isset($_POST['submit'])) {
    include "koneksi.php";
    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);

    $data  = mysqli_query($conn, "SELECT* FROM admin WHERE username = '$user'");
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['status'] = "login";

        echo "<script>alert('Anda berhasil login');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";
    } else {
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        echo "<script>alert('Anda gagal login');</script>";
    }
}