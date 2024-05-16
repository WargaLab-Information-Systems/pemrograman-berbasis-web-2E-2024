document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
  
    // Check username and password (dummy validation)
    if (username === 'admin' && password === 'password') {
      // Redirect to calculator page
      window.location.href = 'calculator.html';
    } else {
      alert('Invalid username or password');
    }
  });
  