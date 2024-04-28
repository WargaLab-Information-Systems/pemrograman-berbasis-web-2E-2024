function calculateResult(num1, operator, num2) {
    switch (operator) {
      case '+':
        return num1 + num2;
      case '-':
        return num1 - num2;
      case '*':
        return num1 * num2;
      case '/':
        if (num2 !== 0) {
          return num1 / num2;
        } else {
          return 'Infinity';
        }
      case '%':
        return num1 % num2;
      default:
        return 'Invalid operator';
    }
  }
  
  document.getElementById('calculate').addEventListener('click', function() {
    var num1 = parseFloat(document.getElementById('number1').value);
    var operator = document.getElementById('operator').value;
    var num2 = parseFloat(document.getElementById('number2').value);
  
    var result = calculateResult(num1, operator, num2);
  

    var table = document.getElementById('calculationHistory');
    var newRow = table.insertRow();
    newRow.innerHTML = `
      <td>${table.rows.length}</td>
      <td>${localStorage.getItem('username')}</td>
      <td>${num1}</td>
      <td>${operator}</td>
      <td>${num2}</td>
      <td>${result}</td>
    `;
  });
  