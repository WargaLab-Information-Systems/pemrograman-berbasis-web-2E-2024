document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        alert('Please fill in all fields.');
        return;
    }

    localStorage.setItem('username', username); // Simpan username ke localStorage
    alert('Login successful!');

    window.location.href = 'calculator.html'; // Redirect ke halaman kalkulator
});
