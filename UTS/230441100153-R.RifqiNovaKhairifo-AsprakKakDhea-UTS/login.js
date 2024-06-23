function handleLogin() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");

    const correctUsername = "rifo" ;
    const correctPassword = "rifo123" ;

    if (username === "" || password === "") {
        errorMessage.textContent = "Semua bidang harus diisi.";
        errorMessage.style.display = "block";
    } else if (username !== correctUsername || password !== correctPassword) {
        errorMessage.textContent = "Nama pengguna atau kata sandi salah.";
        errorMessage.style.display = "block";
    } else {
        errorMessage.style.display = "none";
        window.location.href = "calculate.html"; 
    }
}