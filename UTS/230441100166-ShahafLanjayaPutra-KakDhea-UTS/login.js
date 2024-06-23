document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Lakukan validasi login sederhana (ganti dengan yang sesungguhnya)
    if (username === 'shahaf' && password === '12345') {
        // Redirect ke halaman kalkulator jika login berhasil
        window.location.href = 'kalkulator.html';
    } else {
        alert('Username atau password salah!');
    }
});