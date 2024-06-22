document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    // Contoh validasi sederhana, bisa diganti dengan validasi sesuai kebutuhan
    if (username === 'admin' && password === 'admin123') {
      // Redirect ke halaman kalkulator jika login berhasil
      window.location.href = "kalkulator.html";
    } else {
      alert('Username atau password salah');
    }
  });
  