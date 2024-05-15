$(document).ready(function() {
    $('#login-form').on('submit', function(e) {
      e.preventDefault();
      var username = $('#username').val();
      var password = $('#password').val();
      if (username === 'admin' && password === '123') {
        window.location.href='index.html';
      } else {
        alert('Invalid username or password');
      }
    });
  });