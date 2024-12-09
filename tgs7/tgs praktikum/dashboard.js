// Cek status login
document.addEventListener('DOMContentLoaded', function () {
    const isLoggedIn = localStorage.getItem('isLoggedIn');

    // Jika tidak login, arahkan ke halaman login
    if (isLoggedIn !== 'true') {
        alert('Anda harus login terlebih dahulu!');
        window.location.href = 'login.php';
    }
});
