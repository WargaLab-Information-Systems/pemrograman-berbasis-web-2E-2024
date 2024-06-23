<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            background: url('BG3.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h2 {
            color: black;
            text-align: center;
            margin-top: 40px;
        }
        .field-input {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .field-input input, .field-input button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .field-input button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .field-input button:hover {
            background-color: #45a049;
        }
        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.9);
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: white;
        }
        .btn-edit, .btn-hapus, .btn-simpan {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-hapus {
            background-color: #e74c3c;
        }
        .btn-edit:hover {
            background-color: #d35400;
        }
        .btn-hapus:hover {
            background-color: #c0392b;
        }
        .btn-simpan {
            background-color: #4CAF50;
        }
        .btn-simpan:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>DATA MAHASISWA</h2>

<div class="field-input" style="margin-top: 110px;">
    <input type="text" id="nim" placeholder="NIM">
    <input type="text" id="nama" placeholder="Nama">
    <input type="text" id="alamat" placeholder="Alamat">
    <input type="text" id="prodi" placeholder="Prodi">
    <input type="text" id="angkatan" placeholder="Angkatan">
    <button class="tombol-tambah" onclick="tambahData()">Tambah</button>
    <button><a href="index.php">Logout</a></button>
</div>

<div class="table-container">
    <table id="mahasiswaTable">
        <thead>
            <tr>
                <th width="300">NIM</th>
                <th width="300">Nama</th>
                <th width="300">Alamat</th>
                <th width="300">Prodi</th>
                <th width="300">Angkatan</th>
                <th width="300">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan ditambahkan di sini secara dinamis -->
        </tbody>
    </table>
</div>

<script>
    function tambahData() {
        const nim = document.getElementById('nim').value;
        const nama = document.getElementById('nama').value;
        const alamat = document.getElementById('alamat').value;
        const prodi = document.getElementById('prodi').value;
        const angkatan = document.getElementById('angkatan').value;

        if (nim === '' || nama === '' || alamat === '' || prodi === '' || angkatan === '') {
            alert('Semua field harus diisi!');
            return;
        }

        const table = document.getElementById('mahasiswaTable').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        const cellNim = newRow.insertCell(0);
        const cellNama = newRow.insertCell(1);
        const cellAlamat = newRow.insertCell(2);
        const cellProdi = newRow.insertCell(3);
        const cellAngkatan = newRow.insertCell(4);
        const cellAksi = newRow.insertCell(5);

        cellNim.innerHTML = nim;
        cellNama.innerHTML = nama;
        cellAlamat.innerHTML = alamat;
        cellProdi.innerHTML = prodi;
        cellAngkatan.innerHTML = angkatan;
        cellAksi.innerHTML = `
            <button class="btn-edit" onclick="editData(this)">Edit</button>
            <button class="btn-hapus" onclick="hapusData(this)">Hapus</button>
            <button class="btn-simpan" onclick="simpanData(this)" style="display:none;">Simpan</button>
        `;

        clearFields();
    }

    function editData(button) {
        const row = button.parentElement.parentElement;

        for (let i = 0; i < row.cells.length - 1; i++) {
            const cell = row.cells[i];
            const cellValue = cell.innerHTML;
            cell.innerHTML = `<input type="text" value="${cellValue}">`;
        }

        button.style.display = 'none';
        button.nextElementSibling.style.display = 'inline-block';
        button.nextElementSibling.nextElementSibling.style.display = 'inline-block';
    }

    function simpanData(button) {
        const row = button.parentElement.parentElement;

        for (let i = 0; i < row.cells.length - 1; i++) {
            const cell = row.cells[i];
            const input = cell.querySelector('input');
            cell.innerHTML = input.value;
        }

        button.style.display = 'none';
        button.previousElementSibling.style.display = 'none';
        button.previousElementSibling.previousElementSibling.style.display = 'inline-block';
    }

    function hapusData(button) {
        const row = button.parentElement.parentElement;
        row.remove();
    }

    function clearFields() {
        document.getElementById('nim').value = '';
        document.getElementById('nama').value = '';
        document.getElementById('alamat').value = '';
        document.getElementById('prodi').value = '';
        document.getElementById('angkatan').value = '';
    }
</script>

</body>
</html>
