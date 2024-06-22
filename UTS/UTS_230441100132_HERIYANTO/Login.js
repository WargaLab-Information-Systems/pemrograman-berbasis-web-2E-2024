document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    // Simpan username di local storage
    localStorage.setItem('username', username);
    // Redirect ke halaman kalkulator
    window.location.href = 'Halaman_Kalkulator.html';
});
