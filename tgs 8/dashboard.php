<?php
include('koneksi.php');
?>

<?php
// Menghitung jumlah kategori
$sql_categories = "SELECT COUNT(*) AS total_categories FROM tb_categories";
$result_categories = mysqli_query($koneksi, $sql_categories);
$row_categories = mysqli_fetch_assoc($result_categories);
$total_categories = $row_categories['total_categories'];
?>

<?php
// Menghitung jumlah transaksi
$sql_transactions = "SELECT COUNT(*) AS total_transactions FROM tb_transaction";
$result_transactions = mysqli_query($koneksi, $sql_transactions);
$row_transactions = mysqli_fetch_assoc($result_transactions);
$total_transactions = $row_transactions['total_transactions'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Adventure Rentaliks</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">RENTALIK ADVENTURE</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="categories.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="transaction.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="login.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>

        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Adventure Rentaliks Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <h1>Selamat Datang Admin Adventure Rentaliks</h1>
            
            <!-- Widget untuk Menampilkan Jumlah Kategori -->
            <div class="widget">
                <h3>Total Kategori</h3>
                <p><?php echo $total_categories; ?> Kategori</p>
            </div>

            <!-- Widget untuk Menampilkan Jumlah Transaksi -->
            <div class="widget">
                <h3>Total Transaksi</h3>
                <p><?php echo $total_transactions; ?> Transaksi</p>
            </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");

        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>
</body>

</html>