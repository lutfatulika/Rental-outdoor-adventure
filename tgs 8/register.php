<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style2.css" />
</head>

<body>
    <div>
        <div class="navbar-extra"></div>
        <a href="#" id="search"><i data-feather="tent"></i></a>
        <a href="#" id="search"><i data-feather="menu"></i></a>
    </div>
    <div id="register-page" class="container">
        <div class="register-container">
            <div class="logo-img"></div>
            <h2>Register</h2>

            <form id="registerForm" action="register_proses.php" method="POST">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <div class="input-group">
                    <label for="konfirmasi-password">Konfirmasi Password:</label>
                    <input type="password" id="konfirmasi-password" name="konfirmasi_password" required />
                </div>
                <div class="input-group">
                    <br>
                    <button type="submit" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah pengiriman form secara default
            showConfirmBox(); // Tampilkan Confirm Box
        });

        function showConfirmBox() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin melanjutkan registrasi?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('registerForm').submit(); // Submit form if confirmed
                } else {
                    Swal.fire('Registrasi dibatalkan.'); // Jika pengguna menekan "Cancel"
                }
            });
        }
    </script>
</body>

</html>
