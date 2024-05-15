function validated() {
    var username = document.querySelector(".login_form input[type='text']").value;
    var password = document.querySelector(".login_form input[type='password']").value;
  
    if (username === "admin" && password === "admin") {
      alert("Login berhasil!");
      window.location.href = "halaman2.html";
      return false; 
    } else {
      alert("salah! masukkan sesuai hint!");
      return false; 
    }
  }
  let displayValue = '';

function appendNumber(number) {
  displayValue += number;
  updateDisplay();
}
function setOperation(operation) {
  displayValue += operation;
  updateDisplay();
}
function calculateResult() {
  try {
    const result = eval(displayValue);
    displayValue = result.toString();
    updateDisplay();
  } catch (error) {
    displayValue = 'Error';
    updateDisplay();
  }
}
function clearDisplay() {
  displayValue = '';
  updateDisplay();
}
function updateDisplay() {
  document.getElementById('display').value = displayValue;
}
