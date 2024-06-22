document.getElementById("loginForm").addEventListener("submit", function(event){
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    // Simulasi validasi sederhana, Anda dapat menggantinya dengan sistem autentikasi yang sesuai
    if(username  && password ){
        localStorage.setItem('username', username);
        localStorage.setItem('password', password);
        window.location.href = "calculator.html";
     } // Redirect ke halaman kalkulator
});
