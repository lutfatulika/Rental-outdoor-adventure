<!DOCTYPE html>
<html lang="id">

<head>
  <title>Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style2.css" />
</head>

<body>
  <!-- Halaman Login -->
  <div id="login-page" class="container">
    <div class="login-container">
      <h2>Login</h2>
      <form id="myForm">
        <div class="input-group">
          <label for="email-login">Email:</label>
          <input type="email" id="email-login" name="email-login" required />
        </div>
        <div class="input-group">
          <label for="password-login">Password:</label>
          <input type="password" id="password-login" name="password-login" required />
        </div>
        <a href="register.html" class="forgot-password">Belum punya akun?</a>
        <div class="input-group">
          <button type="button" id="loginButton">Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Popup Cookie -->
  <div class="cookie-popup" id="cookiePopup">
    <p>Kami menggunakan cookie untuk meningkatkan pengalaman Anda. Apakah Anda menerima cookie ini?</p>
    <div>
      <button class="accept" id="acceptCookie">Terima</button>
      <button class="decline" id="declineCookie">Tolak</button>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const loginButton = document.getElementById("loginButton");
    const cookiePopup = document.getElementById("cookiePopup");
    const acceptCookie = document.getElementById("acceptCookie");
    const declineCookie = document.getElementById("declineCookie");

    // Tampilkan popup cookie jika belum diterima sebelumnya
    if (!localStorage.getItem("cookieAccepted")) {
      cookiePopup.style.display = "flex";
    } else {
      cookiePopup.style.display = "none";
    }

    // Fungsi login
    loginButton.addEventListener("click", function () {
      const email = document.getElementById("email-login").value;
      const password = document.getElementById("password-login").value;

      if (!email || !password) {
        alert("Email dan password tidak boleh kosong!");
        return;
      }

      alert("Login berhasil!");
      window.location.href = "dashboard.php";
    });

    // Fungsi untuk menerima cookie
    acceptCookie.addEventListener("click", function () {
      localStorage.setItem("cookieAccepted", "true");
      cookiePopup.style.display = "none";
      alert("Terima kasih telah menerima cookie!");
    });

    // Fungsi untuk menolak cookie
    declineCookie.addEventListener("click", function () {
      cookiePopup.style.display = "none";
      alert("Anda menolak penggunaan cookie.");
    });
  });
  </script>
</body>

</html>
