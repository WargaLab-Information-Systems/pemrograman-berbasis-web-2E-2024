document.getElementById('calculatorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var num1 = parseFloat(document.getElementById('num1').value);
    var operator = document.getElementById('operator').value;
    var num2 = parseFloat(document.getElementById('num2').value);
    var result;
    switch(operator) {
        case '+':
            result = num1 + num2;
            break;
        case '-':
            result = num1 - num2;
            break;
        case '*':
            result = num1 * num2;
            break;
        case '/':
            result = num1 / num2;
            break;
        case '%':
            result = num1 % num2;
            break;
        default:
            result = 'Invalid operator';
    }
    // Tampilkan hasil perhitungan di tabel
    var row = "<tr><td>1</td><td>Ningrum</td><td>" + num1 + "</td><td>" + operator + "</td><td>" + num2 + "</td><td>" + result + "</td></tr>";
    document.getElementById('resultTable').innerHTML = row;
});
