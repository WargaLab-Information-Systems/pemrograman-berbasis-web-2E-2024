function calculate() {

    const userName = document.getElementById("username").value;
    const num1 = parseFloat(document.getElementById("num1").value); 
    const operator = document.getElementById("operator").value;
    const num2 = parseFloat(document.getElementById("num2").value);

    let result;

    switch (operator) {
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
            result = num2 !== 0 ? num1 / num2 : "Tidak dapat dibagi dengan nol";
            break;
        case '%':
            result = num2 !== 0 ? num1 % num2 : "Tidak dapat dibagi dengan nol";
            break;
        default:
            result = "Operator tidak valid";
    }

    const table = document.getElementById("results-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow(); 

    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);
    const cell4 = newRow.insertCell(3);
    const cell5 = newRow.insertCell(4);
    const cell6 = newRow.insertCell(5);

    cell1.textContent = table.rows.length; 
    cell2.textContent = username;
    cell3.textContent = num1;
    cell4.textContent = operator;
    cell5.textContent = num2;
    cell6.textContent = result;
}
