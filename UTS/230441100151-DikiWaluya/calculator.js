document.getElementById('calculatorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var number1 = parseFloat(document.getElementById('number1').value);
    var operator = document.getElementById('operator').value;
    var number2 = parseFloat(document.getElementById('number2').value);
    var result;
  
    switch (operator) {
      case '+':
        result = number1 + number2;
        break;
      case '-':
        result = number1 - number2;
        break;
      case '*':
        result = number1 * number2;
        break;
      case '/':
        if (number2 !== 0) {
          result = number1 / number2;
        } else {
          result = 'Infinity';
        }
        break;
      case '%':
        result = number1 % number2;
        break;
      default:
        result = 'Invalid Operator';
    }
  
    // Display result in the table
    var calculationResults = document.getElementById('calculationResults');
    var newRow = calculationResults.insertRow();
    var cellNo = newRow.insertCell(0);
    var cellUsername = newRow.insertCell(1);
    var cellNumber1 = newRow.insertCell(2);
    var cellOperator = newRow.insertCell(3);
    var cellNumber2 = newRow.insertCell(4);
    var cellResult = newRow.insertCell(5);
  
    cellNo.innerHTML = calculationResults.rows.length - 1;
    cellUsername.innerHTML = 'admin'; // Hardcoded for demonstration
    cellNumber1.innerHTML = number1;
    cellOperator.innerHTML = operator;
    cellNumber2.innerHTML = number2;
    cellResult.innerHTML = result;
  });
  