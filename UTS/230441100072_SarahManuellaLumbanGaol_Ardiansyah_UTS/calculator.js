document
  .getElementById("calculator-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var number1 = parseFloat(document.getElementById("number1").value);
    var operator = document.getElementById("operator").value;
    var number2 = parseFloat(document.getElementById("number2").value);

    var result;

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
        result = number1 / number2;
        break;
      case "%":
        result = number1 % number2;
        break;
      default:
        result = "Tidak Ada opsi";
    }

    var table = document.getElementById("result-table");
    var row = table.insertRow(-1);
    var cellNo = row.insertCell(0);
    var cellUsername = row.insertCell(1);
    var cellNumber1 = row.insertCell(2);
    var cellOperator = row.insertCell(3);
    var cellNumber2 = row.insertCell(4);
    var cellResult = row.insertCell(5);

    cellNo.innerHTML = table.rows.length - 1;
    cellUsername.innerHTML = sessionStorage.getItem("floatingInput");
    cellNumber1.innerHTML = number1;
    cellOperator.innerHTML = operator;
    cellNumber2.innerHTML = number2;
    cellResult.innerHTML = result;
  });
