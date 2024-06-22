const layar_input = document.querySelector(".input");
const layar_output = document.querySelector(".output");
const btn = document.querySelectorAll(".key");
const resultsTable = document.querySelector("#results tbody");
let currentInput = '';
let firstOperand = null;
let secondOperand = null;
let operator = null;
let user = 'User 1'; // Add user name here

function addToDisplay(value) {
    currentInput += value;
    layar_input.textContent = currentInput;
}

function clearDisplay() {
    currentInput = '';
    layar_input.textContent = '';
    layar_output.textContent = '';
    firstOperand = null;
    secondOperand = null;
    operator = null;
}

function calculate() {
    const first = parseFloat(firstOperand);
    const second = parseFloat(secondOperand);
    let result;

    switch (operator) {
        case '+':
            result = first + second;
            break;
        case '-':
            result = first - second;
            break;
        case '*':
            result = first * second;
            break;
        case '/':
            if (second === 0) {
                alert('Cannot divide by zero');
                return;
            }
            result = first / second;
            break;
        default:
            return;
    }

    layar_output.textContent = result;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${resultsTable.children.length + 1}</td>
        <td>${user}</td>
        <td>${firstOperand}</td>
        <td>${operator}</td>
        <td>${secondOperand}</td>
        <td>${result}</td>
    `;
    resultsTable.appendChild(newRow);

    firstOperand = result.toString();
    secondOperand = null;
    operator = null;
    currentInput = '';
}

for (let key of btn) {
    const value = key.dataset.key;

    key.addEventListener('click', () => {
        if (value === 'hapus') {
            clearDisplay();
        } else if (value === 'kurung') {
            if (currentInput.includes('(') && currentInput.includes(')')) {
                currentInput = currentInput.replace('(', '').replace(')', '');
            } else if (currentInput === '' || currentInput.slice(-1).match(/[+\-*/.]/)) {
                currentInput += '(';
            } else {
                currentInput += ')';
            }
            layar_input.textContent = currentInput;
        } else if (value === 'persen') {
            addToDisplay('%');
        } else if (value === '*' || value === '/' || value === '+' || value === '-') {
            if (currentInput === '' && firstOperand !== null) {
                operator = value;
                layar_input.textContent = firstOperand + value;
            } else {
                firstOperand = currentInput;
                operator = value;
                currentInput = '';
            }
        } else if (value === '=') {
            if (firstOperand !== null && operator !== null && currentInput !== '') {
                secondOperand = currentInput;
                calculate();
            }
        } else if (value === '.') {
            if (!currentInput.includes('.')) {
                addToDisplay('.');
            }
        } else {
            addToDisplay(value);
        }
    });
}