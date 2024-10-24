// server.js
const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.json());

// Dummy data pengguna
const users = [
  { email: 'user@example.com', password: 'password123' } // Contoh pengguna
];

// Endpoint untuk login
app.post('/api/login', (req, res) => {
  const { email, password } = req.body;

  // Cek apakah pengguna terdaftar
  const user = users.find(u => u.email === email && u.password === password);

  if (user) {
    // Login berhasil
    res.status(200).json({ message: 'Login berhasil' });
  } else {
    // Login gagal
    res.status(401).json({ message: 'Email atau password salah' });
  }
});

// Mulai server
app.listen(PORT, () => {
  console.log(`Server berjalan di http://localhost:${PORT}`);
});
