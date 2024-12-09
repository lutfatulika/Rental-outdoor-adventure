<?php
include 'koneksi.php';

// Periksa apakah parameter id ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data kategori berdasarkan id
    $query = "SELECT * FROM tb_categories WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        // Hapus file foto yang terkait
        $photoPath = "../tgs praktikum/img_categories/" . $data['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Hapus data dari database
        $deleteQuery = "DELETE FROM tb_categories WHERE id = '$id'";
        if (mysqli_query($koneksi, $deleteQuery)) {
            echo "
            <script>
                alert('Data berhasil dihapus');
                window.location = 'categories.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Gagal menghapus data');
                window.location = 'categories.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Data tidak ditemukan');
            window.location = 'categories.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location = 'categories.php';
    </script>
    ";
}
?>