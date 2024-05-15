document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === 'dior' && password === 'dio123') {
        window.location.href = 'calculator.html';
        alert('username atau password benar')
    } else {
        alert('Username atau password salah!');
    }
});
