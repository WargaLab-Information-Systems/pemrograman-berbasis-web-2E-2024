let calculationCounter = 1;

function calculate() {
    const username = localStorage.getItem('username') || "Anonymous"; // Dapatkan username
    const number1 = parseFloat(document.getElementById('number1').value);
    const operator = document.getElementById('operator').value;
    const number2 = parseFloat(document.getElementById('number2').value);
    let result;

    if (operator === '+') {
        result = number1 + number2;
    } else if (operator === '-') {
        result = number1 - number2;
    } else if (operator === '*') {
        result = number1 * number2;
    } else if (operator === '/') {
        result = number2 === 0 ? "Cannot divide by zero" : number1 / number2;
    } else if (operator === '%') {
        result = number1 % number2;
    } else {
        result = "Invalid operation";
    }

    const table = document.getElementById('resultsTable');
    const row = table.insertRow();
    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);
    const cell4 = row.insertCell(3);
    const cell5 = row.insertCell(4);
    const cell6 = row.insertCell(5);

    cell1.innerHTML = calculationCounter++;
    cell2.innerHTML = username;
    cell3.innerHTML = number1;
    cell4.innerHTML = operator;
    cell5.innerHTML = number2;
    cell6.innerHTML = result;
}
