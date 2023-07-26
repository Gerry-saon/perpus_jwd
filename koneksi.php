<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "perpustakaan_jwd";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Gagal terhubung ke database:" . mysqli_connect_error());
}