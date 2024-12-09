<?php
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database
$dbname = "db_prakpemweb"; // Nama database yang digunakan

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>