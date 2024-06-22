document.getElementById('calculatorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var number1 = parseFloat(document.getElementById('number1').value);
    var operator = document.getElementById('operator').value;
    var number2 = parseFloat(document.getElementById('number2').value);
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
    var username = localStorage.getItem('username');
    var newRow = '<tr><td>1</td><td>' + username + '</td><td>' + number1 + '</td><td>' + operator + '</td><td>' + number2 + '</td><td>' + result + '</td></tr>';
    document.getElementById('calculationHistory').insertAdjacentHTML('beforeend', newRow);
});
