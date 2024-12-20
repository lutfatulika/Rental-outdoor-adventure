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

            <form id="registerForm">
                <div class="input-group">
                    <label for="email-register">Email:</label>
                    <input type="email" id="email-register" name="email-register" required />
                </div>
                <div class="input-group">
                    <label for="password-register">Password:</label>
                    <input type="password" id="password-register" name="password-register" required />
                </div>
                <div class="input-group">
                    <label for="konfirmasi-password-register">Konfirmasi Password:</label>
                    <input type="password" id="konfirmasi-password-register" name="konfirmasi-password-register"
                        required />
                </div>

                <a href="login.php" class="forgot-password">Sudah punya akun?</a>
                <div class="input-group">
                    <button type="submit">Register</button>
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
                    register(); // Panggil fungsi register jika pengguna menekan "OK"
                } else {
                    Swal.fire('Registrasi dibatalkan.'); // Jika pengguna menekan "Cancel"
                }
            });
        }

        function register() {
            // Ambil data dari form
            var email = document.getElementById('email-register').value;
            var password = document.getElementById('password-register').value;
            var konfirmasiPassword = document.getElementById('konfirmasi-password-register').value;

            // Validasi email kosong
            if (email === "") {
                Swal.fire('Email tidak boleh kosong!'); // Popup sederhana
                return;
            }

            // Validasi password kosong
            if (password === "") {
                Swal.fire('Password tidak boleh kosong!'); // Popup sederhana
                return;
            }

            // Validasi konfirmasi password
            if (password !== konfirmasiPassword) {
                Swal.fire('Konfirmasi password tidak cocok!'); // Popup sederhana
                return;
            }

            // Cek apakah email sudah terdaftar
            if (localStorage.getItem(email)) {
                Swal.fire('Email sudah terdaftar! Silakan gunakan email lain.'); // Popup sederhana
                return;
            }

            // Jika semua validasi lolos, simpan data ke localStorage
            localStorage.setItem(email, JSON.stringify({ password: password })); // Simpan email sebagai key dan password sebagai value

            // Tampilkan pesan sukses
            Swal.fire('Registrasi berhasil!'); // Popup sederhana
        }
    </script>
</body>

</html>