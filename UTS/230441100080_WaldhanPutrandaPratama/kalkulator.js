document.getElementById('calculatorForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var number1 = parseFloat(document.getElementById('number1').value);
    var number2 = parseFloat(document.getElementById('number2').value);
    var operator = document.getElementById('operator').value;

   
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
            result = number1 / number2;
            break;
        case '%':
            result = number1 % number2;
            break;
        default:
            result = 'Invalid Operator';
    }

    
    alert('Result: ' + result);
});