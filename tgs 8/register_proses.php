<?php
// Database connection
include 'koneksi.php'; // Assuming 'koneksi.php' contains the correct database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Validate input
    if (empty($email) || empty($password) || empty($konfirmasi_password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }
    
    // Check if password and confirmation password match
    if ($password !== $konfirmasi_password) {
        echo "
            <script>
                alert('Konfirmasi password tidak cocok!');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Prepare SQL to prevent SQL injection
    $sql = "SELECT * FROM tb_register WHERE email = ?";
    
    if ($stmt = mysqli_prepare($koneksi, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Store result to check if email exists
        mysqli_stmt_store_result($stmt);
        
        // Check if the email is already registered
        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "
                <script>
                    alert('Email sudah terdaftar!');
                    window.location = 'register.php';
                </script>
            ";
            exit();
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan pada pemeriksaan email');
                window.location = 'register.php';
            </script>
        ";
        exit();
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database using prepared statement
    $insert_sql = "INSERT INTO tb_register (email, password) VALUES (?, ?)";
    
    if ($stmt = mysqli_prepare($koneksi, $insert_sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "
                <script>
                    alert('Registrasi Berhasil Silahkan login');
                    window.location = 'login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan saat registrasi, coba lagi.');
                    window.location = 'register.php';
                </script>
            ";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan pada database');
                window.location = 'register.php';
            </script>
        ";
    }

    // Close the database connection
    mysqli_close($koneksi);
}
?>
