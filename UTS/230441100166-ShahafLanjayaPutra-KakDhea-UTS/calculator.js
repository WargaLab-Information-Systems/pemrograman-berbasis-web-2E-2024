// Definisikan variabel untuk nomor riwayat perhitungan
let historyNumber = 1;

// Fungsi untuk menambahkan hasil perhitungan ke dalam tabel
function addToHistoryTable(username, num1, operator, num2, result) {
    const historyTableBody = document.getElementById('history-table-body');

    // Buat elemen baris baru untuk tabel
    const newRow = document.createElement('tr');
    
    // Isi baris baru dengan data
    newRow.innerHTML = `
        <th scope="row">${historyNumber}</th>
        <td>${username}</td>
        <td>${num1}</td>
        <td>${operator}</td>
        <td>${num2}</td>
        <td>${result}</td>
    `;

    // Tambahkan baris baru ke dalam tabel
    historyTableBody.appendChild(newRow);

    // Tambahkan 1 ke nomor riwayat perhitungan
    historyNumber++;
}

// Event listener untuk tombol hitung
document.getElementById('calculate-btn').addEventListener('click', function() {
    const num1 = parseFloat(document.getElementById('number1').value);
    const num2 = parseFloat(document.getElementById('number2').value);
    const operator = document.getElementById('operator').value;

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
            result = num1 / num2;
            break;
        case '%':
            result = num1 % num2;
            break;
        default:
            result = 'Invalid operator';
    }

    // Tampilkan hasil perhitungan di div "result"
    document.getElementById('result').innerText = result;

    // Ambil nama pengguna dari lokal storage (ganti dengan cara autentikasi yang sesungguhnya)
    const username = localStorage.getItem('username') || 'Guest';

    // Tambahkan hasil perhitungan ke dalam tabel riwayat
    addToHistoryTable(username, num1, operator, num2, result);
});