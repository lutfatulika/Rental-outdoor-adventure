<?php 
// Panggil file koneksi
include 'koneksi.php';

// Mulai sesi untuk menyimpan data pengguna yang login
session_start();

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data input dari form
    $requestEmail = mysqli_real_escape_string($koneksi, $_POST['email']); // Menghindari SQL injection
    $requestPassword = $_POST['password'];

    // Validasi apakah email dan password kosong
    if (empty($requestEmail) || empty($requestPassword)) {
        echo "<script>
                alert('Email dan password tidak boleh kosong!');
                window.location.href='login.php'; // Redirect ke halaman login
              </script>";
        exit;
    }

    // Query untuk mencari email pengguna
    $sql = "SELECT * FROM tb_register WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $requestEmail); // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika pengguna ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Ambil data pengguna

        // Verifikasi password
        if (password_verify($requestPassword, $row['password'])) {
            // Menyimpan sesi pengguna
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];  // Asumsi ada kolom 'id' dalam tabel tb_register

            // Redirect ke halaman dashboard
            header('Location: dashboard.php');
            exit; // Jangan lupa exit setelah header untuk menghentikan eksekusi lebih lanjut
        } else {
            // Jika password salah
            echo "<script>
                    alert('Email atau password Anda salah, silakan coba lagi');
                    window.location.href='login.php'; // Redirect ke halaman login
                  </script>";
        }
    } else {
        // Jika email tidak ditemukan
        echo "<script>
                alert('Email tidak ditemukan, silakan coba lagi');
                window.location.href='login.php'; // Redirect ke halaman login
              </script>";
    }

    // Tutup koneksi
    $stmt->close();
    mysqli_close($koneksi);
}
?>
