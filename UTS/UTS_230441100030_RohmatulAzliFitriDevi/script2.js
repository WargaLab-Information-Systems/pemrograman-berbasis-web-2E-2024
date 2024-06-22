document.getElementById('calculatorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var number1 = parseFloat(document.getElementById('number1').value);
    var number2 = parseFloat(document.getElementById('number2').value);
    var operator = document.getElementById('operator').value;
    var result;

    switch (operator) {
        case 'tambah':
            result = number1 + number2;
            break;
        case 'kurang':
            result = number1 - number2;
            break;
        case 'kali':
            result = number1 * number2;
            break;
        case 'bagi':
            result = number1 / number2;
            break;
        case 'modulus':
            result = number1 % number2;
            break;
    }

    var username = localStorage.getItem('username');

    var tableRow = '<tr>';
    tableRow += '<td>' + (document.getElementById('resultTableBody').getElementsByTagName('tr').length + 1) + '</td>';
    tableRow += '<td>' + username + '</td>';
    tableRow += '<td>' + number1 + '</td>';
    tableRow += '<td>' + operator + '</td>';
    tableRow += '<td>' + number2 + '</td>';
    tableRow += '<td>' + result + '</td>';
    tableRow += '</tr>';

    document.getElementById('resultTableBody').innerHTML += tableRow;
});
