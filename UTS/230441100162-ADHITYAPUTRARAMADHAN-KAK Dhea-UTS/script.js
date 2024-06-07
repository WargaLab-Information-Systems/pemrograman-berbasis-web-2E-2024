document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
  

    if (username === 'Vell' && password === '222') {
        localStorage.setItem('username', username);
        window.location.href = 'kalkulator.html';
      } else {
        alert('Invalid username or password');
      }      
  });
  