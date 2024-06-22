document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if (username === 'admin12' && password === '12345') {
      window.location.href = 'kalkulator.html';
    } else {
      alert('Username atau password salah');
    }
  });
  