document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var Email = document.getElementById('Email').value;
    var password = document.getElementById('password').value;

    if (Email === 'muhammadraihan@gmail.com' && password === 'raihan2002') {
        window.location.href = 'kalkulator.html';
        alert('Akun Yang Anda Masukan Benar')
    } else {
        alert('Akun Yang Anda Masukan Benar');
    }
});