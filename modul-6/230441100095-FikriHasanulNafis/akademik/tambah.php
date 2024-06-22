
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        h3 {
            text-align: center;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container table {
            width: 100%;
        }
        .form-container table td {
            padding: 8px;
        }
        .form-container table td:first-child {
            text-align: right;
            padding-right: 20px;
            font-weight: bold;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="tambah_aksi.php">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="text" name="umur"></td>
                </tr>
                <tr>
                    <td>Jeniskelamin</td>
                    <td><input type="text" name="jeniskelamin"></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td><input type="text" name="prodi"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan"></td>
                </tr>
                <tr>
                    <td>Asalkota</td>
                    <td><input type="text" name="asalkota"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
