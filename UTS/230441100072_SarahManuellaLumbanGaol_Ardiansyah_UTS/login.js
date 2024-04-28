document
  .getElementById("login-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var username = document.getElementById("floatingInput").value;
    var password = document.getElementById("floatingPassword").value;

    sessionStorage.setItem("floatingInput", username);
    sessionStorage.setItem("floatingPassword", password);

    window.location.href = "calculator.html";
  });
