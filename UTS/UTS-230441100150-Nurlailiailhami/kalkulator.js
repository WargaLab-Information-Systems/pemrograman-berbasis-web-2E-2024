function calculate() {
    var number1 = parseFloat(document.getElementById('number1').value);
    var number2 = parseFloat(document.getElementById('number2').value);
    var operator = document.getElementById('operator').value;
    var result;
    
    switch(operator) {
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
        result = number1 / number2;
        break;
      case '%':
        result = number1 % number2;
        break;
      default:
        result = 'Invalid operator';
    }
    
    displayResult(result);
  }
  
  function displayResult(result) {
    var row = document.createElement('tr');
    row.innerHTML = `<td>${document.getElementById('resultTable').childElementCount + 1}</td>
                     <td>admin</td>
                     <td>${document.getElementById('number1').value}</td>
                     <td>${document.getElementById('operator').value}</td>
                     <td>${document.getElementById('number2').value}</td>
                     <td>${result}</td>`;
    document.getElementById('resultTable').appendChild(row);
  }
  