document.getElementById('calculatorForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission
  const number1 = parseFloat(document.getElementById('number1').value);
  const number2 = parseFloat(document.getElementById('number2').value);
  const operator = document.getElementById('operator').value;
  let result;

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
          if (number2 === 0) {
              result = 'Infinity'; // Division by zero
          } else {
              result = number1 / number2;
          }
          break;
      case '%':
          result = number1 % number2;
          break;
      default:
          result = 'Invalid operator';
  }

  document.getElementById('result').innerText = `Result: ${result}`;
});
