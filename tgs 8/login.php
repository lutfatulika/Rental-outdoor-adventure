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
      <form id="myForm" action="login-proses.php" method="POST">
        <div class="input-group">
          <label for="email-login">Email:</label>
          <input type="email" id="email-login" name="email" required />
        </div>
        <div class="input-group">
          <label for="password-login">Password:</label>
          <input type="password" id="password-login" name="password" required />
        </div>
        <a href="register.php" class="forgot-password">Belum punya akun?</a>
        <div class="input-group">
          <button type="submit" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
