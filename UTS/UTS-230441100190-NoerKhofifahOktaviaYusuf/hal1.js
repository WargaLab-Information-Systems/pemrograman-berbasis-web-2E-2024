document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Simple validation (for demonstration purposes)
  if (username === 'novi' && password === '031003') {
      window.location.href = 'hal2.html'; // Redirect to calculator page
  } else {
      document.getElementById('loginStatus').innerText = 'Invalid username or password!';
  }
});
