<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RENTALIKS ADVENTURE</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <div class="logo">
            <h1>RENTALIKS ADVENTURE</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#product">BEST SELLER</a></li>
                <li><a href="#semua-product">ALL PRODUCT</a></li>
                <li><a href="#about">ABOUT ME</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <input type="text" placeholder="Search product..." class="search-bar" id="searchBar">
            <a href="login.php" class="account-icon" onclick="showLoginPrompt()">Masuk/Daftar</a>
        </div>
    </header>

    <section class="main-banner">
        <div class="product-banner">
            <h2>Produk terpercaya dan original!</h2>
            <p>Harga aman di kantong</p>
        </div>
        <div class="slider">
            <img src="asset/tent.jpg" alt="Banner Tenda">
        </div>
    </section>

    <section id="product" class="product-categories">
        <h2>BEST SELLER</h2>
        <!-- Produk 1 -->
        <div class="category">
            <a href="file/paket2/paket 2.php"
                onclick="showSnackbar('Anda baru saja melihat paket outdoor 1'); return false;">
                <img id="paketOutdoor1" src="asset/paket 2.jpg" alt="Paket outdoor 1"
                    onclick="showProductAlert('Paket outdoor 1')">
            </a>
            <p>Paket outdoor 1</p>
        </div>

        <!-- Produk 2 -->
        <div class="category">
            <a href="file/paket3/paket 3.php"
                onclick="showSnackbar('Anda baru saja melihat paket outdoor 2'); return false;">
                <img id="paketOutdoor2" src="asset/paket 3.jpg" alt="Paket outdoor 2"
                    onclick="showProductAlert('Paket outdoor 2')">
            </a>
            <p>Paket outdoor 2</p>
        </div>
    </section>

    <section id="allgame" class="product-list">
        <h2>All Product</h2>
        <div class="product-grid">
            <div class="product-item">
                <a href="file/ALATMASAK/alatmasak.php">
                    <img src="asset/alat masak.jpg" alt="Alat masak">
                </a>
                <h3>Alat masak</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
            <div class="product-item">
                <a href="file/TRACKINGPOLL/tracckingpoll.php">
                    <img src="asset/tracckingpoll.jpg" alt="Traccking poll">
                </a>
                <h3>Traccking Pol</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
            <div class="product-item">
                <a href="file/KURSI/ff.php">
                    <img src="asset/kursi.jpg" alt="Kursi">
                </a>
                <h3>Kursi</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
            <div class="product-item">
                <a href="file/SEPATUHIKKING/sepatuhikking.php">
                    <img src="asset/sepatu hikking.jpg" alt="Sepatu hikking">
                </a>
                <h3>Sepatu hikking</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
            <div class="product-item">
                <a href="file/CARRIER/carrier.php">
                    <img src="asset/carrier.jpg" alt="Carrier">
                </a>
                <h3>Carrier</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
            <div class="product-item">
                <a href="file/TENDA/tenda.php">
                    <img src="asset/tenda.jpg" alt="Tenda">
                </a>
                <h3>Tenda</h3>
                <div class="rating">★★★★☆ (4.8)</div>
            </div>
        </div>
    </section>

    <section id="about" class="promotion-banner">
        <h3>Terimakasih telah mengunjungi website kami!</h3>
    </section>

    <footer>
        <div class="store-info">
            <h3>Adventure Rentaliks</h3>
            <p>Contact: adventurerentaliks@gmail.com</p>
            <p>Location: Bojonegoro, Indonesia</p>
            <p>Open Hours: 00.00-23.59</p>
        </div>

        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>
    </footer>

    <!-- Snackbar menampilkan pesan singkat / notif -->
    <div id="snackbar">Some text in the snackbar.</div>

    <!-- JS untuk manipulasi DOM dan snackbar -->
    <script>
        function showSnackbar(message) {
            var snackbar = document.getElementById("snackbar");
            snackbar.textContent = message;
            snackbar.className = "show";

            // Setelah 5 detik, snackbar / notif akan hilang
            setTimeout(function () {
                snackbar.className = snackbar.className.replace("show", "");
            }, 5000);
        }

        function showLoginPrompt() {
            var username = prompt("Masukkan username Anda:");
            if (username) {
                alert("Selamat datang, " + username + "!");
            } else {
                alert("Anda tidak memasukkan username.");
            }
        }

        function showProductAlert(productName) {
            alert("Anda telah memilih " + productName + ". Apakah Anda ingin melanjutkan ke halaman produk?");
            // Anda bisa menambahkan logika lebih lanjut di sini jika diperlukan
        }
    </script>
</body>

</html>