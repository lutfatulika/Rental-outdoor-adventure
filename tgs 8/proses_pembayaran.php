<?php
// Database connection details
$servername = "localhost"; // Use your server name, 'localhost' is common
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "db_prakpemweb"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$metodePembayaran = $_POST['metode-pembayaran'];
$namaPemilik = $_POST['nama-pemilik'];
$nomorPembayaran = $_POST['nomor-pembayaran'];
$jumlahPembayaran = $_POST['jumlah-pembayaran'];
$namaDetail = $_POST['nama-detail'];
$jenisDetail = $_POST['jenis-detail'];
$lamaPenitipan = $_POST['lama-penitipan'];
$totalHarga = $_POST['total-harga'];
$tanggaLTransaction = date('Y-m-d'); // Get today's date

// Prepare SQL query to insert data into the database
$sql = "INSERT INTO tb_transaction (nama_pemilik, nomor_pembayaran, metode_pembayaran, jumlah_pembayaran, 
        nama_detail, jenis_detail, lama_penitipan, total_harga, tanggal_transaction) 
        VALUES ('$namaPemilik', '$nomorPembayaran', '$metodePembayaran', '$jumlahPembayaran', 
        '$namaDetail', '$jenisDetail', '$lamaPenitipan', '$totalHarga', '$tanggaLTransaction')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Pembayaran berhasil disimpan!";
    // Optionally, redirect after successful payment
    header("Location: transaction.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>