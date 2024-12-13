<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Rentalik adventure | Categories Entry</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Categories</span>
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
                <a href="logout.php">
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
                <span class="admin_name">Catshop Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Input Categories</h3>
            <div class="form-login">
                <form action="categories-proses.php" method="post" enctype="multipart/form-data">
                    <!-- Categories Field -->
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <br>
                        <input class="input" type="text" name="categories" id="categories"
                            placeholder="Enter category name" required />
                    </div>

                    <!-- Price Field -->
                    <div class="form-group">
                        <label for="price">Price</label>
                        <br>
                        <input class="input" type="number" name="price" id="price" placeholder="Enter price (e.g., 100)"
                            required />
                    </div>

                    <!-- Description Field -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <br>
                        <textarea class="input" name="description" id="description" rows="3"
                            placeholder="Enter description" required></textarea>
                    </div>

                    <!-- Photo Upload -->
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png" required
                            style="margin-bottom: 20px;" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-simpan" name="simpan">
                        Save
                    </button>
                </form>
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
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>

</html>