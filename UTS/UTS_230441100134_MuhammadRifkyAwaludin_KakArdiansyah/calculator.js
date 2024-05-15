var calculationHistory = [];

function calculate() {
    var number1 = parseFloat(document.getElementById("number1").value);
    var operator = document.getElementById("operator").value;
    var number2 = parseFloat(document.getElementById("number2").value);
    var result;

    switch (operator) {
        case "+":
            result = number1 + number2;
            break;
        case "-":
            result = number1 - number2;
            break;
        case "*":
            result = number1 * number2;
            break;
        case "/":
            result = number1 / number2;
            break;
        case "%":
            result = number1 % number2;
            break;
        default:
            alert("Operator tidak valid");
            return;
    }

    var username = localStorage.getItem("username");
    var calculation = {
        username: username,
        number1: number1,
        operator: operator,
        number2: number2,
        result: result
    };

    calculationHistory.push(calculation);
    displayCalculationHistory();
}

function displayCalculationHistory() {
    var tableBody = document.getElementById("calculationHistory");
    tableBody.innerHTML = "";

    calculationHistory.forEach(function(calculation, index) {
        var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${calculation.username}</td>
                        <td>${calculation.number1}</td>
                        <td>${calculation.operator}</td>
                        <td>${calculation.number2}</td>
                        <td>${calculation.result}</td>
                    </tr>`;
        tableBody.innerHTML += row;
    });
}
