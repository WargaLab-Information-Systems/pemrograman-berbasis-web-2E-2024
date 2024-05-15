// calculator.js

document.getElementById("calculatorForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Ambil nilai dari input
    var number1 = parseFloat(document.getElementById("number1").value);
    var number2 = parseFloat(document.getElementById("number2").value);
    var operator = document.getElementById("operator").value;

    // Lakukan perhitungan berdasarkan operator
    var result;
    switch(operator) {
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
            result = "Invalid operator";
    }

    // Tampilkan hasil di elemen dengan ID "result"
    document.getElementById("result").value = result;
});
