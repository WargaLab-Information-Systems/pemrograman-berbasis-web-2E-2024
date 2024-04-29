document
  .getElementById("login-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "admin" && password === "123") {
      // Hide the login page and show the calculator page
      document.getElementById("login-page").classList.add("d-none");
      document.getElementById("calculator-page").classList.remove("d-none");

      // Clear the login form
      document.getElementById("login-form").reset();
    } else {
      alert("Invalid username or password");
    }
  });

document
  .getElementById("calculation-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const number1 = parseFloat(document.getElementById("number1").value);
    const operator = document.getElementById("operator").value;
    const number2 = parseFloat(document.getElementById("number2").value);
    let result;

    switch (operator) {
      case "+":
        result = number1 + number2;
        break;
      case "-":
        result = number1 - number2;
        break;
      case "*":
        result = number1 * number2;
        break;
      case "/":
        if (number2 === 0) {
          alert("Cannot divide by zero");
          return;
        }
        result = number1 / number2;
        break;
      case "%":
        result = number1 % number2;
        break;
      default:
        alert("Invalid operator");
        return;
    }

    const resultsTableBody = document.getElementById("results");
    const newRow = document.createElement("tr");
    newRow.innerHTML = `
      <td>${resultsTableBody.children.length + 1}</td>
      <td>${username}</td>
      <td>${number1}</td>
      <td>${operator}</td>
      <td>${number2}</td>
      <td>${result}</td>
  `;
    resultsTableBody.appendChild(newRow);

    // Clear the calculator form
    document.getElementById("calculation-form").reset();
  });
